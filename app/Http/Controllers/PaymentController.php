<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function show(Package $package)
    {
        session(['package_id' => $package->id]); // Store package ID in session
    return view('payment', compact('package'));
    }

    public function success(Request $request)
    {
        // Assuming the package ID is passed in the session or request
        $packageId = $request->session()->get('package_id');

        // Create a new UserPackage record
        UserPackage::create([
            'user_id' => Auth::id(),
            'package_id' => $packageId,
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addDays(Package::find($packageId)->duration),
        ]);

        return redirect()->route('dashboard')->with('message', 'Payment successful! Your package is now active.');
    }

    public function failed()
    {
        return view('payment-failed');
    }
}
