<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    protected $serverKey;

    public function __construct()
    {
        $this->serverKey = config('app.firebase_server_key');
    }

    public function push(Request $request)
    {
        if ($request->input('api_key') === null) {
            return 404;
        }

        // todo vérifier si l'api key du user est bien dans le service

        $service = Service::fromApiKey($request->input('api_key'));
        return $this->sendPush($service->users()->get(), $request);
    }

    public function sendPush($users, Request $request)
    {
        $data = [
            "registration_ids" => $users->map(function ($key) {
                return $key->token;
            }),
            "notification" =>
                [
                    "title" => $request->input('title'),
                    "body" => $request->input('body'),
                    "icon" => url('/logo.png')
                ],
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        return response()->json([
            'status' => 'Notification sent !',
            'returned' => curl_exec($ch),
        ], 200);

    }
}