@extends('layout.content')

@section('content')
<section class="pt-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="card card-blog card-plain">
                    <div class="card-header p-0 position-relative z-index-2">
                        <a class="d-block blur-shadow-image">
                            <img src="{{ asset('storage/images/' . $article->post_image) }}" 
                                 alt="image of {{ $article->title }}" 
                                 class="img-fluid border-radius-lg">
                        </a>
                        <div class="colored-shadow" 
                             style="background-image: url('{{ asset('storage/images/' . $article->post_image) }}');"></div>
                    </div>
                    <div class="card-body px-0 pt-4">
                        <p style="color: red;">{{ $article->category_name }}</p>
                        <h4>{{ $article->title }}</h4>
                        <br>
                        <div style="text-align: left;">
                            {!! $clean_html !!}
                        </div>
                    </div>
                    <p>Written by: <strong>{{ $article->author_name }}</strong></p>
                </div>

                {{-- Like Button --}}
                <button id="like-btn" class="btn btn-primary mt-3">
                    <span id="like-count">{{ $article->likes }}</span> Likes
                </button>

                {{-- Comment Section --}}
                <h5 class="mt-5">Comments</h5>

                @foreach($comments as $comment)
                    <div class="card mt-3">
                        <div class="card-body">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->content }}</p>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach

                {{-- Add Comment Form --}}
                <form action="{{ route('comment.store', $article->article_id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="4" placeholder="Add your comment..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('like-btn').addEventListener('click', function () {
        fetch("{{ route('article.like', $article->article_id) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('like-count').textContent = data.likes;
            }
        });
    });
</script>
@endsection
