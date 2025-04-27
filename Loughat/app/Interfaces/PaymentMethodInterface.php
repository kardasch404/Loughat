<?php

namespace App\Interfaces;

interface PaymentMethodInterface
{
    public function pay($amount, $commandId, array $paymentData);
    public function getPaymentMethod();
}