<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::query()->latest()->paginate(20);

        return view('admin.enquiries.index', [
            'enquiries' => $enquiries,
        ]);
    }
}

