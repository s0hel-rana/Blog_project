<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-sm mx-auto p-12 bg-white rounded-xl shadow-lg">
        <img class="h-24 mx-auto rounded-full ring-4 ring-red-400 transform hover:scale-110 duration-700" src="{{ asset('admin_image/admin_logo.jpg') }}" alt="image">
        <div class="text-center">
            <button class="px-4 py-1 mt-4 border border-red-500 rounded-full text-black font-semibold hover:text-white hover:bg-red-700 hover:border-transparent">
                 @auth('admin')
                <a href=" {{ route('admin.dashboard') }} ">Admin Dashboard</a>
                @else
                    <a href=" {{ route('admin.login') }} ">Admin Login</a>
                @endauth
            </button>
        </div>
    </div>
    <div class="max-w-sm mx-auto p-12 bg-white rounded-xl shadow-lg">
        <img class="h-24 mx-auto rounded-full ring-4 ring-green-600 transform hover:scale-110 duration-700" src="{{ asset('admin_image/user-login.png') }}" alt="image">
        <div class="text-center">
            <button class="px-4 py-1 mt-4 border border-yellow-500 rounded-full text-black font-semibold hover:text-white hover:bg-green-700 hover:border-transparent">
                 <a href=" {{ route('login') }} ">User Login</a>
            </button>
        </div>
    </div>
</body>
</html>

