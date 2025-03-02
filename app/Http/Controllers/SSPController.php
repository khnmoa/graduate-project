<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SSPService;

class SSPController extends Controller
{
    protected $sspService;

    public function __construct(SSPService $sspService)
    {
        $this->sspService = $sspService;
    }

    /**
     * Handle encoding an SSP command
     */
    public function sendCommand(Request $request)
    {
        $request->validate([
            'command' => 'required|string',
            'payload' => 'array'
        ]);

        $command = $request->input('command');
        $payload = $request->input('payload', []);

        $encodedFrame = $this->sspService->encode($command, $payload);

        return response()->json([
            'frame' => bin2hex($encodedFrame),
            'message' => 'SSP command encoded successfully'
        ]);
    }

    /**
     * Handle decoding an SSP frame
     */
    public function receiveCommand(Request $request)
    {
        $request->validate([
            'frame' => 'required|string'
        ]);

        $frame = hex2bin($request->input('frame'));
        $decodedData = $this->sspService->decode($frame);

        if (!$decodedData) {
            return response()->json(['error' => 'Invalid SSP frame'], 400);
        }

        return response()->json([
            'command' => $decodedData['command'],
            'payload' => $decodedData['payload']
        ]);
    }
}
