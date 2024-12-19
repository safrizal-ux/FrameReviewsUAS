@extends('layout.content')

@section('content')
{{-- <style>
    .text-black {
        color: #000; /* Sets text color to black */
    }
</style>

<section class="pt-3 mt-3">
    <div class="container">
        <h4>Create New Article</h4>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4">
                    <form action="{{ route('admin.article.store') }}" method="POST">
                        @csrf

                        <!-- Title -->
                        <label for="title" class="form-label text-black">Title</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <!-- Content -->
                        <label for="content" class="form-label text-black">Content</label>
                        <div class="input-group input-group-outline mb-4">
                            <textarea name="content" id="content" class="form-control" rows="6" placeholder="Enter Content" required></textarea>
                        </div>

                        <!-- Published At -->
                        <label for="published_at" class="form-label text-black">Published At</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="datetime-local" name="published_at" id="published_at" class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.article.index') }}" class="btn btn-secondary me-2">Back</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</section> --}}
@extends('layout.content')

@section('content')
    <br>
    <br>
    <section>
        <div class="row">
            <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                <h3 class="text-center">Review Something</h3>
                <form role="form" id="contact-form" method="post" action="{{ route('article.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input for user ID -->
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    
                    <div class="card-body">
                        <label for="category" class="form-label">Category</label>
                        <div class="mb-4 input-group input-group-dynamic">
                            <select class="form-control" name="category" id="category" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="imageUpload" class="form-label">Upload Image</label>
                        <div class="mb-4 input-group input-group-static">
                            <input type="file" class="form-control" id="imageUpload" name="image">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Title</label>
                            <div class="input-group input-group-dynamic">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="input-group mb-4 input-group-static">
                            <label>Content</label>
                            <textarea id="summernote" name="content" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-check form-switch mb-4 d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label ms-3 mb-0" for="flexSwitchCheckDefault">I agree to the <a
                                    href="javascript:;" class="text-dark"><u>Terms and Conditions</u></a>.</label>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@section('page-js')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Enter text here...', // Optional placeholder text
                tabsize: 2,
                height: 120 // Adjust height as needed
            });
        });
    </script>
@endsection

@endsection
