<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessPaymentRequest;
use App\Repositories\CommandeRepository;
use App\Services\Payment\PayPalPayment;
use App\Services\Payment\StripePayment;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    protected $commandRepository;

    public function __construct(CommandeRepository $commandRepository)
    {
        $this->commandRepository = $commandRepository;
    }

    public function index($commandeId)
    {
        $commande = $this->commandRepository->find($commandeId);
        if (!$commande) {
            return response()->json([
                'message' => 'commande not found'
            ]);
        }
        return view('checkout', compact('commande'));
    }

    public function process(ProcessPaymentRequest $request)
    {
        $paymentData = $request->validated();
        $commandId = $request->input('command_id');
        // dd($commandId);
        $amount = $request->input('amount');
        if ($request->input('payment_method') === 'paypal') {
            $paymentMethod = new PayPalPayment();
        } else {
            $paymentMethod = new StripePayment();
        }
        $paymentService = new PaymentService($paymentMethod);
        try {
            $payment = $paymentService->processPayment($amount, $commandId, $paymentData);
            return redirect()->route('payment.success', ['payment' => $payment->id]);
        } catch (\Exception $e) {

            return redirect()->back();
        }
    }

    public function success($paymentId)
    {
        return view('payment.success', compact('paymentId'));
    }
}
