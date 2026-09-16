<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f3ff;
            min-height: 100vh;
        }

        .navbar {
            background: #6b21a8;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 20px;
        }

        .navbar span {
            font-size: 14px;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        .sidebar {
            width: 220px;
            background: white;
            padding: 25px 15px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.08);
        }

        .sidebar h3 {
            color: #6b21a8;
            margin-bottom: 20px;
            padding-left: 10px;
        }

        .sidebar a {
    display: block;
    text-decoration: none;
    color: #444;
    padding: 13px 12px;
    margin-bottom: 7px;
    border-radius: 7px;
    font-size: 15px;
}

.sidebar a:hover {
    background: #f3e8ff;
    color: #6b21a8;
    transform: translateX(3px);
}

        .logout-button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        .content {
            flex: 1;
            padding: 30px;
        }
    </style>

    @yield('styles')
</head>

<body>

    <div class="navbar">
        <h2>Admin Product Management</h2>

        <span>
            Welcome, {{ session('admin_name') }}
        </span>
    </div>

    <div class="layout">

        <aside class="sidebar">

            <h3>Menu</h3>

<a href="/admin/dashboard">
    🏠 Dashboard
</a>

<a href="/admin/products">
    📦 Products
</a>

<a href="/admin/products/create">
    ➕ Add Product
</a>    

            <form method="POST" action="/admin/logout">
                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>

        </aside>

        <main class="content">

            @if(session('success'))
                <div style="
                    background: #dcfce7;
                    color: #166534;
                    padding: 12px;
                    border-radius: 7px;
                    margin-bottom: 20px;
                ">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="
                    background: #fee2e2;
                    color: #b91c1c;
                    padding: 12px;
                    border-radius: 7px;
                    margin-bottom: 20px;
                ">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

</body>
</html>