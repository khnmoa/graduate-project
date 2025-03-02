<?php

namespace App\Services;

class SSPService
{
    private const SSP_START_BYTE = 0xC0; // Start of frame
    private const SSP_END_BYTE = 0xC0;   // End of frame

    /**
     * Encode a command into an SSP frame.
     * @param string $command  The command to send (e.g., "SET_POWER")
     * @param array $payload   Additional data values (e.g., ["100"])
     * @return string          Encoded SSP frame
     */
    public function encode(string $command, array $payload = []): string
    {
        $data = implode(',', $payload); // Convert array to string
        return chr(self::SSP_START_BYTE) . $command . ':' . $data . chr(self::SSP_END_BYTE);
    }

    /**
     * Decode an SSP frame into command and payload.
     * @param string $frame    The received SSP frame
     * @return array|null      Decoded command and payload, or null if invalid
     */
    public function decode(string $frame): ?array
    {
        if (ord($frame[0]) !== self::SSP_START_BYTE || ord($frame[-1]) !== self::SSP_END_BYTE) {
            return null; // Invalid frame
        }

        $trimmed = substr($frame, 1, -1); // Remove start and end bytes
        [$command, $data] = explode(':', $trimmed, 2);
        return ['command' => $command, 'payload' => explode(',', $data)];
    }
}