<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-lightning-charge-fill me-1"></i> MyApp
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- Tambah User --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/create') ? 'active' : '' }}" href="{{ url('/user/create') }}">
                        Tambah
                    </a>
                </li>

                {{-- List User --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="{{ url('/user') }}">
                        List
                    </a>
                </li>

                {{-- Tentang --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">
                        Tentang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
