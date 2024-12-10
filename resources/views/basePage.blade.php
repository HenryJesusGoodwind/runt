<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Welcome to Product Management</h1>
        <div class="space-x-4">
            <a href="/history">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded shadow">
                    Go to History Page
                </button>
            </a>
            <a href="/beli-produk">
                <button class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded shadow">
                    Go to Buy Products
                </button>
            </a>
            <a href="/top-products">
                <button class="bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 rounded shadow">
                    Top 5 Best-Selling Products
                </button>
            </a>
        </div>
    </div>
</body>
</html>
