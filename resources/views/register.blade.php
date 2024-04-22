<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortunate Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        input::placeholder {
            color: lightgrey !important;
        }
    </style>
</head>

<body data-bs-theme="dark">
    <!--NAVBAR START-->
    @include('components/navbar')
    <!--NAVBAR END-->

    <br><br><br><br><br><br><br><br>
    <div class="d-flex align-items-center" style="height: 100%;">
        <main class="form-signin w-25 m-auto">
            <h1 class="h3 mb-3 fw-normal">Create an Acount</h1>
            <form method="POST" action='/register'>
                @csrf
                <div class="form-floating">
                    <label for="name"></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name Here" required>
                    @error('name')
                    <div id='nameerror' class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <label for="username"></label>
                    <input type="text" class="form-control text-white" id="username" name="username" placeholder="Username: (Ex: Swag123MoneyZ)" required>
                    @error('username')
                    <div id='usernameerror' class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <label for="email"></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    @error('email')
                    <div id='emailerror' class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <div class="form-floating">
                    <label for="password"></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    @error('password')
                    <div id='passworderror' class="form-text text-danger">{{$message}}</div>
                    @enderror
                </div>
                <br>
                <button class="btn btn-primary w-100 py-2" type="submit">Create Account</button>
            </form>
            <div class="mt-3">
                <p>Already have an account? <a href="/Log-In-Sign-Up">Sign In</a></p>
            </div>
        </main>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>