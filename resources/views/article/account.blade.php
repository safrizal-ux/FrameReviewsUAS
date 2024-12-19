@extends('layout.content')

@section('content')
<section class="py-sm-7 py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="mt-n8 mt-md-n9 text-center">
                    <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../../assets/img/bruce-mars.jpg" alt="{{ $name }}" loading="lazy">
                </div>
                <div class="row py-5">
                    <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mb-0">{{ $name }}</h3>
                            <div class="d-block">
                                <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto">
                                <span class="h6">323</span>
                                <span>Posts</span>
                            </div>
                            <div class="col-auto">
                                <span class="h6">3.5k</span>
                                <span>Followers</span>
                            </div>
                            <div class="col-auto">
                                <span class="h6">260</span>
                                <span>Following</span>
                            </div>
                        </div>
                        <p class="text-lg mb-0">
                            {{ $bio }} <br><a href="javascript:;" class="text-info icon-move-right">More about me
                                <i class="fas fa-arrow-right text-sm ms-1"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
