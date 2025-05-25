<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        // キーワード検索(なければ全件取得)
        if($keyword){
            $faqs = Faq::where('question', 'like', "%{$keyword}%")->paginate(5);
        } else {
            $faqs = Faq::paginate(5);
        }

        return view('faqs.index', compact('keyword', 'faqs'));
    }
}