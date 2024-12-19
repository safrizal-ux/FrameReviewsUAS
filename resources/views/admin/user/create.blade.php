@extends('layout.content')

@section('content')
<style>
    .text-black {
        color: #000; /* Sets text color to black */
    }
</style>

<section class="pt-3 mt-3">
    <div class="container">
        <h4>Create New User</h4>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf

                        <!-- Role Dropdown -->
                        <label for="role_id" class="form-label text-black">Role</label>
                        <div class="input-group input-group-outline mb-4">
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="" disabled selected>-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role_id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name -->
                        <label for="name" class="form-label text-black">Name</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <!-- Email -->
                        <label for="email" class="form-label text-black">Email</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                        </div>

                        <!-- Password -->
                        <label for="password" class="form-label text-black">Password</label>
                        <div class="input-group input-group-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                        </div>

                        <!-- Bio -->
                        <label for="bio" class="form-label text-black">Bio</label>
                        <div class="input-group input-group-outline mb-4">
                            <textarea name="bio" id="bio" class="form-control" rows="4" placeholder="Enter Bio (optional)"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary me-2">Back</a>
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
