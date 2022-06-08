<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Oder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Jobs\ProcessPodcast;

class OrderController extends Controller
{
    public function create(){
        return view('users.orders.order');
    }
    
    public function store(){
        $attribute = request()->validate([
            'name' => "required",
            'email' => 'required|email',
            'address' => "required",
            'phone' => "required",
        ]);
        $attribute['token'] = Str::random(20);
        $customer = Customer::create($attribute);
        if( $customer){
            $customer_id = $customer->id;
            foreach(session()->get('cart') as $cart){
                Oder::create([
                    'customer_id' => $customer_id,
                    'name' => $cart['name'],
                    'quantity'=> $cart['quantity'],
                    'total' => $cart['quantity']*$cart['price']
                ]);
            };
        //  Mail::send('email.confirm',[
        //         'name' => request()->name,
        //         'customer' => $customer
        //         ],function($email){
        //         $email->subject('Project');
        //         $email->to(request()->email,request()->name);
        //     });
    
           
            session()->forget('cart');
           
        }

        $customer['email'] = request()->email;

        $emailJob = new ProcessPodcast($customer);
        
        dispatch($emailJob)->delay(now()->addMinutes(10));
    
         return redirect('/products');
    }

    public function confirm($token ,Customer $customer){
       return redirect('/products');
    }

}
