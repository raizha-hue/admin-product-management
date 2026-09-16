
@extends('layouts.admin')

@section('title', 'Products')

@section('styles')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .page-header h1 {
        color: #6b21a8;
    }

    .add-button {
        background: #9333ea;
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 7px;
    }

    .add-button:hover {
        background: #7e22ce;
    }

    .search-form {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search-input {
        flex: 1;
        padding: 11px;
        border: 1px solid #ddd;
        border-radius: 7px;
        font-size: 14px;
    }

    .search-button {
        background: #9333ea;
        color: white;
        border: none;
        padding: 11px 20px;
        border-radius: 7px;
        cursor: pointer;
    }

    .search-button:hover {
        background: #7e22ce;
    }

    .clear-button {
        background: #e5e7eb;
        color: #333;
        text-decoration: none;
        padding: 11px 20px;
        border-radius: 7px;
    }

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f3e8ff;
        color: #6b21a8;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    .status-available {
        color: #16a34a;
        font-weight: bold;
    }

    .status-out {
        color: #dc2626;
        font-weight: bold;
    }

    .edit-button {
        background: #9333ea;
        color: white;
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
        margin-right: 5px;
    }

    .edit-button:hover {
        background: #7e22ce;
    }

    .delete-button {
        background: #dc2626;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 13px;
        cursor: pointer;
    }

    .delete-button:hover {
        background: #b91c1c;
    }
</style>

@endsection


@section('content')

    <div class="page-header">

        <h1>Products</h1>

        <a href="/admin/products/create" class="add-button">
            + Add Product
        </a>

    </div>


    <form
        method="GET"
        action="/admin/products"
        class="search-form"
    >

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search product..."
            class="search-input"
        >

        <button
            type="submit"
            class="search-button"
        >
            Search
        </button>

        @if(request('search'))
            <a
                href="/admin/products"
                class="clear-button"
            >
                Clear
            </a>
        @endif

    </form>


    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>
                            {{ $product->name }}
                        </td>

                        <td>
                            {{ $product->category }}
                        </td>

                        <td>
                            ₱{{ number_format($product->price, 2) }}
                        </td>

                        <td>
                            {{ $product->stock }}
                        </td>

                        <td>
                            @if($product->status === 'available')
                                <span class="status-available">
                                    Available
                                </span>
                            @else
                                <span class="status-out">
                                    Out of Stock
                                </span>
                            @endif
                        </td>

                        <td>

                            <a
                                href="/admin/products/{{ $product->_id }}/edit"
                                class="edit-button"
                            >
                                Edit
                            </a>

                            <form
                                method="POST"
                                action="/admin/products/{{ $product->_id }}"
                                style="display: inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" style="text-align: center;">
                            No products found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection

