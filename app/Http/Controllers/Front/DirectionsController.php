<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Models\Direction;
use App\Models\Method;
use App\Http\Controllers\Controller;
use function view;

class DirectionsController extends Controller
{
    public function index()
    {
        if (!$item->title) {
            $category = Category::where('thread', 'directions')->where('published', 1)->has('directions')->first();
        } else {
            $category = $item;
        }
        $methods = Category::where('thread', 'directions')->where('published', 1)->inRandomOrder()->take(6)->get();
        $articles = Direction::where('category_id', $category->id)->where('published', 1)->get();
        $article = $articles->first();

        return view('app.directions.index', compact('category', 'articles', 'article', 'methods'));
    }

    public function show(Category $category)
    {
        $methods = Direction::published()->whereHas('categories', function($query) use ($category) {
            $query->where('id', $category);
        });

        return view('app.directions.index', compact('category', 'methods'));
    }
}
