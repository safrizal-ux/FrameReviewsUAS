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
      <h4>User Management</h4>
      <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">+</a>
    </div>
    <div class="row justify-content-center py-2">
      <div class="col-lg-10">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Role ID</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Bio</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Edit</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td class="text-center">
                      <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                    </td>
                    <td class="text-center">
                      <p class="text-xs text-secondary mb-0">{{ $user->role_id }}</p>
                    </td>
                    <td class="text-center">
                      <p class="text-xs text-secondary mb-0">{{ $user->name }}</p>
                    </td>
                    <td class="text-center">
                      <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                    </td>
                    <td class="text-center">
                      <p class="text-xs text-secondary mb-0">{{ $user->bio }}</p>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-warning btn-sm" title="Edit">Edit</a>
                    </td>
                    <td class="text-center">
                      <form action="{{ route('admin.user.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
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
