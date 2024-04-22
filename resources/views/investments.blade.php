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

    <section class="py-3 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Investments</h1>
                <p class="lead text-body-secondary">
                    Fortunate Finance is your one stop shop for all things investments
                    and finance.
                    We offer lots of information for publicly-traded stocks, bonds, ETFs, options, and loans.
                    <br> <br>
                    To add these investments to your portfolio, be sure to log in or sign up if you are new! :)
                    <br> <br>TIP: Be sure to thoroughly research before making any sort of investments to minimize
                    losses and maximize profits. Happy Investing!
                </p>
                <p>
                    <a href="/Log-In-Sign-Up" class="btn btn-primary my-2">Log in / Sign Up</a>
                    <a href="/news" class="btn btn-secondary my-2">Check Recent Financial News</a>
                </p>
            </div>
        </div>
    </section>

    <!--INVESTMENTS SECTION-->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <h2 class="text-center">Stocks</h2>
                        <img src="images/stock.jpg" alt="Stocks" height="250px">
                        <div class="card-body">
                            <p class="card-text">Q: What is the simple definition of stocks? <br><br>
                                A: Plain and simple, stock is a share in the ownership of a company. Stock represents a
                                claim on the company's assets and earnings. As you acquire more stock, your ownership
                                stake in the company becomes greater.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/investments/stocks" class="btn-group text-decoration-none">
                                    <button type="button" class="btn btn-md btn-primary">View</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <h2 class="text-center">Bonds</h2>
                        <img src="images/bonds.jpg" alt="Bonds" height="250px">
                        <div class="card-body">
                            <p class="card-text">Q: What is the simple definition of a bond? <br><br>
                                A: A bond is a fixed-income instrument that represents a loan made by an
                                investor to a borrower (typically corporate or governmental). A bond could be thought of
                                as an I.O.U. between the lender and borrower that includes the details of the loan and
                                its payments.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/investments/bonds" class="btn-group text-decoration-none">
                                    <!-- <button type="button" class="btn btn-md btn-primary">View</button> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <h2 class="text-center">Options</h2>
                        <img src="images/Calls-and-Puts.jpg" alt="Options" height="250px">
                        <div class="card-body">
                            <p class="card-text">Q: What is an option? <br><br>
                                A: An option is a contract giving the buyer the right—but not the
                                obligation—to buy (in the case of a call) or sell (in the case of a put) the underlying
                                asset at a specific price on or before a certain date. People use options for income, to
                                speculate, and to hedge risk.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/investments/options" class="btn-group text-decoration-none">
                                    <!-- <button type="button" class="btn btn-md btn-primary">View</button> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END OF SECTION-->
            </div>
        </div>
    </div>

</body>

</html>