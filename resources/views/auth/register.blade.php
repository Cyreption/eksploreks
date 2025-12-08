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
            <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Eksploreks" class="mx-auto w-24 h-24" style="object-fit: contain;">
            <h1 class="text-3xl font-bold text-purple-800 mt-5">Register</h1>
        </div>
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name / Username" value="{{ old('name') }}" class="w-full p-3 mb-3 border @error('name') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full p-3 mb-3 border @error('email') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="text" name="institution" placeholder="Institution" value="{{ old('institution') }}" class="w-full p-3 mb-3 border @error('institution') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="text" name="department" placeholder="Department" value="{{ old('department') }}" class="w-full p-3 mb-3 border @error('department') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="date" name="birth_date" placeholder="Birth Date" value="{{ old('birth_date') }}" class="w-full p-3 mb-3 border @error('birth_date') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-3 mb-3 border @error('password') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-3 mb-5 border @error('password') border-red-500 @else border-purple-200 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition shadow-md">Register</button>
        </form>
        <p class="text-center mt-4 text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-purple-600 font-bold hover:underline">Login di sini</a></p>
    </div>
</body>
</html>