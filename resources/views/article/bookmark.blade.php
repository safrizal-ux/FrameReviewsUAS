@extends('layout.content')

@section('content')
<section class="pt-3 mt-3">
    <div class="container">
        <!-- Search bar and heading in the same row -->
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-auto">
                <h4>Bookmarked Articles</h4>
            </div>
            <div class="col-auto">
                
            </div>
        </div>
        <br>

        @foreach ($bookmarks as $bookmark)
        <div class="col-lg-8 col-md-8 col-12 mx-auto mb-5"> <!-- Notice the mb-5 for margin-bottom -->
            <div class="card card-profile mt-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                        <a href="javascript:;">
                            <div class="p-3 pe-md-0">
                                <!-- Displaying the image dynamically -->
                                <img class="w-100 border-radius-md shadow-lg" 
                                src="{{ asset('storage/images/' . $bookmark->article->post_image) }}" 
                                alt="image of {{ $bookmark->article->title }}"></div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                        <div class="card-body ps-lg-0">
                            <h4 class="mb-0">{{ $bookmark->article->title }}</h4>
                            <h7 style="color: red;">{{ $bookmark->article->category->name ?? 'Uncategorized' }}</h7>
                            <p>Published on: {{ $bookmark->article->published_at }}</p>
                            <a href="{{ route('article.show', ['id' => $bookmark->article->article_id]) }}" class="btn btn-dark btn-sm me-2">Lihat Review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
