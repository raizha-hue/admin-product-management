@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <h1 style="color: #6b21a8; margin-bottom: 25px;">
        Dashboard
    </h1>

    <div style="
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    ">

        <div style="
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        ">
            <h3 style="color: #666;">Total Products</h3>

            <p style="
                font-size: 32px;
                font-weight: bold;
                color: #6b21a8;
                margin-top: 10px;
            ">
                {{ $totalProducts }}
            </p>
        </div>


        <div style="
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        ">
            <h3 style="color: #666;">Available Products</h3>

            <p style="
                font-size: 32px;
                font-weight: bold;
                color: #16a34a;
                margin-top: 10px;
            ">
                {{ $availableProducts }}
            </p>
        </div>


        <div style="
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        ">
            <h3 style="color: #666;">Out of Stock</h3>

            <p style="
                font-size: 32px;
                font-weight: bold;
                color: #dc2626;
                margin-top: 10px;
            ">
                {{ $outOfStock }}
            </p>
        </div>

    </div>


    <div style="
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    ">

        <h2 style="color: #6b21a8; margin-bottom: 10px;">
            Welcome to the Admin Dashboard
        </h2>

        <p style="color: #666;">
            Use the menu on the left to manage your products.
        </p>

    </div>


    <div style="
    margin-top: 30px;
">

    <h2 style="
        color: #6b21a8;
        margin-bottom: 15px;
    ">
        Quick Actions
    </h2>

    <div style="
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    ">

        <a
            href="/admin/products"
            style="
                background: #9333ea;
                color: white;
                text-decoration: none;
                padding: 12px 20px;
                border-radius: 8px;
            "
        >
            📦 Manage Products
        </a>

        <a
            href="/admin/products/create"
            style="
                background: #7e22ce;
                color: white;
                text-decoration: none;
                padding: 12px 20px;
                border-radius: 8px;
            "
        >
            ➕ Add New Product
        </a>

    </div>

</div>

@endsection