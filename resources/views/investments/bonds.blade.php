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
    <h1 class="text-center">Bonds</h1>
    <div class="bonds mx-4">
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col">Rating</th>
                    <th scope="col">Company</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Maturity</th>
                    <th scope="col">Callable?</th>
                    <th scope="col">Price</th>
                    <th scope="col">YTM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">AAA</th>
                    <td>Apple</td>
                    <td>$4.50</td>
                    <td>1/1/2028</td>
                    <td>Yes</td>
                    <td>100.07</td>
                    <td>8.804</td>
                </tr>
                <tr>
                    <th scope="row">AAA</th>
                    <td>Apple</td>
                    <td>$4.50</td>
                    <td>1/1/2028</td>
                    <td>Yes</td>
                    <td>100.07</td>
                    <td>8.804</td>
                </tr>
                <tr>
                    <th scope="row">AAA</th>
                    <td>Apple</td>
                    <td>$4.50</td>
                    <td>1/1/2028</td>
                    <td>Yes</td>
                    <td>100.07</td>
                    <td>8.804</td>
                </tr>
                <tr>
                    <th scope="row">AAA</th>
                    <td>Apple</td>
                    <td>$4.50</td>
                    <td>1/1/2028</td>
                    <td>Yes</td>
                    <td>100.07</td>
                    <td>8.804</td>
                </tr>
            </tbody>

        </table>
    </div>

</body>

</html>