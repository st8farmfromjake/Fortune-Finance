<div class="list-group">
    <a class="list-group-item d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Beta Analysis</h6>
                <p class="mb-0 opacity-75">
                    <?php
                    #beta is between 0.95 and 1.05
                    if ($stock["beta"] >= 0.95 && $stock["beta"] <= 1.25) {
                        echo "This stock's beta is around 1 or slightly above 1. This means the stock will generally fluctuate with the market(not too much above or too much below, just right :) ). The stocks are seen as safe bets and often return generally the same as the market(not below and not above)";
                    }
                    #high beta above 1.05 
                    elseif ($stock["beta"] > 1.25) {
                        echo "This stock has a beta of above 1.25. This means the stock generally is more reactive towards the market. For example is the beta is 2, and the market is doing good, then the stock should be doing twice as good as the market. But if the market is declining then the stock will decline twice as much as the market. Generally higher beta stocks are associated with more risks.";
                    }
                    #below 0.95 beta
                    elseif ($stock["beta"] < 0.95) {
                        echo "This stock has a beta below 0.95. These stocks usually are considered 'defensive.' This meaning they slow to react to the market. They usually lag behind the market when the market is booming, but they hold their value when the market is declining. These are generally considered lower risk.";
                    }
                    
                    ?>
                </p>
            </div>

        </div>
    </a>
    <a class="list-group-item d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">P/E (Price to Earnings) Analysis</h6>
                <p class="mb-0 opacity-75">
                    <?php
                    #PE RATIO THINGS
                    #average good pe ratio
                    if ($stockexchangeinfo->pe >= 20 && $stockexchangeinfo->pe <= 25) {
                        echo "P/E: The stocks P/E ratio is in the good range. REMEMBER: Not all companies P/E ratio should be valued the same. Be sure to look up other companies P/E ratio within their same sector (Tech, Healthcare, Banking, etc) to get a better feel for the average P/E ratio within a certain sector.<br>";
                    }
                    #slightly higher pe ratio
                    elseif ($stockexchangeinfo->pe >= 25.01 && $stockexchangeinfo->pe <= 50) {
                        echo "P/E: This stock's P/E ratio is a little high, meaning the stock could be expecting higher earnings soon. A P/E can be high because of a high price or low earnings. A high P/E is good when you the market expects earnings to be sustainably high in the future, so that is justifies a high price. A high P/E could also indicate that earnings have fallen for some reason.<br>";
                    }
                    #very high pe ratio
                    elseif ($stockexchangeinfo->pe >= 50.01) {
                        echo "P/E: This stocks P/E ratio is very high, meaning the stock could be overvalued or investors are expecting a big price jump in earnings. A P/E can be high because of a high price or low earnings. A high P/E is good when you the market expects earnings to be sustainably high in the future, so that is justifies a high price. A high P/E could also indicate that earnings have fallen for some reason (generally bad).<br>";
                    }
                    #low pe ratio
                    elseif ($stockexchangeinfo->pe <= 19.99) {
                        echo "P/E: This stocks P/E ratio is low, meaning the stock could be undervalued. Be sure to check the volume to see how liquid the stock is, as that could be a factor in its low P/E ratio. In short, low P/Es give you a good chance of making money because the downside risk is lower and earnings are not priced in yet. However, it is not a guarantee that it will make you money.<br>";
                    }
                    #END OF PE RATIO
                    ?>
                </p>
            </div>

        </div>
    </a>
    <a class="list-group-item  d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">Volume Analysis</h6>
                <p class="mb-0 opacity-75">
                    <?php
                    if ($stockexchangeinfo->volume > $stockexchangeinfo->avgVolume) {
                        echo "The stocks volume is above average, this means people are trading this stock more than usual. Check recent news pertaining to the stock to see if now might be a good buying/shorting opportunity.";
                    } else {
                        echo "This stocks volume is below average, meaning the stock could be cooling off from recent news. Be sure to check fair value signs such as P/E, EPS, and other price targets before getting into a long position.";
                    }
                    ?>
                </p>
            </div>

        </div>
    </a>
</div>