<header>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand " href="{{route("welcome")}}">
             <span class="logo-custom">PRESTO<span class="tx1">.</span><span class="tx2">it</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-width" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route("welcome")}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("showAll")}}">{{__('ui.Tutti gli annunci')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("createAnnouncement")}}">{{__('ui.Inserisci annuncio')}}</a>
                    </li>
                @if(Auth::user())
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route("contact")}}">{{__('ui.Lavora con noi')}}</a>
                    </li>
                @endif
                    @guest

                    <li class="nav-item d-none">
                        <a class="nav-link" href="{{route('home')}}">
                            Revisor Home
                        </a>
                    </li>
                    @else
                    @if(Auth::user()->is_revisor)
                    <li class="nav-item">
                        <div type="button" class="position-relative">
                            <a class="nav-link" href="{{route('home')}}">
                                Revisor Home
                                <span class="position-absolute my-not top-0 start-100 translate-middle badge rounded-pill bg-danger my-not">
                                    {{\App\Models\Announcement::ToBeRevisionedCount()
                                    }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    @endif
                    @endguest
                </u>
            </ul>
            <a class="nav-item dropdown text-light ">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user text-light"></i>
                </a>
                <ul class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink">
                    @guest
                    <li><a class="nav-link dropdown-item" tabindex="-1" aria-disabled="true" href="{{route("login")}}">{{__('ui.Accedi')}}</a></li>
                    <li><a class="nav-link dropdown-item" tabindex="-1" aria-disabled="true" href="{{route("register")}}">{{__('ui.Registrati')}}</a></li>
                    @else
                    {{-- @if(Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link dropdown-item" href="{{route('home')}}">
                            Revisor Home
                            <span class="badge badge-pill badge-warning">{{
                                \App\Models\Announcement::ToBeRevisionedCount()
                            }}</span>
                        </a>
                    </li>
                    @endif --}}
                    <div><a class="nav-link dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </a>
        </div>

        <a>
            @include('layouts._locale', ['lang' => 'it', 'nation'=>'it'])
        </a>

        <a>
            @include('layouts._locale', ['lang' => 'eng', 'nation'=>'gb'])
        </a>

        <a>
            @include('layouts._locale', ['lang' => 'es', 'nation'=>'es'])
        </a>
    </div>
</nav>
</header>