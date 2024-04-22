<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortunate Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Highchart things-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/stock/modules/stock.js"></script>
    <!-- Include Highcharts modules for lazy loading -->
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body data-bs-theme="dark">
    <!--NAVBAR START-->
    @include('components/navbar')
    <!--NAVBAR END-->

    <!--Adding to portfolio modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add {{$stock['companyName']}} To Your Portfolio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/add" method="POST" id='add_to_portfolio'>
                        @csrf
                        @error('user_id')
                        <div id='user_iderror' class="form-text text-danger">{{$message}}</div>
                        @endif
                        <div class="mb-3">
                            <label for="buyInPrice" class="col-form-label">{{$stock['companyName']}}'s Stock Price when you bought:</label>
                            <input type="text" class="form-control" id="buyInPrice" name="buyInPrice">
                            @error('buyInPrice')
                            <div id="buyInPriceerror" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="amountInvested" class="col-form-label">Amount You Invested in {{$stock['companyName']}} :</label>
                            <input type="text" class="form-control" id="amountInvested" name="amountInvested">
                            @error('amountInvested')
                            <div id="amountInvestederror" class="form-text text-danger">{{$message}}</div>
                            @enderror
                            <input type="hidden" class="form-control" id="ticker" value="{{$stock['symbol']}}" name="ticker">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="add_to_portfolio">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!--END OF Adding to portfolio modal-->
    @if($errors->any())
    <script type="text/javascript">
        window.onload = () => {
            $('#exampleModal').modal('show');
        }
    </script>
    @endif


    <h1 class="text-center">
        <img src="{{$stock['image']}}" alt="company image" width="50px" height="50px">
        {{$stock['companyName']}}
        <a class="btn bg-transparent" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="myModalTrigger">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
        </a>
    </h1>
    <h6 class="text-center">To add to your portfolio click the "+" </h6>
    <h4 class="text-center">Current Price: ${{number_format($stock['price'], 2, '.', '')}}</h4>
    <h4 class='text-center'>Day Change: {{$stockexchangeinfo->changesPercentage}}%</h4>
    <div class="d-flex justify-content-center m-4 " id="chart">
        <!--START OF LINE GRAPH FOR SINGLE START-->
        <!-- <img src="/images/portfolio-placeholder.png" alt="stock_line_graph" width="600px" height="450px"> -->



        <!--END OF LINE GRAPH FOR SINGLE START-->
    </div>

    <!--Stock details table-->
    <div class="mx-4">
        <!-- @include('../components/singlestock/singlestockinfo') -->
        <!--not appearing now for some reason-->
        <x-singlestock.singlestockinfo :stock='$stock' :stockexchangeinfo='$stockexchangeinfo' :humanReadable='$humanReadable' :earningsDate='$earningsDate' />

    </div>

    <!--STOCK OPTIONS TABLE-->
    <!-- <h1 class="text-center">Options Table</h1>
    <h3 class="d-flex justify-content-around text-center">
        <p>Puts</p>
        <p>Expiration date</p>
        <p>Calls</p>
    </h3>

    <div class="portfolio mx-4">
        to get options table un comment and do x-singlestock.singlestockoptionstable

        
    </div> -->

    <br><br>
    <!--Analysis Section-->
    <div class="mx-4">
        <h1 class="text-center">Stock Analysis:<br>(NOT Financial Advice)</h1>

        <!--TIPS-->
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            <x-singlestock.singlestocktips :stock='$stock' :stockexchangeinfo='$stockexchangeinfo' />
        </div>
    </div>

    <input type="hidden" value="{{$stock['symbol']}}" id="stockTickerJS">
    <script src="/scripts/addToPortfolioModal.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            (async () => {

                //START OF POLYGON AND HIGHCHART CODE

                // Replace 'YOUR_API_KEY' with your actual API key from Polygon.io
                const apiKey = 'kZhI_xwTLnFASxHfpojM9uOD1e4UpoKr';

                const ticker = document.getElementById('stockTickerJS').value;
                // console.log(ticker);
                // Calculate today's date
                const today = new Date();
                const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD

                // console.log(todayFormatted);

                // Apple's IPO date: December 12, 1980 (Assuming)
                //Polygon api only lets me go back around 2 years so this date should effect much :(
                const ipoDate = '1980-12-12';

                // Construct the API URL
                const apiUrl = `https://api.polygon.io/v2/aggs/ticker/${ticker}/range/1/day/${ipoDate}/${todayFormatted}?adjusted=true&sort=asc&limit=50000&apiKey=${apiKey}`;

                // Make the fetch request
                const stockPrices = fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Data contains historical stock prices
                        // console.log(data);

                        // Extract relevant data from the response
                        const results = data.results;

                        // Transform the data into the format expected by Highcharts
                        const stockPrices = results.map(result => {
                            return [result.t, result.c];
                        });

                        // Log the transformed data
                        // console.log(stockPrices);

                        // Process the data as needed

                        // Create the chart
                        Highcharts.stockChart('chart', {
                            rangeSelector: {
                                selected: 1
                            },

                            title: {
                                text: ticker + " Stock Price"
                            },

                            series: [{
                                name: ticker,
                                data: stockPrices,
                                tooltip: {
                                    valueDecimals: 2
                                }
                            }]
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });

                //END OF POLYGON AND HIGHCHART CODE


                // //APLHA VANTAGE AND HIGHCHART STUFF
                // const apiKey = 'LUS66PNVAVYJ741Y';
                // const symbol = 'AAPL'; // Example stock symbol for Apple Inc.
                // const outputSize = 'full'; // Retrieve full historical data

                // const apiUrl = `https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=${symbol}&apikey=${apiKey}&outputsize=${outputSize}`;

                // const response = await fetch(apiUrl);
                // const data = await response.json();

                // const timeSeries = data['Time Series (Daily)'];
                // const stockPrices = Object.entries(timeSeries).map(([key, value]) => {
                //     return [new Date(key).getTime(), parseFloat(value['4. close'])];
                // });
                // // console.log(stockPrices);
                // // Sort the stockPrices array in ascending order based on the X-axis values (timestamps)
                // stockPrices.sort((a, b) => a[0] - b[0]);
                // console.log(stockPrices);

                // //END OF ALPHA VANTAGE STUFF

                // Create the chart
                // Highcharts.stockChart('chart', {
                //     rangeSelector: {
                //         selected: 1
                //     },

                //     title: {
                //         text: 'AAPL Stock Price'
                //     },

                //     series: [{
                //         name: 'AAPL',
                //         data: stockPrices,
                //         tooltip: {
                //             valueDecimals: 2
                //         }
                //     }]
                // });
            })();
        });
    </script>
</body>

</html>