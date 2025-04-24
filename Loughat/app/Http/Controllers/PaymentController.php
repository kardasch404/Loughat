<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        // dd('showPaymentForm');
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));


        try {
            // dd('showPaymentForm');
            Charge::create([
                'amount' => 1000, 
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test Payment',
            ]);
            $request->session()->flash('success', 'Payment successful!');

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
}
