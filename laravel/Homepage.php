<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

/**
 * Ukázka homepage controlleru
 * Controller, ve kterém vkládám do Cache náročnější nebo často opakované SQL dotazy pro zvýšení rychlosti hlavní stránky
 */

class Homepage extends Controller
{
    public function index()
    {
        // Načtení všech hlavních kategorií i s jejich jazykovými překlady přes eager loading
        $categories = Cache::remember('main-categories', now()->addMonth(), function() {
            return Category::with('lang')
                ->whereNull('parent_id')
                ->get()
                ->sortBy('lang.name');
            });

        // Načtení šesti nejnověji publikovaných článků na blogu
        $articles = Cache::remember('homepage-article', now()->addMinutes(30), function (){
            return Article::with('lang', 'category')
                ->where('state', 'published')
                ->orderBy('published_at', 'DESC')
                ->limit(6)
                ->get();
        });

        // Náhodné články, které nemají být stejné jako výpis nejnovějších
        $randomArticles = Cache::remember('homepage-random-articles', now()->addMinutes(5), function () use ($articles){
            return Article::with('lang')
                ->where('state','published')
                ->whereNotIn('id', $articles->pluck('id'))
                ->inRandomOrder()
                ->take(6)
                ->get();
        });

        return view('homepage.index', compact('categories', 'articles', 'randomArticles'));
    }
}
