<?php

namespace App\Services;

use App\Interfaces\PaymentMethodInterface;

class PaymentService
{
    protected $paymentMethod;
    
    public function __construct(PaymentMethodInterface $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }
    
    public function processPayment($amount, $commandId, array $paymentData)
    {
        return $this->paymentMethod->pay($amount, $commandId, $paymentData);
    }
}