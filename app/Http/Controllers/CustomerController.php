<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }
    public function create()
    {
        return view('customers.create');
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request('name');
        $customer->description = $request('description');
        $customer->save();
        return redirect()->route('customer');
    }
}
