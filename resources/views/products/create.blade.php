@extends('layouts.admin')

@section('title', 'Tambah Product')

@section('content')

<div class="page-container">

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Tambah Product
            </h1>

            <p class="page-subtitle">
                Tambahkan product baru ke SabuMarket.
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

                <i class="bi bi-plus-circle me-2"></i>

                Informasi Product

            </h5>

        </div>


        <div class="card-body-modern">

            <form
                action="{{ route('products.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

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

                        Simpan Product

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection