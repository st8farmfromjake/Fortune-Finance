<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fortunate Finance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    <h1 class="text-center">Your Portfolio</h1>
    <h2 class="text-center">To add more to your portfolio: <a href="/investments">Click Here</a></h2>
    <div class="d-flex justify-content-center m-4 " id="chart">
        <!--START OF LINE GRAPH FOR SINGLE START-->
        <!-- <img src="/images/portfolio-placeholder.png" alt="stock_line_graph" width="600px" height="450px"> -->

        <!--END OF LINE GRAPH FOR SINGLE START-->
    </div>
    <div class="portfolio mx-4">
        @include('components/portfoliopage/portfoliostocks')
    </div>

    <br>
    <!--Analysis Section-->
    <div class="mx-4">
        <!--START OF ANALYSIS-->
        <x-portfoliopage.portfoliotips :portfolioInfo="$portfolioInfo" />
        <!--END OF TIPS-->
    </div>

    <script>
        (async () => {

            const portfolioStocks = <?php echo json_encode($portfolioInfo); ?>
            
            // Calculate today's date
            const today = new Date();
            const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
            console.log(portfolioStocks);
            // console.log(todayFormatted);
            const portfolioValueArray = [];
            let totalValue = 0;
            let totalPortfolioAmountInvested = 0;
            let portfolioPercentage = 0;

            

            let data = []
            //DO MATH: GET CURRENT PORTFOLIO VALUE
            for (let i = 0; i < portfolioStocks.length; i++) {
                //Math.round((num + Number.EPSILON) * 100) / 100
                // console.log(i);

                let purchasePrice = parseFloat(portfolioStocks[i]['buyin_price']);
                let sharesOwned = parseFloat(portfolioStocks[i]['amount_invested'] / purchasePrice);
                let valueAndGain = (sharesOwned * portfolioStocks[i]['price']);

                let formattedValue = Math.round(((valueAndGain + totalValue) + Number.EPSILON) * 100) / 100;
                console.log(purchasePrice, sharesOwned, valueAndGain)
                portfolioValueArray.push(formattedValue);
                totalValue += parseFloat(valueAndGain);
                totalPortfolioAmountInvested += parseFloat(portfolioStocks[i]['amount_invested']);

                //creating time stamp 
                const timestamp = new Date(portfolioStocks[i]['created_at']).getTime();

                //add timestamp and value(value of shares), for highcharts
                data.push([timestamp, formattedValue]);
            
            
            }
            console.log(portfolioValueArray, "total Value: " + totalValue, "Total $ invested: " + totalPortfolioAmountInvested);
            console.log("FORMATTED DATES AND VALUES FOR GRAPH: ", data);
            // const gain = $stock['price']-$stock['buyin_price'])/$stock['buyin_price']



            Highcharts.chart('chart', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'Overall $ Portfolio value over time',
                    align: 'left'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in',
                    align: 'left'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'portfolio value'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },

                series: [{
                    type: 'area',
                    name: 'Portfolio value',
                    data: data
                }]
            });
        })();




        // document.addEventListener("DOMContentLoaded", (event) => {
        //     (async () => {

        //         const portfolioStocks = <?php #echo json_encode($portfolioInfo); 
                                            ?>;
        //         // console.log(ticker);
        //         // Calculate today's date
        //         const today = new Date();
        //         const todayFormatted = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
        //         console.log(portfolioStocks);
        //         // console.log(todayFormatted);
        //         const portfolioValueArray = [];
        //         let totalValue = 0;
        //         let totalPortfolioAmountInvested = 0;
        //         let portfolioPercentage = 0;
        //         //DO MATH: GET CURRENT PORTFOLIO VALUE
        //         for (let i = 0; i < portfolioStocks.length; i++) {
        //             //Math.round((num + Number.EPSILON) * 100) / 100

        //             let purchasePrice = parseInt(portfolioStocks[i]['buyin_price']);
        //             let sharesOwned = parseFloat(portfolioStocks[i]['amount_invested'] / purchasePrice);

        //             let valueAndGain = (sharesOwned * portfolioStocks[i]['price']);

        //             // let percentageGain = ((portfolioStocks[i]['price'] - portfolioStocks[i]['buyin_price']) / portfolioStocks[i]['buyin_price'])*100;
        //             // console.log(percentageGain);


        //             portfolioValueArray.push(Math.round(((valueAndGain + totalValue) + Number.EPSILON) * 100) / 100);
        //             totalValue += parseFloat(valueAndGain);
        //             totalPortfolioAmountInvested += parseFloat(portfolioStocks[i]['amount_invested']);
        //         }
        //         console.log(portfolioValueArray, "total Value: " + totalValue, "Total $ invested: " + totalPortfolioAmountInvested);

        //         // const gain = $stock['price']-$stock['buyin_price'])/$stock['buyin_price']


        //         // Make the fetch request
        //         Highcharts.chart('chart', {

        //             title: {
        //                 text: 'Your Total Portfolio Value Over Time',
        //                 align: 'left'
        //             },

        //             subtitle: {
        //                 text: '$ Value',
        //                 align: 'left'
        //             },

        //             yAxis: {
        //                 title: {
        //                     text: 'Portfolio Value'
        //                 }
        //             },

        //             xAxis: {
        //                 accessibility: {
        //                     rangeDescription: 'Range: 2024 to 2025'
        //                 }
        //             },

        //             legend: {
        //                 layout: 'vertical',
        //                 align: 'right',
        //                 verticalAlign: 'middle'
        //             },

        //             plotOptions: {
        //                 series: {
        //                     label: {
        //                         connectorAllowed: false
        //                     },
        //                     pointStart: 2024,
        //                 }
        //             },

        //             series: [{
        //                 name: 'Portfolio Value',
        //                 data: portfolioValueArray
        //             }, ],

        //             responsive: {
        //                 rules: [{
        //                     condition: {
        //                         maxWidth: 500
        //                     },
        //                     chartOptions: {
        //                         legend: {
        //                             layout: 'horizontal',
        //                             align: 'center',
        //                             verticalAlign: 'bottom'
        //                         }
        //                     }
        //                 }]
        //             }

        //         });

        //     })();
        // });
    </script>

</body>

</html>