<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <!-- Tambahkan CSS dan JS sesuai kebutuhan -->
</head>
<body>
    <div class="layout">
        @yield('content') <!-- Ganti {{ $slot }} dengan @yield('content') -->
    </div>
</body>
</html>
