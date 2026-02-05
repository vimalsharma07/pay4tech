<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $recentEnquiries = Enquiry::query()->latest()->limit(5)->get();
        $totalEnquiries = Enquiry::query()->count();

        return view('admin.dashboard', [
            'recentEnquiries' => $recentEnquiries,
            'totalEnquiries' => $totalEnquiries,
        ]);
    }
}

