@extends('layout.content')

@section('content')
<style>
  .text-black {
    color: #000; /* Sets text color to black */
  }
</style>

<section class="pt-5 mt-5">
  <div class="container">
    <h4>Admin Categories</h4>
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 text-black">Name</th>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 ps-2 text-black">Description</th>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 ps-2 text-black">Created At</th>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 ps-2 text-black">Updated At</th>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 ps-2 text-black">Edit</th>
                  <th class="text-uppercase text-s font-weight-bolder opacity-7 ps-2 text-black">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($category as $item)
                <tr>
                  <td>
                    <p class="text-s text-black">{{ $item->name }}</p>
                  </td>
                  <td>
                    <p class="text-s text-black">{{ Str::limit($item->description, 50) }}</p>
                  </td>
                  <td>
                    <p class="text-s text-black">{{ $item->created_at->format('Y-m-d H:i:s') }}</p>
                  </td>
                  <td>
                    <p class="text-s text-black">{{ $item->updated_at->format('Y-m-d H:i:s') }}</p>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning w-auto me-2" data-toggle="tooltip" data-original-title="Edit category">
                      Edit
                    </a>
                  </td>
                  <td>
                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger w-auto me-2">Delete</button>
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
