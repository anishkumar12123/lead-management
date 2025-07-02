<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index()
    {
        return view('razorpay');
    }



    public function payment(Request $request)
    {
        $amount = $request->input('amount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orderData = [
            'receipt' => 'order_' . rand(1000, 9999),
            'amount' => $amount * 100,
            'currency' => 'INR',
            'payment_capture' => 1
        ];

        $order = $api->order->create($orderData);
        return view('payment', [
            'orderId' => $order['id'],
            'amount' => $amount * 100
        ]);
        // echo $order['id'];
    }

    public function callback(Request $request)
    {
        $payid = $request->payid;
        $orderid = $request->orderid;
        $sing = $request->sing;

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $attr = [
                'razorpay_order_id' => $orderid,
                'razorpay_payment_id' => $payid,
                'razorpay_signature' => $sing // ✅ correct

            ];
            $api->utility->verifyPaymentSignature($attr); // ✅ correct
            echo "payment verified : " . $payid;
        } catch (\Exception $e) {
            echo "Payment verification Faild";
        }
    }
}
