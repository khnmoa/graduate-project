<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SSPService
{
    private const FEND = 0xC0;
    private const FESC = 0xDB;
    private const TFEND = 0xDC;
    private const TFESC = 0xDD;
    private const CRC_POLY = 0x1021; // x^16 + x^12 + x^5 + 1
    private const CRC_INIT = 0xFFFF;

    public static function encodePacket(int $destination, int $source, int $type, string $data = "", string $secondaryHeader = "")
    {
        $packet = chr($destination) . chr($source) . chr($type);
         if (!empty($secondaryHeader)) {
            $packet .= chr(1) . $secondaryHeader; // 1 indicates the presence of Secondary Header
        } else {
            $packet .= chr(0); // 0 indicates no Secondary Header
        }
        $packet = $data;
        $crc = self::calculateCRC($packet);
        $packet .= pack('v', $crc); // Append CRC (Little-endian order)
        return self::framePacket($packet);
    }

    public static function decodePacket(string $frame): ?array
    {
        $packet = self::unframePacket($frame);
        if (!$packet) return null;

        // Fetch destination, source, and type from API database
        $destination = DB::table('packets')->where('id', ord($packet[0]))->value('destination');
        $source = (ord($packet[1]) == 0x01) ? 'Station (01)' : 'Subsystem';
        $type = DB::table('packets')->where('id', ord($packet[2]))->value('type');

        $secondaryHeaderFlag = ord($packet[3]);
        $offset = 4; // Default offset for Data

        $secondaryHeader = "";
        if ($secondaryHeaderFlag === 1) {
            // Assume a fixed length for Secondary Header (e.g., 4 bytes)
            $secondaryHeader = substr($packet, $offset, 4);
            $offset += 4;
        }

        $data = substr($packet, 3, -2);
        $crc_received = unpack('v', substr($packet, -2))[1];
        $crc_calculated = self::calculateCRC(substr($packet, 0, -2));

        if ($crc_received !== $crc_calculated) return null; // Invalid CRC

       return compact('destination', 'source', 'type', 'secondaryHeader', 'data');
    }

    private static function calculateCRC(string $data): int
    {
        $crc = self::CRC_INIT;
        foreach (str_split($data) as $char) {
            $crc ^= ord($char) << 8;
            for ($i = 0; $i < 8; $i++) {
                $crc = ($crc & 0x8000) ? (($crc << 1) ^ self::CRC_POLY) : ($crc << 1);
                $crc &= 0xFFFF; // Trim to 16-bit
            }
        }
        return $crc;
    }

    private static function framePacket(string $packet): string
    {
        $framed = chr(self::FEND);
        foreach (str_split($packet) as $char) {
            $byte = ord($char);
            if ($byte === self::FEND) {
                $framed .= chr(self::FESC) . chr(self::TFEND);
            } elseif ($byte === self::FESC) {
                $framed .= chr(self::FESC) . chr(self::TFESC);
            } else {
                $framed .= chr($byte);
            }
        }
        return $framed . chr(self::FEND);
    }

    private static function unframePacket(string $frame): ?string
    {
        if (ord($frame[0]) !== self::FEND || ord($frame[-1]) !== self::FEND) return null;
        $frame = substr($frame, 1, -1);
        $packet = "";
        for ($i = 0; $i < strlen($frame); $i++) {
            if (ord($frame[$i]) === self::FESC) {
                $i++;
                if ($i < strlen($frame)) {
                    $packet .= (ord($frame[$i]) === self::TFEND) ? chr(self::FEND) : chr(self::FESC);
                }
            } else {
                $packet .= $frame[$i];
            }
        }
        return $packet;
    }
}
