@extends('layout.content')

@section('content')
<style>
    .text-black {
        color: #000; /* Sets text color to black */
    }
    .action-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<section class="pt-3 mt-3">
  <div class="container">
    <div class="action-header">
      <h4>Admin Category</h4>
      <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">+</a>
    </div>
    <div class="row justify-content-center py-2">
      <div class="col-lg-10">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Description</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Created At</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Updated At</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Edit</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $category->name }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ Str::limit($category->description, 50) }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $category->created_at->format('Y-m-d H:i:s') }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $category->updated_at->format('Y-m-d H:i:s') }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-warning btn-sm me-2" data-toggle="tooltip" data-original-title="Edit category">
                      Edit
                    </a>
                  </td>
                  <td class="align-middle text-center">
                    <form action="{{ route('admin.category.destroy', $category) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm me-2" data-toggle="tooltip" data-original-title="Delete category">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</section>
@endsection
