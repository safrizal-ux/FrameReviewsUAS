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
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                        id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                        <img src="{{ asset('assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n8 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Landing Pages
                            </h6>
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>About Us</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Contact Us</span>
                            </a>
                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                <span>Author</span>
                            </a>
                            <h6
                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                Account
                            </h6>
                            <a href="{{ route('logout') }}" class="dropdown-item border-radius-md">
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                        id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                        <img src="{{ asset('assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n8 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Landing Pages
                            </h6>
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>About Us</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Contact Us</span>
                            </a>
                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                <span>Author</span>
                            </a>
                            <h6
                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                Account
                            </h6>
                            <a href="{{ route('logout') }}" class="dropdown-item border-radius-md">
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="{{ route('article.create') }}">
                        <p class="d-inline text-sm z-index-1 font-weight-semibold" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" data-bs-original-title="Star us on Github">Write</p>
                    </a>
                </li>
            </ul>

            <!-- Bagian kanan (Search bar) -->

            <form method="GET" action="{{ route('article.search') }}" class="d-flex align-items-center ms-auto custom-search-bar">
                <div class="row w-100">
                    <div class="col-sm-8">
                        <div class="input-group input-group-outline">
                            <input class="form-control" type="text" name="query" placeholder="Search articles...">
                        </div>
                    </div>
                    <div class="col-sm-4 ps-0">
                        <button type="submit" class="btn btn-dark w-100">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>

<style>
    .custom-search-bar {
        margin-top: 10px; /* Turunkan search bar */
    }
</style>
