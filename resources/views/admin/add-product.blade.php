@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

    <h1 style="
        color: #6b21a8;
        margin-bottom: 25px;
    ">
        Add Product
    </h1>

    <div style="
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        max-width: 700px;
    ">

        <form method="POST" action="/admin/products">

            @csrf

            <label>Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter product name"
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
                placeholder="Enter product description"
                rows="4"
                style="
                    width: 100%;
                    padding: 10px;
                    margin: 8px 0 18px;
                    border: 1px solid #ddd;
                    border-radius: 7px;
                "
            ></textarea>


            <label>Price</label>

            <input
                type="number"
                name="price"
                step="0.01"
                min="0"
                placeholder="Enter price"
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
                <option value="">Select Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Furniture">Furniture</option>
                <option value="School Supplies">School Supplies</option>
                <option value="Bags">Bags</option>
                <option value="Clothing">Clothing</option>
                <option value="Food">Food</option>
                <option value="Appliances">Appliances</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Home">Home</option>
                <option value="Accessories">Accessories</option>
                <option value="Office Equipment">Office Equipment</option>
                <option value="Computer Accessories">
                    Computer Accessories
                </option>
            </select>


            <label>Stock</label>

            <input
                type="number"
                name="stock"
                min="0"
                placeholder="Enter stock quantity"
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
                <option value="available">Available</option>
                <option value="out_of_stock">Out of Stock</option>
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
                Add Product
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