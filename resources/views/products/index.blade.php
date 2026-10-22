@extends('layouts.admin')

@section('title', 'Products - SabuMarket')

@section('content')

<div class="page-container">

    <!-- HEADER -->

    <div class="page-header">

        <div>

            <div class="d-flex align-items-center gap-2 mb-2">

                <span
                    style="
                        width: 10px;
                        height: 10px;
                        background: #06b6d4;
                        border-radius: 50%;
                        display: inline-block;
                    "
                ></span>

                <span
                    style="
                        color: #64748b;
                        font-size: 13px;
                        font-weight: 600;
                    "
                >
                    MANAGEMENT
                </span>

            </div>

            <h1 class="page-title">
                Products
            </h1>

            <p class="page-subtitle">
                Kelola seluruh product SabuMarket dengan mudah.
            </p>

        </div>


        <a
            href="{{ route('products.create') }}"
            class="btn btn-modern btn-primary-modern"
        >

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Product

        </a>

    </div>


    <!-- SUCCESS -->

    @if(session('success'))

        <div
            class="alert alert-success modern-alert mb-4"
        >

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    {{-- FILTER --}}

<div class="mb-4">
    <form method="GET" action="{{ route('products.index') }}">
        <div class="row g-2 align-items-end">

            <div class="col-md-4">
                <label class="form-label">Cari Product</label>
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Nama atau deskripsi product"
                    value="{{ request('search') }}"
                >
            </div>

            <div class="col-md-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select">
                    <option value="">Semua kategori</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category }}"
                            @selected(request('category') == $category)
                        >
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Harga Minimum</label>
                <input
                    type="number"
                    name="min_price"
                    class="form-control"
                    min="0"
                    value="{{ request('min_price') }}"
                >
            </div>

            <div class="col-md-2">
                <label class="form-label">Harga Maksimum</label>
                <input
                    type="number"
                    name="max_price"
                    class="form-control"
                    min="0"
                    value="{{ request('max_price') }}"
                >
            </div>

            <div class="col-md-1 d-flex gap-1">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>

                <a
                    href="{{ route('products.index') }}"
                    class="btn btn-outline-secondary"
                    title="Reset"
                >
                    <i class="bi bi-arrow-counterclockwise"></i>
                </a>
            </div>

        </div>
    </form>
</div>

    <!-- CARD -->

    <div class="modern-card">

        <div class="card-header-modern">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5>
                        <i class="bi bi-box-seam me-2"></i>
                        Daftar Product
                    </h5>

                    <small class="text-muted">
                        Total data:
                        {{ $products->total() }} product
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body-modern p-0">

            <div class="table-responsive">

                <table class="table modern-table">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Foto</th>

                            <th>Product</th>

                            <th>Kategori</th>

                            <th>Harga</th>

                            <th>Stock</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                        <tr>

                            <!-- NO -->

                            <td>

                                <strong>

                                    {{ $products->firstItem() + $loop->index }}

                                </strong>

                            </td>


                            <!-- FOTO -->

                            <td>

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="product-image"
                                    >

                                @else

                                    <div class="no-image">

                                        <i class="bi bi-image"></i>

                                    </div>

                                @endif

                            </td>


                            <!-- PRODUCT -->

                            <td>

                                <div
                                    style="
                                        font-weight: 700;
                                        color: #0f172a;
                                    "
                                >
                                    {{ $product->name }}
                                </div>


                                @if($product->description)

                                    <small class="text-muted">

                                        {{ Str::limit($product->description, 55) }}

                                    </small>

                                @endif

                            </td>


                            <!-- KATEGORI -->

                            <td>

                                @if($product->category)

                                    <span
                                        style="
                                            background: #eff6ff;
                                            color: #2563eb;
                                            padding: 5px 10px;
                                            border-radius: 7px;
                                            font-size: 12px;
                                            font-weight: 600;
                                        "
                                    >

                                        {{ $product->category }}

                                    </span>

                                @else

                                    -

                                @endif

                            </td>


                            <!-- HARGA -->

                            <td>

                                <strong>

                                    Rp
                                    {{ number_format($product->price, 0, ',', '.') }}

                                </strong>

                            </td>


                            <!-- STOCK -->

                            <td>

                                @if($product->stock > 0)

                                    <span
                                        style="
                                            color: #16a34a;
                                            font-weight: 700;
                                        "
                                    >

                                        {{ $product->stock }}

                                    </span>

                                @else

                                    <span
                                        style="
                                            color: #dc2626;
                                            font-weight: 700;
                                        "
                                    >

                                        0

                                    </span>

                                @endif

                            </td>


                            <!-- STATUS -->

                            <td>

                                @if($product->is_active)

                                    <span class="status-active">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Aktif

                                    </span>

                                @else

                                    <span class="status-inactive">

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>


                            <!-- AKSI -->

                            <td>

                                <div class="d-flex gap-2">

                                    <!-- DETAIL -->

                                    <a
                                        href="{{ route('products.show', $product) }}"
                                        class="action-btn action-view"
                                        title="Detail"
                                    >

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- EDIT -->

                                    <a
                                        href="{{ route('products.edit', $product) }}"
                                        class="action-btn action-edit"
                                        title="Edit"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- HAPUS -->

                                    <form
                                        action="{{ route('products.destroy', $product) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus product ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn action-delete"
                                            title="Hapus"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center"
                                style="padding: 70px 20px;"
                            >

                                <div
                                    style="
                                        font-size: 55px;
                                        color: #cbd5e1;
                                        margin-bottom: 15px;
                                    "
                                >

                                    <i class="bi bi-box"></i>

                                </div>


                                <h5>
                                    Belum ada product
                                </h5>


                                <p class="text-muted">

                                    Tambahkan product pertama kamu.

                                </p>


                                <a
                                    href="{{ route('products.create') }}"
                                    class="btn btn-modern btn-primary-modern"
                                >

                                    <i class="bi bi-plus-lg"></i>

                                    Tambah Product

                                </a>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- PAGINATION -->

        @if($products->hasPages())

            <div class="p-4 border-top">

                {{ $products->links() }}

            </div>

        @endif

    </div>

</div>

@endsection