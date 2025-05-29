<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $services  = Service::where('is_active', Service::IS_ACTIVE)->paginate(10);

        foreach($portfolio as $item) {
            if (isset($item->images)) {
                $item->images = json_decode($item->images, true);
                
                // Проверка на ошибки декодирования
                if (json_last_error() !== JSON_ERROR_NONE) {
                    // Обработка ошибки (например, логирование или установка пустого массива)
                    $item->images = [];
                }
            }
        }
        return view('portfolio', compact('portfolio', 'services'));
    }

    public function show($slug)
    {
        $item = Portfolio::where('slug', $slug)->firstOrFail();
        
        return view('portfolio-item', compact('item'));
    }
}