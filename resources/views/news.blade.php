<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortunate Finance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #newsCards {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body data-bs-theme="dark">
    <!--NAVBAR START-->
    @include('components/navbar')
    <!--NAVBAR END-->

    <h1 class="text-center mt-3">Financial News</h1>
    

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!--Will have foreach loop when pulling from news api-->
                @foreach ($newsarray as $singlenews)
                <x-newspage.singlenews :newsinfo='$singlenews' id="newsCards" />
                @endforeach
            </div>
            <br><br>
            {{$newsarray->withPath(url()->current() )->links()}}
            
        </div>
    </div>
</body>
</html>