<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eksploreks</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-purple-300 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl p-10 w-full max-w-sm transform transition-all hover:scale-105">
        <div class="text-center mb-8">
            <img src="https://via.placeholder.com/100/9333ea/ffffff?text=Pin" class="mx-auto rounded-full shadow-lg w-24 h-24">
            <h1 class="text-3xl font-bold text-purple-800 mt-5">Welcome!</h1>
        </div>
        <form action="/dashboard" method="get">
            <input type="text" placeholder="Name / Username" class="w-full p-4 mb-4 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-700 text-lg">
            <input type="password" placeholder="Password" class="w-full p-4 mb-6 border border-purple-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 text-gray-700 text-lg">
            <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-xl font-bold text-xl hover:bg-purple-700 transition shadow-lg">Login</button>
            <p class="text-center mt-6 text-sm text-gray-600">
                Don't Have Account? <a href="/register" class="text-purple-700 font-bold hover:underline">Register</a>
            </p>
        </form>
    </div>
</body>
</html>