<!DOCTYPE html>
<html>

<head>
    <title>AdiDash | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/dist/css/normalize.css" />
    <link rel="stylesheet" href="/dist/css/bulma.css" />
    <link rel="stylesheet" href="/dist/css/app.css" />
    <link rel="stylesheet" href="/dist/css/css.gg.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap"
        rel="stylesheet" />
    @yield('head')
</head>

<body>
    <div class="sidebar">
        <h1>ADIDASH</h1>
        <a class="active" href="{{ route('student.home') }}">
            <div><i class="gg-home-alt"></i></div>
            Accueil
        </a>
        <a href="{{ route('student.tasks') }}">
            <div><i class="gg-work-alt"></i></div>
            Tâches
        </a>
        <a href="{{ route('student.projects') }}">
            <div><i class="gg-copy"></i></div>
            Projets
        </a>

        @foreach (Auth::user()->ownedProjects as $project)
            <div class="nav-separator"></div>
            <a href="#" class="nav-header">{{ $project->name }}</a>
            <a href="{{ route('project-admin.home', ['project' => $project->id]) }}">
                <div><i class="gg-pen"></i></div>
                Gestion du projet
            </a>
            <a href="#news">
                <div><i class="gg-work-alt"></i></div>
                Tâches
            </a>
        @endforeach
    </div>

    <div class="page-content">
        <div class="topbar">
            <div class="notifications">
                <p><i class="far fa-user"></i></p>
            </div>
            <div class="profile">
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        <a aria-haspopup="true" aria-controls="dropdown-menu">
                            <span><i class="far fa-user"></i>{{ Auth::user()->fullName }}
                                @if (Auth::user()->hasClassGroup())
                                    ({{ Auth::user()->getClassGroup()->name }}) @endif
                            </span>
                        </a>
                    </div>
                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a class="dropdown-item" href={{ route('settings') }}>
                                Paramètres
                            </a>
                            <a class="dropdown-item" href={{ route('logout') }}>
                                Déconnexion
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="inner page-{{ str_replace('.', '-', $view_name) }}">
            <h2 class="page-title">
                @yield('page_name')
            </h2>
            @yield('content')
        </div>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
    <script src="/dist/js/app.js"></script>
    @yield('script')
</body>

</html>
