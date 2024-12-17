<?php

namespace App\Http\Controllers\Front\Developro\Article;

use App\Http\Controllers\Controller;
use App\Models\InvestmentArticles;
use App\Models\Page;
use App\Repositories\InvestmentArticleRepository;
use App\Repositories\InvestmentRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class IndexController extends Controller
{
    private InvestmentRepository $repository;
    private InvestmentArticleRepository $articleRepository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository, InvestmentArticleRepository $articleRepository)
    {
        $this->repository = $repository;
        $this->articleRepository = $articleRepository;
        $this->pageId = 11;
    }

    public function index()
    {
        $investmentArticles = InvestmentArticles::all();
        $menu_page = Page::where('id', $this->pageId)->first();
        $tabs = $this->prepareTabs($investmentArticles);

        return view('front.developro.investment.news', [
            'page' => $menu_page,
            'investment_news' => $investmentArticles,
            'tabs' => $tabs
        ]);
    }

    private function prepareTabs(Collection $investmentArticles): array
    {
        $articles = $investmentArticles;
        $investments = $articles->pluck('investment')->unique('id');
        $cities = $investments->pluck('city')->unique('id');
        $locations = $cities->pluck('name','slug');

        // Initialize tabs with "All" tab
        $tabs = [[
            'id' => 'all',
            'label' => 'Wszystkie',
            'streets' => []
        ]];

        // Create location-specific tabs
        foreach ($locations as $id => $label) {
            $filteredArticles = $investmentArticles->filter(
                function ($article) use ($id) {
                    $investment = $article->investment()->first();
                    $city = $investment->city()->first();
                    return $city->slug === $id;
                }
            );

            if ($filteredArticles->isNotEmpty()) {
                $tabs[] = [
                    'id' => $id,
                    'label' => $label,
                    'streets' => $this->prepareStreetData($filteredArticles)
                ];
            }
            
        }

        return $tabs;
    }

    private function prepareStreetData(Collection $articles): array
    {
        return $articles->map(function ($article) {
            $investment = $article->investment()->first();
            $city = $investment->city()->first();
            
            return [
                'name' => $article->title,
                'boxId' => 'box-' . $article->id,
                'location' => $city->name,
                'data_location' => $city->slug,
                'date' => Carbon::parse($article->created_at)->format('d.m.Y'),
                'subtitle' => $article->subtitle,
                'href' => route('front.investment.news.show', ['article' => $article->slug]),
                'webpSmall' => '$article->getWebpSmallPath()',
                'webpLarge' => '$article->getWebpLargePath()',
                'pngSmall' => '$article->getPngSmallPath()',
                'pngLarge' => '$article->getPngLargePath()',
                'defaultSrc' => $article->file,
                'alt' => 'Dziennik budowy - zdjęcie budowy'
            ];
        })->toArray();
    }

    public function show ($article)
    {

        $investmentArticle = $this->articleRepository->findBySlug($article);
        $menu_page = Page::where('id', $this->pageId)->first();

        $progressData = collect([]);
        $investment = $investmentArticle->investment;


        if (!is_null($investment->progress)) {
            $lines = explode("\n", $investment->progress);

            $progressData = collect($lines)->map(function ($line) {
                $parts = explode(';', $line);
                return [
                    'number' => $parts[0],
                    'date' => $parts[1] ?: '',
                    'title' => $parts[2],
                    'highlight' => isset($parts[3]) && $parts[3] == '1',
                ];
            });
        }

        return view('front.developro.investment.news-show', [
            'page' => $menu_page,
            'article' => $investmentArticle,
            'progressData' => $progressData
        ]);
    }
}
