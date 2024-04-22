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

    <h1 class="text-center mb-3">Currency Table</h1>

    <div class="currencies mx-4">
        <x-currencies.currencytable :forexExchangeRates="$forexExchangeRates" />
        
    </div>
    <br>

    <!-- <div class="p-5 mb-4 mx-4 mt-5 bg-body-tertiary rounded-3">
        put x-currencies.currencycalculator
        
        
    </div> -->

</body>

</html>