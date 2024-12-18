@extends('layout.content')

@section('content')
<br>
<br>
<section class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <div class="card card-blog card-plain">
            <div class="card-header p-0 position-relative z-index-2">
              <a class="d-block blur-shadow-image">
                <img src="{{ asset('storage/images/' . $article->post_image) }}" alt="image of {{ $article->title }}" class="img-fluid border-radius-lg">
              </a> 
              <div class="colored-shadow" style="background-image: url('{{ asset('storage/images/' . $article->post_image) }}');"></div>
            </div>
            <div class="card-body px-0 pt-4">
              <p style="color: red;">{{ $article->category_name }}</p> {{-- dynamically fetched category name --}}
                <h4>
                  {{ $article->title }} {{-- dynamically fetched title --}}
                </h4>
                <br>
              <div style="text-align: left;">
                {!! $clean_html !!} {{-- dynamically fetched and cleaned content --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
