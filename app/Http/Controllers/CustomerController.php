<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all()->sortByDesc(function ($customer) {
            return ($customer->dobrou_mes1 ? 1 : 0) + 
                   ($customer->dobrou_mes2 ? 1 : 0) + 
                   ($customer->referral_1 ? 1 : 0) + 
                   ($customer->referral_2 ? 1 : 0) + 
                   ($customer->referral_3 ? 1 : 0);
        });

        return view('customers.index', compact('customers'));
    }
}