<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinalEase Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('assets/images/backgroundstt.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: -1;
        }
        .left-section {
            background-color: #6c63ff;
            color: white;
        }
        .left-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .left-section p {
            margin-top: 15px;
            text-align: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo-container h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-left: 10px;
            color: white;
        }
        .right-section {
            padding: 30px;
        }
        .form-control {
            border-radius: 5px;
            padding-left: 40px;
        }
        .form-control:focus {
            box-shadow: 0 0 5px #6c63ff;
            border-color: #6c63ff;
        }
        .input-group-text {
            border-radius: 5px 0 0 5px;
            border: 2px solid #6c63ff;
            background-color: #fff;
            color: #6c63ff;

            
        }
        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: bold;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #5b54d4;
            border-color: #5b54d4;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <!-- Logo Section -->
        <div class="logo-container">
            <img src="{{ asset('assets/images/logo-finalease-removebg-preview.png') }}" alt="FinalEase Logo" class="logo">
            <h1>FinalEase</h1>
        </div>

        <div class="row shadow-lg rounded overflow-hidden" style="max-width: 900px; width: 100%;">
            <!-- Left Section -->
            <div class="col-md-6 left-section d-flex flex-column justify-content-center align-items-center p-4">
                <h1>FinalEase</h1>
                <p>FinalEase Adalah sistem reminder bimbingan Tugas Akhir (TA), untuk membantu mahasiswa semester akhir agar cepat lulus.</p>
            </div>

            <!-- Right Section -->
            <div class="col-md-6 right-section bg-white">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <h2>Login</h2>
                        <p>Masuk dengan menggunakan akunmu</p>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        </div>
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan Password" required autocomplete="current-password">
                        </div>
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                        <label for="remember_me" class="form-check-label">Remember Me</label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
