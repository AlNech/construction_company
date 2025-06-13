<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string'
        ]);

        Application::create($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()
            ->back()
            ->with('success', 'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
    }
}
