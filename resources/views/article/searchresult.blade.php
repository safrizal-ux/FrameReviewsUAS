@extends('layout.content')

@section('content')
<section class="py-6 d-flex justify-content-center">
    <div class="container">
        <h4>Search Results</h4>
        <br>
        <br>
        @forelse($articles as $article)
        <div class="col-lg-8 col-md-8 col-12 mx-auto mb-5">
            <div class="card card-profile mt-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-n5">
                        <a href="{{ route('article.show', ['id' => $article->article_id]) }}">
                            <div class="p-3 pe-md-0">
                                <img class="w-100 border-radius-md shadow-lg" 
                                src="{{ asset('storage/images/' . $article->post_image) }}" 
                                alt="image of {{ $article->title }}">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12 my-auto">
                        <div class="card-body ps-lg-0">
                            <h4 class="mb-0">{{ $article->title }}</h4>
                            <h7 style="color: red;">{{ $article->category_name ?? 'Uncategorized' }}</h7>
                            <p>Published on: {{ $article->published_at }}</p>
                            <a href="{{ route('article.show', ['id' => $article->article_id]) }}" class="btn btn-dark btn-sm me-2">Lihat Review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <p class="text-center">No articles found.</p>
        @endforelse

        {{ $articles->links() }} {{-- Pagination links --}}
    </div>
</section>
@endsection
