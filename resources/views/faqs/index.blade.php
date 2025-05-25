@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4">よくあるご質問（FAQ）</h1>

            <form action="{{ route('faqs.index') }}" method="GET" class="mb-5">
                <div class="d-flex">
                    <input class="form-control samuraimart-header-search-input me-1" placeholder="キーワードを入力"
                        name="keyword" value="{{ $keyword }}">
                    <button type="submit" class="btn samuraimart-header-search-button"><i
                            class="fas fa-search samuraimart-header-search-icon"></i></button>
                </div>
            </form>

            @if ($keyword !== null)
            @if ($faqs->isEmpty())
            <h2>該当する検索結果が見つかりませんでした。</h2>
            @else
            <h2 class="mb-4">"{{ $keyword }}"の検索結果<span class="ms-3">{{ number_format($faqs->total()) }}件</span> </h2>
            @endif
            @endif

            @foreach ($faqs as $faq)
            <div class="row mb-4">
                <div class="col-md-1">
                    <span class="fw-bold">Q</span>
                </div>
                <div class="col">
                    <p class="mb-0">{{ $faq->question }}</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-1">
                    <span class="fw-bold">A</span>
                </div>
                <div class="col">
                    <p class="mb-0">{{ $faq->answer }}</p>
                </div>
            </div>

            <hr class="mb-4">
            @endforeach

            <div class="mb-4">
                // appends：ページネーションリンクを追加
                {{ $faqs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

@endsection