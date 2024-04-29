<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .page-wrap {
            min-height: 90vh;
        }
    </style>
</head>

<body data-bs-theme="dark">
    @include('components/navbar')

    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h1 class="mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                        </svg> 401 <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                        </svg></h1>
                    <h3>
                        Unauthorized
                    </h3>
                    <br><br>
                    <h6>Potential reasons for this:</h6>
                    <small>1. You are not logged in OR do not have an account with us :) <a href="/Log-In-Sign-Up">Login Here</a></small>
                    <br>
                    <small>2. You are tyring to access a page that is NOT allowed for your account :( </small>
                    <br><br>
                    <button class="btn btn-primary"><a href="/Log-In-Sign-Up" class="text-decoration-none text-white">Login</a></button>
                    <button class="btn btn-primary"><a href="/" class="text-decoration-none text-white">Return Home</a></button>
                </div>
            </div>
        </div>
    </div>
</body>