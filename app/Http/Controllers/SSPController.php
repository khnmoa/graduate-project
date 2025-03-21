<?php

namespace App\Http\Controllers;

use App\Services\SSPService;
use Illuminate\Http\Request;
use App\Services\SSPProtocol;

class SSPController extends Controller
{
    public function encodePacket(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|integer|min:0|max:255',
            'type' => 'required|integer|min:0|max:255',
            'data' => 'nullable|string',
            'secondary_header' => 'nullable|string'
        ]);

        // Fixed Source Address for Subsystems & Station (01)
        $source = 0x01; // Fixed value for the station

        // Encode the packet
        $encodedPacket = SSPService::encodePacket(
            $validated['destination'],
            $source,  // Overriding the source
            $validated['type'],
            $validated['data'] ?? '',
            $validated['secondary_header'] ?? ''
        );

        return response()->json(['encoded_packet' => bin2hex($encodedPacket)]);
    }


    public function decodePacket(Request $request)
    {
        $validated = $request->validate([
            'encoded_packet' => 'required|string'
        ]);

        $frame = hex2bin($validated['encoded_packet']);
        $decodedPacket = SSPService::decodePacket($frame);

        if (!$decodedPacket) {
            return response()->json(['error' => 'Invalid packet or CRC mismatch'], 400);
        }

        return response()->json($decodedPacket);
    }
}
