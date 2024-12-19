@extends('layout.content')

@section('content')
<section class="py-3">
    <div class="container">
        <!-- Search bar and heading in the same row -->
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-auto">
                <h4>Review Film Terbaru</h4>
            </div>
            <div class="col-auto">
                <form method="GET" action="{{ route('article.search') }}" class="d-flex align-items-center ms-auto custom-search-bar">
                    <div class="row w-100">
                        <div class="col-sm-8">
                            <div class="input-group input-group-outline">
                                <input class="form-control" type="text" name="query" placeholder="Search articles...">
                            </div>
                        </div>
                        <div class="col-sm-4 ps-0">
                            <button type="submit" class="btn btn-dark w-100">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        @foreach ($articles as $article)
        <div class="col-lg-8 col-md-8 col-12 mx-auto mb-5"> <!-- Notice the mb-5 for margin-bottom -->
            <div class="card card-profile mt-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                        <a href="javascript:;">
                            <div class="p-3 pe-md-0">
                                <!-- Displaying the image dynamically -->
                                <img class="w-100 border-radius-md shadow-lg" 
                                src="{{ asset('storage/images/' . $article->post_image) }}" 
                                alt="image of {{ $article->title }}"></div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                        <div class="card-body ps-lg-0">
                            <h4 class="mb-0">{{ $article->title }}</h4>
                            <h7 style="color: red;">{{ $article->category->name ?? 'Uncategorized' }}</h7>
                            <p>Published on: {{ $article->published_at }}</p>
                            <a href="{{ route('article.show', ['id' => $article->article_id]) }}" class="btn btn-dark btn-sm me-2">Lihat Review</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection