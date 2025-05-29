<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', Service::IS_ACTIVE)->orderBy('sort_order')->get();
        return view('services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('service', compact('service'));
    }
}