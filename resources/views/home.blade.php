<!doctype html>
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
  <!--START Popular Stocks & SPY Home Header START-->

  <!-- @include('components/homepageheader') -->
  <x-homepageheader 
  :msftclose="$msftclose" 
  :msftchange="$msftchange" 

  :tslaclose="$tslaclose" 
  :tslachange="$tslachange" 

  :spyclose="$spyclose"
  :spychange="$spychange" 

  :aaplclose="$aaplclose"
  :aaplchange="$aaplchange"
  />

  <!--END Popular Stocks & SPY Home Header END-->

  <div class="p-5 mb-4 mx-4 mt-5 bg-body-tertiary rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Welcome to Fortunate Finance!</h1>
      <p class="col-md-8 fs-4">The all-in-one portfoio manager, financial news center, with access to multiple stock,
        bond, loan, & currency exchange information</p>
      <p class="col-md-8 fs-4">To start adding investments to your portfolio be sure to LOG IN or if you are new SIGN
        UP!</p>
      <a href="/Log-In-Sign-Up" class="text-white text-decoration-none btn btn-primary btn-lg">Log In / Sign Up</a>
    </div>
  </div>

  <div class="row align-items-md-stretch mx-4">
    <div class="col-md-6">
      <div class="h-100 p-5 text-bg-dark rounded-3">
        <h2>What is Happening in the Financial World?</h2>
        <p>Did intrest rates change? Whats the biggest gainer today? Which stocks slide? Don't even get us started on
          inflation...</p>
        <a href="/news" class="text-white text-decoration-none btn btn-secondary">Check it Out</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="h-100 p-5 bg-body-tertiary border rounded-3">
        <h2>How is my Portfolio Looking?</h2>
        <p>Check up on your personalized portfolio that shows analytics</p>
        <a href="/portfolio" class="text-white text-decoration-none btn btn-outline-secondary">See your Returns</a>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>