<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortunate Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <!--NAVBAR START-->
    @include('components/navbar')
    <!--NAVBAR END-->

    <div class="p-5 mb-4 mx-4 mt-5 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">To see available options...</h1>
            <p class="col-md-8 fs-4">1. Go to the Investments Page</p>
            <p class="col-md-8 fs-4">2. Go to the Stocks Page</p>
            <p class="col-md-8 fs-4">3. Click an idividual stock</p>
            <p class="col-md-8 fs-4">4. Scroll until you see the stocks option table</p>
            <a href="/investments/stocks" class="text-white text-decoration-none btn btn-primary btn-lg">Go to Stocks Page</a>
        </div>
    </div>

</body>

</html>