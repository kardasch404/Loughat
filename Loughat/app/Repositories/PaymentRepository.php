<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    protected $model;
    
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }
    
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    
    public function findByCommandId($commandId)
    {
        return $this->model->where('command_id', $commandId)->first();
    }
    
}