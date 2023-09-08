<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;


class SmsController extends Controller
{
    public function SenDSMS()
    {
        return view('admin.sms.send_sms');
    }

    public function SenDSMSStore(Request $request)
    {
        $receiver_number = $request->phone_number;
        $message = $request->message;
        // dd($request->all());

        try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiver_number, [
                'from' => $twilio_number,
                'body' => $message
            ]);

            $notification = array(
                'message' => 'SMS Send Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            //
        }
    }

    public function SendSMSTeacher()
    {
        return view('teacher.sms.send_sms');
    }

    public function SendSMSStoreTeacher(Request $request)
    {
        $receiver_number = $request->phone_number;
        $message = $request->message;
        try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiver_number, [
                'from' => $twilio_number,
                'body' => $message
            ]);




            $notification = array(
                'message' => 'SMS Send Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (Exception $e) {
            //
        }
    }
}
