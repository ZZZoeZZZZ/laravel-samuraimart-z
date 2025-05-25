<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;

// トップページ用コントローラ
class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_categories = MajorCategory::all();
        $recently_products = Product::orderBy('created_at', 'desc')->take(4)->get();
        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();
        // withAvg(テーブル名, カラム名) → テーブル名_avg_カラム名 を生成
        $featured_products = Product::withAvg('reviews', 'score')->orderBy('reviews_avg_score', 'desc')->take(4)->get();

        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products', 'featured_products'));
    }
}