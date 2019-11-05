<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MethodsController extends Controller
{
    public function index()
    {
        $category = Category::where('thread', 'methods')->first();
        $articles = Method::where('category_id', $category->id)->get();
        $article = $articles->first();
        return \view('app.methods.index', compact('category', 'articles', 'article'));
    }

    public function show(Method $item)
    {

        $article = $item;
        $category = Category::where('id', $article->category_id)->first();
        $articles = Method::where('category_id', $category->id)->get();
        return \view('app.methods.index', compact('category', 'articles', 'article'));
    }
}