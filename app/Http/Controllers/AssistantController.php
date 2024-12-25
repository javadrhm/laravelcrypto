<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AssistantController extends Controller
{

    // Helper method to check active package
    private function checkActivePackage()
    {
        $user = Auth::user();

        // Fetch user's packages and check for active ones
        return $user->packages()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->exists();
    }

    public function index()
    {
        // Check if user has an active package
        if (!$this->checkActivePackage()) {
            return redirect()->route('packages.index')
                ->with('message', 'Please purchase a package first.');
        }

        return view('assistant.index');
    }

    public function analyze(Request $request)
    {
        // Check if user has an active package
        if (!$this->checkActivePackage()) {
            return redirect()->route('packages.index')
                ->with('message', 'Please purchase a package first.');
        }

        // Validate input
        $validated = $request->validate([
            'coin' => 'required|string',
            'timeframe' => 'required|in:1m,15m,1h,1M'
        ]);

        try {
            // Make API call to your analysis service
            $response = Http::get('https://your-analysis-api.com/analyze', [
                'symbol' => $validated['coin'],
                'timeframe' => $validated['timeframe']
            ]);

            // Check if request was successful
            if ($response->successful()) {
                $analysisData = $response->json();

                return view('assistant.results', [
                    'analysisData' => $analysisData,
                    'coin' => $validated['coin'],
                    'timeframe' => $validated['timeframe']
                ]);
            } else {
                return back()->with('error', 'Unable to fetch analysis data');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
