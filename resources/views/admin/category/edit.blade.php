@extends('layout.content')

@section('content')
<style>
    .text-black {
        color: #000; /* Sets text color to black */
    }
</style>

<section class="pt-3 mt-3">
    <div class="container">
        <h4>Edit Category</h4>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4">
                    <form action="{{ route('admin.category.update', ['category' => $category->category_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <!-- Category Name -->
                        <label for="name" class="form-label text-black">Category Name</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name" value="{{ old('name', $category->name) }}" required>
                        </div>
                    
                        <!-- Description -->
                        <label for="description" class="form-label text-black">Description</label>
                        <div class="input-group input-group-outline mb-4">
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Description (optional)">{{ old('description', $category->description) }}</textarea>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary me-2">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
@endsection
