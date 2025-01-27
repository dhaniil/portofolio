<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $serviceId = 'service_lkr2r6a'; // Ganti dengan Service ID Anda
        $templateId = 'template_9keo4ms'; // Ganti dengan Template ID Anda
        $publicKey = '-iRwwUFq0236fizaG'; // Ganti dengan Public Key Anda

        $postData = [
            'service_id' => $serviceId,
            'template_id' => $templateId,
            'user_id' => $publicKey,
            'template_params' => [
                'from_name' => $request->input('name'),
                'from_email' => $request->input('email'),
                'message' => $request->input('message'),
            ],
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.emailjs.com/api/v1.0/email/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(['error' => curl_error($ch)], 500);
        }

        curl_close($ch);

        return response()->json(['success' => 'Email sent successfully!']);
    }
}
