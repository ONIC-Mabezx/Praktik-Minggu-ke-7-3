<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SabuMarket')</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #3b82f6;
            --cyan: #06b6d4;
            --dark: #0f172a;
            --dark-2: #111827;
            --body: #f1f5f9;
            --text: #0f172a;
            --muted: #64748b;
            --white: #ffffff;
        }


        * {
            box-sizing: border-box;
        }


      body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: var(--body);
    color: var(--text);
}


        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(15px);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }


        .brand {
            color: white !important;
            text-decoration: none;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }


        .brand i {
            color: var(--cyan);
            margin-right: 7px;
        }


        .nav-link-custom {
            color: #cbd5e1;
            text-decoration: none;
            padding: 9px 15px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: 500;
        }


        .nav-link-custom:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }


        .nav-link-custom.active {
            background: var(--primary);
            color: white;
        }


        /* =========================
           PAGE
        ========================= */

        .page-container {
            max-width: 1200px;
            margin: auto;
            padding: 45px 20px;
        }


        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            animation: slideDown 0.6s ease;
        }


        .page-title {
            font-size: 32px;
            font-weight: 800;
            margin: 0;
            letter-spacing: -1px;
        }


        .page-subtitle {
            color: var(--muted);
            margin-top: 7px;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-modern {
            border: none;
            border-radius: 10px;
            padding: 11px 18px;
            font-weight: 600;
            transition: 0.3s;
        }


        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }


        .btn-primary-modern {
            background: linear-gradient(135deg,
                    #2563eb,
                    #06b6d4);
            color: white;
        }


        .btn-primary-modern:hover {
            color: white;
        }


        /* =========================
           CARD
        ========================= */

        .modern-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            animation: fadeUp 0.7s ease;
        }


        .card-header-modern {
            padding: 20px 25px;
            border-bottom: 1px solid #e2e8f0;
            background: #ffffff;
        }


        .card-header-modern h5 {
            margin: 0;
            font-weight: 700;
        }


        .card-body-modern {
            padding: 25px;
        }


        /* =========================
           TABLE
        ========================= */

        .modern-table {
            margin: 0;
        }


        .modern-table thead th {
            background: #f8fafc;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
            padding: 15px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }


        .modern-table tbody td {
            padding: 16px 15px;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }


        .modern-table tbody tr {
            transition: 0.25s;
        }


        .modern-table tbody tr:hover {
            background: #f8fbff;
            transform: scale(1.002);
        }


        /* =========================
           PRODUCT IMAGE
        ========================= */

        .product-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            transition: 0.3s;
        }


        .product-image:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }


        .no-image {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 24px;
        }


        /* =========================
           BADGE
        ========================= */

        .status-active {
            background: #dcfce7;
            color: #15803d;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }


        .status-inactive {
            background: #f1f5f9;
            color: #64748b;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }


        /* =========================
           ACTION BUTTON
        ========================= */

        .action-btn {
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.25s;
            text-decoration: none;
        }


        .action-btn:hover {
            transform: translateY(-2px);
        }


        .action-view {
            background: #e0f2fe;
            color: #0284c7;
        }


        .action-edit {
            background: #fef3c7;
            color: #d97706;
        }


        .action-delete {
            background: #fee2e2;
            color: #dc2626;
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-weight: 600;
            color: #334155;
        }


        .form-control,
        .form-select {
            border: 1px solid #dbe3ed;
            border-radius: 10px;
            padding: 11px 13px;
            transition: 0.25s;
        }


        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }


        /* =========================
           ALERT
        ========================= */

        .modern-alert {
            border: none;
            border-radius: 12px;
            animation: fadeUp 0.5s ease;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            padding: 35px 20px;
            color: #64748b;
            font-size: 14px;
        }


        /* =========================
           ANIMATION
        ========================= */

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        @keyframes slideDown {

            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-title {
                font-size: 27px;
            }

            .modern-table {
                min-width: 850px;
            }

            .page-container {
                padding: 30px 15px;
            }

        }
    </style>

    @yield('styles')

</head>


<body>

    <!-- NAVBAR -->

    <nav class="main-navbar">

        <div class="container d-flex justify-content-between align-items-center">

            <a href="{{ url('/') }}" class="brand">

                <i class="bi bi-shop"></i>

                SabuMarket

            </a>


            <div class="d-flex align-items-center gap-2">

                <a href="{{ url('/') }}" class="nav-link-custom">
                    <i class="bi bi-house me-1"></i>
                    Home
                </a>


                <a href="{{ route('products.index') }}" class="nav-link-custom active">
                    <i class="bi bi-box-seam me-1"></i>
                    Products
                </a>

            </div>

        </div>

    </nav>


    <!-- CONTENT -->

    <main>

        @yield('content')

    </main>


    <!-- FOOTER -->

    <footer class="footer">

        <i class="bi bi-shop"></i>
        SabuMarket © {{ date('Y') }}

        <br>

        <small>
            Sistem Manajemen Product Berbasis Laravel
        </small>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @yield('scripts')

</body>

</html>