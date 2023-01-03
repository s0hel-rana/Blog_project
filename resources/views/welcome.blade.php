<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style="color: white">
                @auth('admin')
                    <a href=" {{ route('admin.dashboard') }} ">Admin Dashboard</a>
                @else
                    <a href=" {{ route('admin.login') }} ">Admin Login</a>
                @endauth
            </div>
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style="color: white">
                    <a href=" {{ route('login') }} ">User Login</a>
            </div>
        </div>
    </div>
</body>
</html>

