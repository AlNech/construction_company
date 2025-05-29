<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\News;
use App\Models\Application;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Portfolio::count(),
            'news' => News::count(),
            'applications' => Application::where('is_processed', false)->count(),
        ];

        $recentApplications = Application::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentApplications'));
    }
}
