<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SabuMarket</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: white;
            overflow-x: hidden;
        }

        .background {
            min-height: 100vh;
            background:
                linear-gradient(rgba(15, 23, 42, .72), rgba(15, 23, 42, .9)),
                url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1920&q=85')
                center / cover fixed no-repeat;
        }

        nav {
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 8%;
            border-bottom: 1px solid rgba(255,255,255,.1);
            background: rgba(15,23,42,.3);
            backdrop-filter: blur(15px);
        }

        .logo {
            color: white;
            font-size: 23px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo i {
            color: #06b6d4;
            margin-right: 7px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links a,
        .nav-button {
            color: #cbd5e1;
            text-decoration: none;
            padding: 9px 15px;
            border: 0;
            border-radius: 8px;
            background: transparent;
            font: inherit;
            cursor: pointer;
            transition: .3s;
        }

        .nav-links a:hover,
        .nav-button:hover {
            color: white;
            background: rgba(255,255,255,.12);
        }

        .btn-daftar {
            color: white !important;
            background: linear-gradient(135deg, #2563eb, #06b6d4) !important;
        }

        .nav-links form {
            display: inline;
        }

        .hero {
            min-height: calc(100vh - 75px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            text-align: center;
        }

        .hero-content {
            max-width: 850px;
            animation: heroIn 1s ease;
        }

        .badge {
            display: inline-block;
            margin-bottom: 25px;
            padding: 8px 15px;
            color: #60a5fa;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid rgba(59,130,246,.35);
            border-radius: 30px;
            background: rgba(37,99,235,.15);
        }

        .hero h1 {
            margin-bottom: 25px;
            font-size: clamp(42px, 7vw, 78px);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -3px;
        }

        .gradient-text {
            background: linear-gradient(90deg, #60a5fa, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            max-width: 680px;
            margin: auto;
            color: #cbd5e1;
            font-size: 18px;
            line-height: 1.8;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 35px;
        }

        .btn {
            padding: 14px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, #2563eb, #06b6d4);
            box-shadow: 0 10px 30px rgba(37,99,235,.25);
        }

        .btn-primary:hover,
        .btn-outline:hover {
            color: white;
            transform: translateY(-4px);
        }

        .btn-outline {
            color: #cbd5e1;
            border: 1px solid #64748b;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,.1);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 30px 8% 70px;
        }

        .feature {
            width: 230px;
            padding: 25px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 15px;
            background: rgba(15,23,42,.55);
            backdrop-filter: blur(10px);
            transition: .3s;
        }

        .feature:hover {
            transform: translateY(-8px);
            border-color: rgba(59,130,246,.5);
        }

        .feature-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: #60a5fa;
            font-size: 20px;
            border-radius: 12px;
            background: rgba(37,99,235,.2);
        }

        .feature h3 {
            margin-bottom: 8px;
            font-size: 16px;
        }

        .feature p {
            color: #cbd5e1;
            font-size: 13px;
            line-height: 1.6;
        }

        @keyframes heroIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            nav {
                padding: 0 5%;
            }

            .nav-links a,
            .nav-button {
                padding: 8px;
            }

            .nav-links span {
                display: none;
            }

            .hero h1 {
                letter-spacing: -2px;
            }
        }
    </style>
</head>

<body>
    <div class="background">

        <nav>
            <a href="{{ route('home') }}" class="logo">
                <i class="bi bi-shop"></i>
                SabuMarket
            </a>

            <div class="nav-links">
                <a href="{{ route('home') }}">
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>

                @auth
                    <a href="{{ route('products.index') }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Products</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-button">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Login</span>
                    </a>

                    <a href="{{ route('register') }}" class="btn-daftar">
                        <i class="bi bi-person-plus"></i>
                        <span>Daftar</span>
                    </a>
                @endauth
            </div>
        </nav>

        <section class="hero">
            <div class="hero-content">
                <div class="badge">
                    <i class="bi bi-stars"></i>
                    Laravel Product Management System
                </div>

                <h1>
                    Kelola Product
                    <br>
                    Lebih <span class="gradient-text">Mudah & Modern</span>
                </h1>

                <p>
                    Selamat datang di SabuMarket.
                    Sistem pengelolaan product berbasis Laravel
                    untuk mengelola data, harga, stock,
                    kategori, dan foto product secara praktis.
                </p>

                <div class="buttons">
                    @auth
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            <i class="bi bi-box-seam"></i>
                            Kelola Products
                        </a>

                        <a href="{{ route('products.create') }}" class="btn btn-outline">
                            <i class="bi bi-plus-lg"></i>
                            Tambah Product
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login ke Admin
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-outline">
                            <i class="bi bi-person-plus"></i>
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <div class="feature-icon">
                    <i class="bi bi-plus-circle"></i>
                </div>
                <h3>Create</h3>
                <p>Tambahkan product baru dengan informasi lengkap.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h3>Update</h3>
                <p>Ubah informasi product kapan saja dengan mudah.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    <i class="bi bi-image"></i>
                </div>
                <h3>Product Image</h3>
                <p>Simpan dan tampilkan foto product.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">
                    <i class="bi bi-database"></i>
                </div>
                <h3>Laravel CRUD</h3>
                <p>Kelola data menggunakan Laravel Resource Controller.</p>
            </div>
        </section>

    </div>
</body>
</html>