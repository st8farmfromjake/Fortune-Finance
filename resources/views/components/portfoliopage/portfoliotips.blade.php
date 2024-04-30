<?php
$totalInvested = 0;
$totalCapitalGains = 0;
$percentageGain = 0;
// dd($portfolioInfo);
for ($i= 0; $i < count($portfolioInfo); $i++) {
    $totalInvested += $portfolioInfo[$i]["amount_invested"];
    $totalCapitalGains += ($portfolioInfo[$i]["price"]-$portfolioInfo[$i]['buyin_price']) * ($portfolioInfo[$i]['amount_invested']/$portfolioInfo[$i]["buyin_price"]);
    
}
// dd($totalInvested);
// dd($totalCapitalGains);
$percentageGain = number_format(($totalCapitalGains/$totalInvested)*100, 2, '.', ',');
$totalCapitalGains = number_format($totalCapitalGains, 2, '.', ',');



?>

<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
    <div class="list-group">
        <h3 class="mb-2 text-center">Portfolio Details:</h3>
        <h5 class="mb-4 text-center">Total Amount You Invested: ${{number_format($totalInvested, 2, '.', ',')}}</h5>
        <a class="list-group-item d-flex gap-3 py-3" aria-current="true">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">$ Total Capital Gains: ${{$totalCapitalGains}}</h6>
                    <p class="mb-0 opacity-75">Your portfolios has made you ${{$totalCapitalGains}} off of your invested ${{number_format($totalInvested, 2, '.', ',')}}. </p>
                </div>

            </div>
        </a>
        <a class="list-group-item d-flex gap-3 py-3" aria-current="true">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">% Total Capital Gains: {{$percentageGain}}%</h6>
                    <p class="mb-0 opacity-75">Your portfolios percental capital gains are {{$percentageGain}}%. </p>
                    <br>
                    <p class="mb-0 opacity-75">
                        <?php 
                        if($percentageGain>=30){
                            echo "Wow your portfolio has increased over 30%! Keep up the good work!<br> If you see yourself overly involved in similar sectors, perhaps diversifying would help protect your gains and mitigate some risk. (NOT financial advice)";
                        }
                        elseif($percentageGain>=1 && $percentageGain<=29.99){
                            echo "Good gains so far, always be sure to fully evaluate your investments!<br> Maybe diversify your portfolio some to protect your gains. Branch out to new sectors to mitigate risk and perhaps gain even more! (NOT financial advice)";
                        }
                        elseif($percentageGain<0){
                            echo "It's ok to be in the red from time to time. The market might be on the decline or you might have to reevaluate your strategy.<br> I would reevaluate your portfolio and make decisions on rather to cut loses or short sell if you believe some stocks will continue to go down. (NOT financial advice)";
                        }
                        ?>
                    </p>
                </div>

            </div>
        </a>
    </div>
</div>