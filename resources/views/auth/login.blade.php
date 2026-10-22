<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SabuMarket</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: white;
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(rgba(15, 23, 42, .82), rgba(15, 23, 42, .94)),
                url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1920&q=85')
                center / cover fixed no-repeat;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
        }

        .brand {
            margin-bottom: 25px;
            text-align: center;
        }

        .brand a {
            color: white;
            font-size: 28px;
            font-weight: 800;
            text-decoration: none;
        }

        .brand i {
            color: #22d3ee;
            margin-right: 8px;
        }

        .brand p {
            margin-top: 8px;
            color: #cbd5e1;
            font-size: 14px;
        }

        .login-card {
            padding: 34px;
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 20px;
            background: rgba(15,23,42,.75);
            box-shadow: 0 25px 70px rgba(0,0,0,.35);
            backdrop-filter: blur(18px);
        }

        .login-card h1 {
            margin-bottom: 8px;
            font-size: 25px;
        }

        .subtitle {
            margin-bottom: 25px;
            color: #94a3b8;
            font-size: 14px;
        }

        .alert {
            margin-bottom: 18px;
            padding: 12px;
            color: #fecaca;
            border: 1px solid rgba(248,113,113,.35);
            border-radius: 9px;
            background: rgba(127,29,29,.35);
            font-size: 13px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: #e2e8f0;
            font-size: 13px;
            font-weight: 600;
        }

        .input-box {
            position: relative;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            left: 14px;
            color: #64748b;
            transform: translateY(-50%);
        }

        .input-box input {
            width: 100%;
            padding: 13px 14px 13px 42px;
            color: white;
            border: 1px solid #475569;
            border-radius: 10px;
            outline: none;
            background: rgba(15,23,42,.8);
        }

        .input-box input:focus {
            border-color: #22d3ee;
            box-shadow: 0 0 0 3px rgba(34,211,238,.12);
        }

        .error {
            display: block;
            margin-top: 6px;
            color: #fca5a5;
            font-size: 12px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 5px 0 22px;
            color: #cbd5e1;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .remember input {
            accent-color: #06b6d4;
        }

        .options a,
        .register a,
        .back-home {
            color: #67e8f9;
            text-decoration: none;
        }

        .options a:hover,
        .register a:hover,
        .back-home:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            color: white;
            border: 0;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37,99,235,.35);
        }

        .register {
            margin-top: 23px;
            color: #94a3b8;
            text-align: center;
            font-size: 13px;
        }

        .back-home {
            display: block;
            margin-top: 22px;
            color: #cbd5e1;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <main class="login-wrapper">
        <div class="brand">
            <a href="{{ route('home') }}">
                <i class="bi bi-shop"></i>
                SabuMarket
            </a>
            <p>Admin Product Management</p>
        </div>

        <section class="login-card">
            <h1>Selamat Datang</h1>
            <p class="subtitle">Login untuk mengelola product Anda.</p>

            @if (session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert">
                    Email atau password yang dimasukkan salah.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">Email</label>

                    <div class="input-box">
                        <i class="bi bi-envelope"></i>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required
                            autofocus
                            autocomplete="username"
                        >
                    </div>

                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>

                    <div class="input-box">
                        <i class="bi bi-lock"></i>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >
                    </div>

                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="options">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-button">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login ke Admin
                </button>
            </form>

            @if (Route::has('register'))
                <div class="register">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </div>
            @endif
        </section>

        <a href="{{ route('home') }}" class="back-home">
            <i class="bi bi-arrow-left"></i>
            Kembali ke halaman utama
        </a>
    </main>
</body>
</html>