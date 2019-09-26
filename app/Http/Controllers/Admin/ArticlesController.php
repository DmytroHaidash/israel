<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.articles.index', [
            'articles' => Article::paginate(20),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.articles.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $article = Article::create($request->only('slug'))->makeTranslation();

        if ($request->hasFile('article')) {
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');
        }
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return \view('admin.articles.edit', compact('article'));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {

        $article->slug = null;
        $article->update();
        $article->updateTranslation();
        if ($request->hasFile('article')) {
            $article->clearMediaCollection('article');
            $article->addMediaFromRequest('article')
                ->toMediaCollection('article');
        }
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно сохранена.');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->clearMediaCollection('article');
        $article->delete();
        return \redirect()->route('admin.articles.index')
            ->with('message', 'Запись успешно удалена.');
    }
}
