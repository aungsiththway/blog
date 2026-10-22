<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front-asset/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('index')}}">Blog Project</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>

                @guest
                <a href="/login" class="btn btn-primary mx-3">Login</a>
                <a href="/register" class="btn btn-outline-light">Register</a>
                @else
                    <div class=" dropdown mx-3">
                        <a class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->role == 'user')
                                <li><a class="dropdown-item" href="/admin">Profile</a></li>
                            @else
                            <li><a class="dropdown-item" href="/admin">Admin Panel</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif

            </div>
        </nav>

    <main>
        <div class="container-fluid px-4">
            <div class="my-5">
                <h1 class="mt-4 d-inline">Search Results</h1>
                <a href="{{'/'}}" class="btn btn-danger float-end">Back</a>
            </div>

            @if($search !== '')
                <p>
                    Search keyword:
                    <strong>{{ $search }}</strong>
                </p>
            @endif

            @forelse($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">

                        <h3 class="card-title">
                            {{ $post->title }}
                        </h3>

                        <p class="card-text">
                            {{ $post->content }}
                        </p>

                    </div>
                </div>
            @empty
                <div class="alert alert-warning">
                    No posts found. Please try another keyword.
                </div>
            @endforelse

            <div class="mt-4">
                {{ $posts->links() }}
            </div>


        </div>
    </main>


            <!-- Footer-->
        <footer class="py-5 bg-dark mt-auto">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- For jQuery -->
        <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front-asset/js/scripts.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front-asset/js/scripts.js')}}"></script>
    </body>
</html>
