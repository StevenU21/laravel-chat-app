<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Aplicación</title>
    <!-- Enlaces a Tailwind CSS desde CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Enlace a particles.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
</head>

<body class="bg-purple-100">
    <div id="particles-js" class="absolute inset-0 z-0"></div>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md text-center relative z-10">
            <h1 class="text-7xl font-bold mb-4 text-purple-400">Laravel Chat</h1>
            <h2 class="text-3xl font-semibold mb-4 text-purple-500">¡Bienvenido!</h2>
            <p class="text-gray-600 mb-6">Explora usuarios conectados y habla con ellos!.</p>

            <div class="flex flex-col space-y-4">
                <a href="{{ route('login') }}"
                    class="bg-purple-400 text-white px-6 py-3 rounded-md hover:bg-purple-300 transition duration-300">
                    <i class="fas fa-comments mr-2"></i> Comenzar
                </a>
            </div>
        </div>
        @include('components/fondo-mov')
</body>

</html>
