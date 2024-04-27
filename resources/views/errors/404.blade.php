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
          <h1 class="mb-2"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21.972 11.517a.527.527 0 0 0-1.034-.105 1.377 1.377 0 0 1-1.324 1.01 1.467 1.467 0 0 1-1.4-1.009.526.526 0 0 0-1.015 0 1.467 1.467 0 0 1-2.737.143l-.049-.204.021-.146V9.369h2.304a2.632 2.632 0 0 0 2.631-2.632 2.678 2.678 0 0 0-2.654-2.632l-.526.022-.13-.369A2.632 2.632 0 0 0 13.579 2c-.461 0-.915.124-1.313.358L12 2.513l-.266-.155A2.603 2.603 0 0 0 10.422 2a2.632 2.632 0 0 0-2.483 1.759l-.13.37-.518-.024a2.681 2.681 0 0 0-2.66 2.632A2.632 2.632 0 0 0 7.264 9.37H9.61v1.887l-.007.09-.028.08a1.328 1.328 0 0 1-1.301.996 1.632 1.632 0 0 1-1.502-1.024.526.526 0 0 0-1.01.013 1.474 1.474 0 0 1-1.404 1.01 1.381 1.381 0 0 1-1.325-1.01.547.547 0 0 0-.569-.382h-.008a.526.526 0 0 0-.456.526v.446a10.012 10.012 0 0 0 10 10 9.904 9.904 0 0 0 7.067-2.94A10.019 10.019 0 0 0 22 11.966l-.028-.449ZM8.316 15.685a1.053 1.053 0 1 1 2.105 0 1.053 1.053 0 0 1-2.105 0Zm1.58 3.684a2.105 2.105 0 0 1 4.21 0h-4.21Zm4.736-2.631a1.052 1.052 0 1 1 0-2.105 1.052 1.052 0 0 1 0 2.105Z" />
            </svg> 404 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21.972 11.517a.527.527 0 0 0-1.034-.105 1.377 1.377 0 0 1-1.324 1.01 1.467 1.467 0 0 1-1.4-1.009.526.526 0 0 0-1.015 0 1.467 1.467 0 0 1-2.737.143l-.049-.204.021-.146V9.369h2.304a2.632 2.632 0 0 0 2.631-2.632 2.678 2.678 0 0 0-2.654-2.632l-.526.022-.13-.369A2.632 2.632 0 0 0 13.579 2c-.461 0-.915.124-1.313.358L12 2.513l-.266-.155A2.603 2.603 0 0 0 10.422 2a2.632 2.632 0 0 0-2.483 1.759l-.13.37-.518-.024a2.681 2.681 0 0 0-2.66 2.632A2.632 2.632 0 0 0 7.264 9.37H9.61v1.887l-.007.09-.028.08a1.328 1.328 0 0 1-1.301.996 1.632 1.632 0 0 1-1.502-1.024.526.526 0 0 0-1.01.013 1.474 1.474 0 0 1-1.404 1.01 1.381 1.381 0 0 1-1.325-1.01.547.547 0 0 0-.569-.382h-.008a.526.526 0 0 0-.456.526v.446a10.012 10.012 0 0 0 10 10 9.904 9.904 0 0 0 7.067-2.94A10.019 10.019 0 0 0 22 11.966l-.028-.449ZM8.316 15.685a1.053 1.053 0 1 1 2.105 0 1.053 1.053 0 0 1-2.105 0Zm1.58 3.684a2.105 2.105 0 0 1 4.21 0h-4.21Zm4.736-2.631a1.052 1.052 0 1 1 0-2.105 1.052 1.052 0 0 1 0 2.105Z" />
            </svg></h1>
          <h3>
            Page Not Found
          </h3>
          <br>
          <h6>Potential reasons for this:</h6>
          <small>1. The stock ticker you searched for does NOT exist. Could be a misspelling, it happens :)</small>
          <br>
          <small>2. You could have been searching for an ETF. Right now Fortune Finance does not include ETFs, but WILL IN THE NEAR FUTURE :)</small>
          <br><br><br><br>
          <button class="btn btn-primary"><a href="/" class="text-decoration-none text-white">Return Home</a></button>
        </div>
      </div>
    </div>
  </div>
</body>