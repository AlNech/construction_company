<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('service')
            ->orderBy('sort_order')
            ->paginate(10);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('is_active', Service::IS_ACTIVE)->get();
        return view('admin.portfolio.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolios,slug',
            'service_id' => 'required|exists:services,id',
            'short_description' => 'nullable|string|max:300',
            'description' => 'required|string',
            'images' => 'required|array',
            'images.*' => 'required|string|max:2048',
            'project_date' => 'required|date',
            'client' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Генерация slug, если не указан
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        // Обработка изображений
        $imageUrls = array_filter($request->input('images', []));

        // Сохраняем портфолио
        $validated['images'] = json_encode(array_values($imageUrls));

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Проект успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $services = Service::where('is_active', Service::IS_ACTIVE)->get();
        return view('admin.portfolio.edit', compact('portfolio', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:portfolios,slug,' . $portfolio->id,
            'service_id' => 'required|exists:services,id',
            'short_description' => 'nullable|string|max:300',
            'description' => 'required|string',
            'images' => 'sometimes|array',
            'images.*' => 'required|string|max:2048',
            'project_date' => 'required|date',
            'client' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        // Обработка изображений
        $imageUrls = array_filter($request->input('images', []));

        // Сохраняем портфолио
        $validated['images'] = json_encode(array_values($imageUrls));

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Проект успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Проект успешно удален');
    }
}
