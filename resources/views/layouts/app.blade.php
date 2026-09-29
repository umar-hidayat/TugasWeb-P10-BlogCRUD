<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DE Pipeline Log')</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Fira Code / JetBrains Mono Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Inter:wght@400;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0d1117;
            color: #c9d1d9;
        }
        code, pre, .font-mono {
            font-family: 'Fira Code', monospace;
        }
        .navbar-custom {
            background-color: #161b22;
            border-bottom: 1px solid #30363d;
        }
        .card-custom {
            background-color: #161b22;
            border: 1px solid #30363d;
            border-radius: 8px;
        }
        .btn-primary-de {
            background-color: #238636;
            border-color: #2ea043;
            color: #fff;
        }
        .btn-primary-de:hover {
            background-color: #2ea043;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand text-light fw-bold font-mono fs-5" href="{{ route('posts.index') }}">
                <i class="bi bi-database-fill-gear text-success me-2"></i>DE_Logs::Pipeline
            </a>
            <span class="badge bg-dark border border-secondary text-success font-mono fs-6">
                <i class="bi bi-circle-fill text-success fs-6 me-1"></i> STATUS: ACTIVE
            </span>
        </div>
    </nav>

    <div class="container pb-5">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>