<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Product;
use App\User;


class subscriptionController extends Controller
{
    protected $stripe;

    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }
	
	public function show(Request $request,$id)
    {   
		$plan = Product::find($id);
		
        $paymentMethods = $request->user()->paymentMethods();
		
		$intent = auth()->user()->createSetupIntent();
		        
        return view('product.show', compact('plan', 'intent'));
    }

    public function store(Request $request, Product $plan)
    {
        $plan = Product::findOrFail($request->get('plan'));
        
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('default', $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);
        
        return redirect()->route('home')->with('success', 'Your payment made successfully');
    }

}
