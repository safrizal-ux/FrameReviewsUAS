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
                {{-- @if (in_array(auth()->user()->role_id, [1, 2])) --}}
                @if (auth()->user()->role_id == 2)
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
                        <a class="nav-link nav-link-icon me-2" href="{{route('article.account')}}">
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
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2" href="{{route('bookmark.index')}}">
                            <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Star us on Github">Bookmark</p>
                        </a>
                    </li>
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->role_id == 1)
                        <!-- Periksa apakah user memiliki role 1 -->
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="{{ route('article.index') }}">
                                <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Star us on Github">Home</p>
                            </a>
                        </li>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="">
                                <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Star us on Github">|</p>
                            </a>
                        </li>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="{{route('admin.article.index')}}">
                                <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Star us on Github">Article</p>
                            </a>
                        </li>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="{{route('admin.user.index')}}">
                                <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Star us on Github">User</p>
                            </a>
                        </li>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link nav-link-icon me-2" href="{{route('admin.category.index')}}">
                                <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-original-title="Star us on Github">Category</p>
                            </a>
                        </li>

                    @endif
                @endauth
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="">
                        <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="Star us on Github">|</p>
                    </a>
                </li>
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="{{ route('logout') }}">
                        <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="Star us on Github">Logout</p>
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
