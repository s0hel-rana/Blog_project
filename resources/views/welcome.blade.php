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
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4"">
                <strong>
                    <div>
                        @auth('admin')
                            <a href=" {{ route('admin.dashboard') }} ">Admin Dashboard</a>
                        @else
                            <a href=" {{ route('admin.login') }} " class="btn btn-warning shadow-sm">Admin Login</a>
                        @endauth
                        <a href=" {{ route('login') }} " class="btn btn-success shadow-sm">User Login</a>
                    </div>
                </strong>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

