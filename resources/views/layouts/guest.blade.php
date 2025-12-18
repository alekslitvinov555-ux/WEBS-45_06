<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white relative overflow-x-hidden">

    <!-- Наш фирменный шум -->
    <div class="bg-noise"></div>

    <!-- Здесь будет отображаться login/register -->
    <div class="min-h-screen">
        {{ $slot }}
    </div>

</body>
</html>
