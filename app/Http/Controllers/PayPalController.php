<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function handlePayment()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
                "user_action" => "PAY_NOW",
                "shipping_preference" => "NO_SHIPPING",
                "payment_method" => [
                    "payee_preferred" => "IMMEDIATE_PAYMENT_REQUIRED",
                    "standard_entry_class_code" => "TEL" // For immediate payment processing
                ],
                "landing_page" => "BILLING" // Forces credit card form first
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00",
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "USD",
                                "value" => "100.00"
                            ]
                        ]
                    ],
                    "items" => [
                        [
                            "name" => "Product Name",
                            "quantity" => "1",
                            "unit_amount" => [
                                "currency_code" => "USD",
                                "value" => "100.00"
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // Add guest parameter to URL
                    $guestUrl = $links['href'] . '&guest=true';
                    return redirect()->away($guestUrl);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('cancel.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    
    public function paymentCancel()
    {
        return redirect()
            ->route('home')
            ->with('error', 'Payment was cancelled.');
    }
    
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Here you can save the payment details to your database
            // For example:
            // Payment::create([
            //     'payment_id' => $response['id'],
            //     'payer_id' => $response['payer']['payer_id'],
            //     'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            //     'status' => $response['status'],
            // ]);
            
            return redirect()
                ->route('home')
                ->with('success', 'Payment successful.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}