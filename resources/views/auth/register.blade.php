<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Eksploreks</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-purple-300 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-sm">
        <div class="text-center mb-6">
            <img src="https://via.placeholder.com/100/9333ea/ffffff?text=Pin" class="mx-auto rounded-full shadow-lg w-24 h-24">
            <h1 class="text-3xl font-bold text-purple-800 mt-5">Register</h1>
        </div>
        <form action="/dashboard" method="get">
            <input type="text" placeholder="Name / Username" class="w-full p-3 mb-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="email" placeholder="Email" class="w-full p-3 mb-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="text" placeholder="Institution" class="w-full p-3 mb-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="text" placeholder="Department" class="w-full p-3 mb-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="date" placeholder="Birth Date" class="w-full p-3 mb-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="password" placeholder="Password" class="w-full p-3 mb-5 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition shadow-md">Register</button>
        </form>
    </div>
</body>
</html>