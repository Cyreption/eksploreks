<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset UPC="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksploreks!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { height: 100%; overflow: hidden; background: linear-gradient(135deg, #e0c3fc, #c084fc); }
        .splash { display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; color: white; animation: fadeIn 2s ease-out; }
        .logo { width: 200px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3)); animation: float 3s ease-in-out infinite; }
        .title { font-size: 4.5rem; font-weight: 900; margin-top: 30px; letter-spacing: 3px; text-shadow: 0 6px 12px rgba(0,0,0,0.3); }
        .diagonal { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, transparent 65%, rgba(255,255,255,0.25) 65%); transform: skewY(-10deg); z-index: -1; }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.85); } to { opacity: 1; transform: scale(1); } }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-25px); } }
    </style>
</head>
<body>
    <div class="diagonal"></div>
    <div class="splash">
        <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Eksploreks" class="logo" style="width: 100px; height: auto;">
        <div class="title">Eksploreks</div>
    </div>

    <script>
        setTimeout(() => window.location.href = '/login', 3000);
    </script>
</body>
</html>