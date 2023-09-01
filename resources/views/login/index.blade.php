<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman | {{ $title }} </title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style_login.css">
</head>

<style>
    .container{
        position: absolute;
        top: 50px;
        left: 0;
        right: 0;
    }
</style>


<body>
    
    <div class="container d-flex justify-content-center">
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-5 d-flex align-items-center" role="alert">
            <i class='bx bx-bell me-3 fs-3'></i>
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
    </div>
    
    <div class="form login">
        <span class="form_title">
            <img src="/img/logouin.png" alt="Teknologi infromasi" width="50"> Teknologi Informasi</span>
            <form action="/login" method="POST">
                @csrf
                <h2 class="text-primary">Log In</h2>
                <div class="form_input mb-4 mt-5">
                    <i class="bx bx-user"></i>
                    <input type="email" name="email" class=" @error('email')
                    is-invalid
                    @enderror" value="{{ old('email') }}" placeholder="Email" autofocus required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <span class="bar"></span>
                </div>
                <div class="form_input">
                    <i class="bx bx-key"></i>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <span class="bar"></span>
                </div>
                <button type="submit" name="login" class="form_button btnLogin">Masuk</button>
            </form>
        </div>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/jquery.min.js"></script>
        
    </body>
    
    </html>