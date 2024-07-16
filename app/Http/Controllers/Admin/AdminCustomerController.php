<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    public function login()
    {
        return view('admin.customers.login');
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'store_name' => 'required|string|max:255',
        'store_owner' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'dobrou_mes1' => 'boolean',
        'dobrou_mes2' => 'boolean',
        'referral_1' => 'boolean',
        'referral_2' => 'boolean',
        'referral_3' => 'boolean',
    ]);

    $logoPath = 'logos/default.png';
    if ($request->hasFile('logo')) {
        try {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } catch (\Exception $e) {
            return back()->withErrors(['logo' => 'Falha ao fazer upload da imagem: ' . $e->getMessage()]);
        }
    }

    Customer::create([
        'store_name' => $request->store_name,
        'store_owner' => $request->store_owner,
        'logo_url' => $logoPath,
        'dobrou_mes1' => $request->boolean('dobrou_mes1'),
        'dobrou_mes2' => $request->boolean('dobrou_mes2'),
        'referral_1' => $request->boolean('referral_1'),
        'referral_2' => $request->boolean('referral_2'),
        'referral_3' => $request->boolean('referral_3'),
    ]);

    return redirect()->route('admin.customers.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
    $request->validate([
        'store_name' => 'required|string|max:255',
        'store_owner' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'dobrou_mes1' => 'boolean',
        'dobrou_mes2' => 'boolean',
        'referral_1' => 'boolean',
        'referral_2' => 'boolean',
        'referral_3' => 'boolean',
    ]);

    if ($request->hasFile('logo')) {
        if ($customer->logo_url) {
            Storage::delete('public/' . $customer->logo_url);
        }
        $logoPath = $request->file('logo')->store('logos', 'public');
        $customer->logo_url = $logoPath;
    }

    $customer->update([
        'store_name' => $request->store_name,
        'store_owner' => $request->store_owner,
        'dobrou_mes1' => $request->boolean('dobrou_mes1'),
        'dobrou_mes2' => $request->boolean('dobrou_mes2'),
        'referral_1' => $request->boolean('referral_1'),
        'referral_2' => $request->boolean('referral_2'),
        'referral_3' => $request->boolean('referral_3'),
    ]);

    return redirect()->route('admin.customers.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Customer $customer)
    {
        if ($customer->logo_url) {
            Storage::delete('public/' . $customer->logo_url);
        }
        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Cliente deletado com sucesso.');
    }
}
