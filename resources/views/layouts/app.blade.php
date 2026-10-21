<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Gestor ADSO')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { max-width: 1040px; margin: 24px auto; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; padding: 0 16px; color: #1e293b; background-color: #ffffff; }
        header { border-bottom: 2px solid #e2e8f0; padding-bottom: 12px; margin-bottom: 20px; }
        .logo-title { font-size: 20px; font-weight: 700; color: #0f172a; margin: 0; }
        .sub-title { font-size: 13px; color: #64748b; margin: 2px 0 0 0; }
        nav.main-nav { background: #f8fafc; border: 1px solid #e2e8f0; padding: 10px 16px; border-radius: 8px; margin-bottom: 24px; display: flex; align-items: center; gap: 16px; }
        nav.main-nav a { color: #0284c7; text-decoration: none; font-weight: 600; font-size: 15px; }
        nav.main-nav a:hover { text-decoration: underline; }
        .flash { background: #e6ffed; border: 1px solid #86efac; color: #166534; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px; font-weight: 500; font-size: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .alert-danger { background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 12px 18px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
        .alert-danger ul { margin: 6px 0 0 18px; padding: 0; }
        .btn { display: inline-block; background: #0284c7; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 14px; border: none; cursor: pointer; transition: background 0.15s; }
        .btn:hover { background: #0369a1; }
        .card { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.04); }
        label { display: block; font-size: 14px; font-weight: 600; margin-bottom: 14px; color: #334155; }
        input { display: block; width: 100%; max-width: 420px; padding: 8px 12px; margin-top: 5px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; box-sizing: border-box; }
        input:focus { outline: none; border-color: #0284c7; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; font-size: 14px; }
        th { background: #f8fafc; border-bottom: 2px solid #e2e8f0; padding: 12px 14px; text-align: left; font-weight: 600; color: #475569; }
        td { padding: 12px 14px; border-bottom: 1px solid #e2e8f0; color: #334155; }
        tr:hover td { background-color: #f8fafc; }
        .badge { display: inline-block; padding: 3px 8px; font-size: 12px; font-weight: 600; border-radius: 4px; background: #e2e8f0; color: #475569; }
        .badge-ficha { background: #e0f2fe; color: #0369a1; }
        .badge-id { background: #f1f5f9; color: #64748b; font-family: monospace; }
        .pagination-container { margin-top: 24px; display: flex; justify-content: center; }
        .pagination-container nav svg { max-height: 16px; display: inline-block; vertical-align: middle; }
    </style>
</head>
<body>
    <header>
        <h1 class="logo-title">Gestor ADSO — v03</h1>
        <p class="sub-title">SENA CTMA | Módulo Aprendices (Semana 3 - Migraciones, Modelos, Seeders y Eloquent)</p>
    </header>

    <nav class="main-nav">
        <a href="/aprendices">Aprendices</a>
    </nav>

    @if(session('ok'))
        <div class="flash">
            ✓ {{ session('ok') }}
        </div>
    @endif

    @yield('content')
</body>
</html>
