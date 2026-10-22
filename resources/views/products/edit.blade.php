@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

<div class="page-container">

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Edit Product
            </h1>

            <p class="page-subtitle">
                Perbarui informasi product
                <strong>{{ $product->name }}</strong>.
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

        <div class="card-header-modern">

            <h5>

                <i class="bi bi-pencil-square me-2"></i>

                Edit Informasi Product

            </h5>

        </div>


        <div class="card-body-modern">

            <form
                action="{{ route('products.update', $product) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')

                @include('products._form')


                <div
                    class="mt-4 pt-4 border-top d-flex justify-content-end gap-2"
                >

                    <a
                        href="{{ route('products.index') }}"
                        class="btn btn-light btn-modern"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="btn btn-modern btn-primary-modern"
                    >

                        <i class="bi bi-check-lg me-1"></i>

                        Update Product

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection