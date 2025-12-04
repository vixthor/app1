<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the subscribers (for admin use).
     */
    public function index()
    {
        // Optional: return a paginated list for admin views
        // return view('admin.subscribers.index', ['subscribers' => Subscriber::latest()->paginate(50)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not used — subscription form lives in the footer/component
    }

    /**
     * Store a newly created subscriber (idempotent).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = strtolower($data['email']);

        try {
            $subscriber = Subscriber::firstOrCreate(['email' => $email]);

            if ($subscriber->wasRecentlyCreated) {
                return redirect()->back()->with('success', 'Thank you for subscribing!');
            }

            return redirect()->back()->with('info', 'This email is already subscribed.');

        } catch (\Exception $e) {
            Log::error('Subscriber store failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to subscribe at this time. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
