@extends('layouts.admin')

@section('title', 'Detail Product')

@section('content')

<div class="page-container">

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Detail Product
            </h1>

            <p class="page-subtitle">
                Informasi lengkap product.
            </p>

        </div>

        <a
            href="{{ route('products.index') }}"
            class="btn btn-light btn-modern"
        >

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    <div class="modern-card">

        <div class="card-body-modern">

            <div class="row align-items-center">

                <!-- FOTO -->

                <div class="col-lg-5 text-center mb-4 mb-lg-0">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            style="
                                width: 320px;
                                height: 320px;
                                max-width: 100%;
                                object-fit: cover;
                                border-radius: 20px;
                                box-shadow: 0 20px 40px rgba(15,23,42,.15);
                            "
                        >

                    @else

                        <div
                            style="
                                width: 320px;
                                height: 320px;
                                max-width: 100%;
                                margin: auto;
                                background: #f1f5f9;
                                border-radius: 20px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: #94a3b8;
                                font-size: 70px;
                            "
                        >

                            <i class="bi bi-image"></i>

                        </div>

                    @endif

                </div>


                <!-- INFORMASI -->

                <div class="col-lg-7">

                    <span
                        style="
                            background: #eff6ff;
                            color: #2563eb;
                            padding: 7px 12px;
                            border-radius: 20px;
                            font-size: 12px;
                            font-weight: 700;
                        "
                    >

                        {{ $product->category ?? 'Product' }}

                    </span>


                    <h2
                        class="mt-3 mb-3"
                        style="font-weight: 800;"
                    >

                        {{ $product->name }}

                    </h2>


                    <p
                        class="text-muted"
                        style="line-height: 1.8;"
                    >

                        {{ $product->description ?? 'Tidak ada deskripsi product.' }}

                    </p>


                    <div class="row mt-4">

                        <div class="col-md-6 mb-3">

                            <small class="text-muted">
                                Harga
                            </small>

                            <h4 style="font-weight: 800;">

                                Rp
                                {{ number_format($product->price, 0, ',', '.') }}

                            </h4>

                        </div>


                        <div class="col-md-6 mb-3">

                            <small class="text-muted">
                                Stock
                            </small>

                            <h4 style="font-weight: 800;">

                                {{ $product->stock }}

                            </h4>

                        </div>

                    </div>


                    <div class="mb-4">

                        @if($product->is_active)

                            <span class="status-active">

                                <i class="bi bi-check-circle me-1"></i>

                                Product Aktif

                            </span>

                        @else

                            <span class="status-inactive">

                                Product Tidak Aktif

                            </span>

                        @endif

                    </div>


                    <a
                        href="{{ route('products.edit', $product) }}"
                        class="btn btn-modern btn-primary-modern"
                    >

                        <i class="bi bi-pencil me-1"></i>

                        Edit Product

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection