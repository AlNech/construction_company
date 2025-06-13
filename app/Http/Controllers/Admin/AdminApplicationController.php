<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Http\Controllers\Controller;

class AdminApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function markAsProcessed(Application $application)
    {
        $application->update(['is_processed' => true]);
        return redirect()->route('admin.applications.index')
            ->with('success', 'Заявка помечена как обработанная');
    }
}
