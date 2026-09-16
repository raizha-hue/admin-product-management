@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <h1 style="
        color: #6b21a8;
        margin-bottom: 25px;
    ">
        Edit Product
    </h1>

    <div style="
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        max-width: 700px;
    ">

        <form
            method="POST"
            action="/admin/products/{{ $product->_id }}"
        >

            @csrf
            @method('PUT')


            <label>Name</label>

            <input
                type="text"
                name="name"
                value="{{ $product->name }}"
                required
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >


            <label>Description</label>

            <textarea
                name="description"
                rows="4"
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >{{ $product->description }}</textarea>


            <label>Price</label>

            <input
                type="number"
                name="price"
                value="{{ $product->price }}"
                step="0.01"
                min="0"
                required
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >


            <label>Category</label>

            <select
                name="category"
                required
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >

                <option value="Electronics"
                    {{ $product->category == 'Electronics' ? 'selected' : '' }}>
                    Electronics
                </option>

                <option value="Furniture"
                    {{ $product->category == 'Furniture' ? 'selected' : '' }}>
                    Furniture
                </option>

                <option value="School Supplies"
                    {{ $product->category == 'School Supplies' ? 'selected' : '' }}>
                    School Supplies
                </option>

                <option value="Bags"
                    {{ $product->category == 'Bags' ? 'selected' : '' }}>
                    Bags
                </option>

                <option value="Clothing"
                    {{ $product->category == 'Clothing' ? 'selected' : '' }}>
                    Clothing
                </option>

                <option value="Food"
                    {{ $product->category == 'Food' ? 'selected' : '' }}>
                    Food
                </option>

                <option value="Appliances"
                    {{ $product->category == 'Appliances' ? 'selected' : '' }}>
                    Appliances
                </option>

                <option value="Kitchen"
                    {{ $product->category == 'Kitchen' ? 'selected' : '' }}>
                    Kitchen
                </option>

                <option value="Home"
                    {{ $product->category == 'Home' ? 'selected' : '' }}>
                    Home
                </option>

                <option value="Accessories"
                    {{ $product->category == 'Accessories' ? 'selected' : '' }}>
                    Accessories
                </option>

                <option value="Office Equipment"
                    {{ $product->category == 'Office Equipment' ? 'selected' : '' }}>
                    Office Equipment
                </option>

                <option value="Computer Accessories"
                    {{ $product->category == 'Computer Accessories' ? 'selected' : '' }}>
                    Computer Accessories
                </option>

            </select>


            <label>Stock</label>

            <input
                type="number"
                name="stock"
                value="{{ $product->stock }}"
                min="0"
                required
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >


            <label>Status</label>

            <select
                name="status"
                required
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 25px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            >

                <option
                    value="available"
                    {{ $product->status == 'available' ? 'selected' : '' }}
                >
                    Available
                </option>

                <option
                    value="out_of_stock"
                    {{ $product->status == 'out_of_stock' ? 'selected' : '' }}
                >
                    Out of Stock
                </option>

            </select>


            <button
                type="submit"
                style="
                    background: #9333ea;
                    color: white;
                    border: none;
                    padding: 11px 18px;
                    border-radius: 7px;
                    cursor: pointer;
                    margin-right: 8px;
                "
            >
                Update Product
            </button>


            <a
                href="/admin/products"
                style="
                    background: #e5e7eb;
                    color: #333;
                    text-decoration: none;
                    padding: 11px 18px;
                    border-radius: 7px;
                "
            >
                Cancel
            </a>

        </form>

    </div>

@endsection