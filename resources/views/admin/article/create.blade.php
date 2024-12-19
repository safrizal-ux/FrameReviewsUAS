@extends('layout.content')

@section('content')
<style>
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
</section>
@endsection
