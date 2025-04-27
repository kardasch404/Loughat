<?php

namespace App\Services\Payment;

use App\Interfaces\PaymentMethodInterface;
use App\Models\Payment;

class StripePayment implements PaymentMethodInterface
{
    public function pay($amount, $commandId, array $paymentData)
    {

        $payment = new Payment();
        $payment->method = $this->getPaymentMethod();
        $payment->montant = $amount;
        $payment->command_id = $commandId;
        $payment->save();
        return $payment;
    }

    public function getPaymentMethod()
    {
        return 'stripe';
    }
}
