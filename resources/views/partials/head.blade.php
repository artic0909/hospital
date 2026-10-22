<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
    {{ filled($title ?? null) ? $title.' - '.config('app.name', 'Heal Go Fly') : config('app.name', 'Heal Go Fly') }}
</title>

<link rel="icon" href="/logo.png" type="image/png">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="apple-touch-icon" href="/logo.png">

@fonts

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
