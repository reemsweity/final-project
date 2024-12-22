<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJp3o0m8fnxu+Nx9zpmZGRz2HgPjm4Jc6WfNk1bfi67YJr1ZlWlbwKpW61Jj" crossorigin="anonymous">
    <style>
        body {
            background-image: url('{{ asset('admin/img/background.jpg') }}'); /* Use Laravel asset() helper to load image */
            background-size: cover; /* Make the image cover the entire page */
            background-position: center; /* Center the image */
            background-attachment: fixed; /* Ensure the background stays in place when scrolling */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff; /* Ensure text is visible on the background */
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.8); /* Add slight opacity to the background for readability */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #43BA7F;
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

       /* Centering the login button */
.btn-login {
    background-color: #43BA7F;
    color: white;
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    font-size: 16px;
    border: none;
    display: block; /* Makes the button behave as a block element */
    margin: 4px 12px; /* Centers the button horizontally */
    
}

/* On hover */
.btn-login:hover {
    background-color: #38a56f;
}


        .form-control {
    border-radius: 8px;
    box-shadow: none;
    width: 100%; /* Ensures input takes up full available width */
    padding: 12px; /* Increased padding for longer input boxes */
}

/* Add focus effect */
.form-control:focus {
    border-color: #43BA7F;
    box-shadow: 0 0 8px rgba(67, 186, 127, 0.5);
}

        .footer-text {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }

    </style>
</head>
<body>

    <div class="login-card">
        <h1>Admin Login</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-vyyqFZmfae72wdi8lfeA8mnqrBhFwKpbz6VbG77eI9toCnsWvxKh+Ewq1bqK97FL" crossorigin="anonymous"></script>
</body>
</html>
