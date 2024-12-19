<nav
    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 p-2 start-0 end-0 mx-4">
    <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3 text-sm" href="{{ route('article.index') }}" rel="tooltip"
            title="Designed and Coded by Creative Tim" data-placement="bottom style=">
            FrameReviews
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
            <!-- Bagian tengah -->
            <ul class="navbar-nav navbar-nav-hover mx-auto">
                @auth
                @if (in_array(auth()->user()->role_id, [1, 2]))
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2" href="{{ route('article.index') }}">
                            <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Star us on Github">Home</p>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2" href="{{ route('article.create') }}">
                            <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Star us on Github">Write</p>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2" href="">
                            <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Star us on Github">Account</p>
                        </a>
                    </li>
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2" href="{{route('article.history')}}">
                            <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Star us on Github">History</p>
                        </a>
                    </li>
                        
                       
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->role_id == 1)
                        <!-- Periksa apakah user memiliki role 1 -->
                        <li class="nav-item dropdown dropdown-hover mx-2">
                            <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                                id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                                <img src="{{ asset('assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                                    class="arrow ms-auto ms-md-2">
                            </a>
                            <div class="dropdown-menu dropdown-menu-animation ms-n8 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                                aria-labelledby="dropdownMenuPages">
                                <div class="d-none d-lg-block">
                                    <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                        Admin Pages
                                    </h6>
                                    <a href="{{route('admin.article.index')}}" class="dropdown-item border-radius-md">
                                        <span>Article</span>
                                    </a>
                                    <a href="{{route('admin.user.index')}}" class="dropdown-item border-radius-md">
                                        <span>User</span>
                                    </a>
                                    <a href="{{route('admin.category.index')}}" class="dropdown-item border-radius-md">
                                        <span>Category</span>
                                    </a>
                                    
                                </div>
                            </div>
                        </li>
                        
                    @endif
                @endauth
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="{{ route('article.create') }}">
                        <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="Star us on Github">Write</p>
                    </a>
                </li>
            </ul>

            <!-- Bagian kanan (Search bar) -->
        </div>
    </div>
</nav>

<style>
    .custom-search-bar {
        margin-top: 10px; /* Turunkan search bar */
    }
</style>
