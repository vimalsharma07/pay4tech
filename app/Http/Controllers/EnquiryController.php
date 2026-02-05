<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Simple honeypot (bots fill hidden fields)
        if (!empty($request->input('website'))) {
            return redirect()->route('contact')->with('toast', 'Thanks! We will contact you soon.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Enquiry::create([
            ...$data,
            'ip' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 1000),
        ]);

        return redirect()
            ->route('contact')
            ->with('toast', 'Message sent. We’ll get back to you shortly.');
    }
}

