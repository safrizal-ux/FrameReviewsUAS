@extends('layout.content')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify-content-center text-center my-sm-5">
                <span class="badge bg-success mb-3">Upload</span>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                <h3 class="text-center">Review Something</h3>
                <form role="form" id="contact-form" method="post" action="{{ route('article.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
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
                            {{-- <textarea name="content" class="form-control" id="content" rows="4"></textarea> --}}
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
