<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SinglestockController;
use App\Models\Singlestock;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use function PHPUnit\Framework\isEmpty;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // $msft = Singlestock::where('ticker', 'MSFT')->first();
    // $spy = Singlestock::where('ticker', 'SPY')->first();
    // $aapl = Singlestock::where('ticker', 'AAPL')->first();
    // $tsla = Singlestock::where('ticker', 'TSLA')->first();

    $findBySymbol = function ($symbol, $objitems) {
        $arrayLength = count($objitems);
        for ($i = 0; $i < $arrayLength; $i++) {
            if ($objitems[$i]->symbol == $symbol) {
                return $objitems[$i];
            }
        }
    };

    $apiKey = env('FINANCIAL_MODELING_PREP_API_KEY');

    $aapl = Http::get("https://financialmodelingprep.com/api/v3/profile/AAPL?apikey={$apiKey}")[0];
    $spy =  Http::get("https://financialmodelingprep.com/api/v3/profile/SPY?apikey={$apiKey}")[0];
    $tsla = Http::get("https://financialmodelingprep.com/api/v3/profile/TSLA?apikey={$apiKey}")[0];
    $msft = Http::get("https://financialmodelingprep.com/api/v3/profile/MSFT?apikey={$apiKey}")[0];

    // ((newprice-oldprice)/ oldprice )*100

    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }

    //Getting the portfolio id: dd(Auth::user()->id);

    return view(
        'home',
        [
            'spyclose' => $spy['price'],
            'spychange' => number_format(($spy['price'] - ($spy['price'] - $spy['changes'])) / ($spy['price'] - $spy['changes']) * 100, 2, '.', ''),
            'tslaclose' => $tsla['price'],
            'tslachange' => number_format(($tsla['price'] - ($tsla['price'] - $tsla['changes'])) / ($tsla['price'] - $tsla['changes']) * 100, 2, '.', ''),
            'msftclose' => $msft['price'],
            'msftchange' => number_format(($msft['price'] - ($msft['price'] - $msft['changes'])) / ($msft['price'] - $msft['changes']) * 100, 2, '.', ''),
            'aaplclose' => $aapl['price'],
            'aaplchange' => number_format(($aapl['price'] - ($aapl['price'] - $aapl['changes'])) / ($aapl['price'] - $aapl['changes']) * 100, 2, '.', ''),
        ]
    );
});

Route::get('/portfolio', function () {

    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }
    $apiKey = env('FINANCIAL_MODELING_PREP_API_KEY');
    //LOVELY FUNCTION
    $findBySymbol = function ($symbol, $objitems) {
        $arrayLength = count($objitems);
        for ($i = 0; $i < $arrayLength; $i++) {
            if ($objitems[$i]->symbol == $symbol) {
                return $objitems[$i];
            }
        }
    };

    $portfolioStocks = [];
    $userPortfolioStocks = [];
    $combined = [];

    if (Auth::user() != null) {
        $userPortfolioStocks = Singlestock::where('user_id', '=', Auth::user()->id)->get()->toArray();
        $stockexchange = Http::get("https://financialmodelingprep.com/api/v3/symbol/NASDAQ?apikey={$apiKey}");
        $stockexchange2 = Http::get("https://financialmodelingprep.com/api/v3/symbol/NYSE?apikey={$apiKey}");
        // dd($userPortfolioStocks);

        $portfolioStocks = array_fill(0, sizeof($portfolioStocks), NULL);


        for ($i = 0; $i < sizeof($userPortfolioStocks); $i++) {
            $foundStockInfo = (array)$findBySymbol($userPortfolioStocks[$i]['ticker'], json_decode($stockexchange));

            if (!$foundStockInfo) {
                $foundStockInfo = (array)$findBySymbol($userPortfolioStocks[$i]['ticker'], json_decode($stockexchange2));
            }
            $portfolioStocks[$i] = $foundStockInfo;

            $combined[$i] = array_merge($portfolioStocks[$i], $userPortfolioStocks[$i]);
        }
    }
    else{
        abort("401", "Must be logged in and have account to access your portfolio");
    }
    
    // dd($combined);
    // dd($combined, $portfolioStocks, $userPortfolioStocks);

    return view('portfolio', ['portfolioInfo' => $combined]);
});




Route::get('/currencies', function () {

    $apiKey = env('POLYGON_API_KEY');
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }

    date_default_timezone_set('US/Eastern');
    $today = (date("Y-m-d", strtotime("-1 days")));

    if (date("l") == "Saturday") {
        // dd("It is ". date("l"));
        $today = (date("Y-m-d", strtotime("-1 days")));
    } elseif (date("l") == "Sunday") {
        // dd("It is ". date("l"));
        $today = (date("Y-m-d", strtotime("-2 days")));
    } elseif (date("l") == "Monday") {
        $today = (date("Y-m-d", strtotime("-3 days")));
    }





    // dd($today);
    //forex data
    $forexExchangeRates = Http::get("https://api.polygon.io/v2/aggs/grouped/locale/global/market/fx/{$today}?adjusted=true&apiKey={$apiKey}");
    // dd(json_decode($forexExchangeRates)->results);
    $decodedExchangeRates = json_decode($forexExchangeRates);


    // dd($decodedExchangeRates);
    $arrayOfCurrencyExchangeRates = [];
    $arrayLength = $decodedExchangeRates->resultsCount;
    for ($i = 0; $i < $arrayLength; $i++) {
        // echo $i;
        //all of the usd to ___ use the "c" (close value)
        //euro
        if ($decodedExchangeRates->results[$i]->T == "C:USDEUR") {
            $arrayOfCurrencyExchangeRates[0] = $decodedExchangeRates->results[$i];
        }
        //british pound
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDGBP") {
            $arrayOfCurrencyExchangeRates[1] = $decodedExchangeRates->results[$i];
        }
        //canadian dollar
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDCAD") {
            $arrayOfCurrencyExchangeRates[2] = $decodedExchangeRates->results[$i];
        }
        //swiss franc
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDCHF") {
            $arrayOfCurrencyExchangeRates[3] = $decodedExchangeRates->results[$i];
        }
        //japan yen
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDJPY") {
            $arrayOfCurrencyExchangeRates[4] = $decodedExchangeRates->results[$i];
        }
        //austrailan dollar
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDAUD") {
            $arrayOfCurrencyExchangeRates[5] = $decodedExchangeRates->results[$i];
        }
        //russian ruble
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDRUB") {
            $arrayOfCurrencyExchangeRates[6] = $decodedExchangeRates->results[$i];
        }
        //arginetena peso
        elseif ($decodedExchangeRates->results[$i]->T == "C:USDARS") {
            $arrayOfCurrencyExchangeRates[7] = $decodedExchangeRates->results[$i];
        }
    };
    for($i = 0; $i<count($arrayOfCurrencyExchangeRates); $i++){
        if(!array_key_exists($i, $arrayOfCurrencyExchangeRates)){
            $object = new stdClass();
            $object->c = -1;
            $object->o = -1;
            $object->error = "N/A check back later (when foreign/local market closes)";
            $arrayOfCurrencyExchangeRates[$i] = $object;
        }
    }
    
    // dd($arrayOfCurrencyExchangeRates);

    return view('currencies', ['forexExchangeRates' => $arrayOfCurrencyExchangeRates]);
});
Route::get('/investments', function () {
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }
    return view('investments');
});

//
//REGISTER
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
//LOGIN
Route::get('/Log-In-Sign-Up', [RegisterController::class, 'login'])->middleware('guest');
Route::post('/Log-In-Sign-Up', [RegisterController::class, 'create'])->middleware('guest');
//LOGOUT
Route::post('/logout', [RegisterController::class, 'destroy'])->middleware('auth');
//



Route::get('/news', function () {
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }

    $apiKey = env('FINANCIAL_MODELING_PREP_API_KEY');
    $newsarray = Http::get("https://financialmodelingprep.com/api/v3/fmp/articles?page=0&size=100&apikey={$apiKey}")['content'];

    function paginate($items, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    $compactNewsArray = paginate($newsarray);

    return view('news', ['newsarray' => $compactNewsArray]);
});



Route::get('/investments/bonds', function () {
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }
    return view('investments/bonds');
});
Route::get('/investments/options', function () {
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            header('Location: http://127.0.0.1/investments/stocks/' . $search);
            exit;
        }
    }
    return view('investments/options');
});
Route::get('/investments/stocks', function () {
    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }
    return view('investments/stocks');
});

// WILL IMPLEMENT WHEN DATA IS PROVIDED
// the stock parameter will be the stock ticker (easier than id number)
Route::get('/investments/stocks/{stock:ticker}', function ($ticker) {

    //search bar functionality
    if ($_GET) {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            // dd($search);
            $protocol = isset($_SERVER['HTTPS']) &&
                $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $base_url = $protocol . $_SERVER['HTTP_HOST'];

            header('Location: ' . $base_url . '/investments/stocks/' . $search);
            exit;
        }
    }

    //LOVELY FUNCTION
    $findBySymbol = function ($symbol, $objitems) {
        $arrayLength = count($objitems);
        for ($i = 0; $i < $arrayLength; $i++) {
            if ($objitems[$i]->symbol == $symbol) {
                return $objitems[$i];
            }
        }
    };

    //parallel api calls
    // $ch1 = curl_init();
    // $ch2 = curl_init();
    // $ch3 = curl_init();

    // curl_setopt($ch1, CURLOPT_URL, "https://financialmodelingprep.com/api/v3/profile/{$ticker}?apikey={$apiKey}");
    // curl_setopt($ch1, CURLOPT_HEADER, 0);
    // curl_setopt($ch2, CURLOPT_URL, "https://financialmodelingprep.com/api/v3/symbol/NASDAQ?apikey={$apiKey}");
    // curl_setopt($ch2, CURLOPT_HEADER, 0);
    // curl_setopt($ch1, CURLOPT_URL, "https://financialmodelingprep.com/api/v3/profile/{$ticker}?apikey={$apiKey}");
    // curl_setopt($ch1, CURLOPT_HEADER, 0);
    // // dd($ch1);

    // $mh = curl_multi_init();

    // curl_multi_add_handle($mh, $ch1);
    // curl_multi_add_handle($mh, $ch2);
    // curl_multi_add_handle($mh, $ch3);

    // do {
    //     $status = curl_multi_exec($mh, $active);
    //     if ($active) {
    //         // Wait a short time for more activity
    //         curl_multi_select($mh);
    //     }
    // } while ($active && $status == CURLM_OK);

    // curl_multi_remove_handle($mh, $ch1);
    // curl_multi_remove_handle($mh, $ch2);
    // curl_multi_remove_handle($mh, $ch3);
    // curl_multi_close($mh);
    // dd(json_decode((string)$ch1, true));
    // dd($ch1, $ch2, $ch3);
    //END OF PARALLEL



    $apiKey = env('FINANCIAL_MODELING_PREP_API_KEY');

    $humanReadable = new \NumberFormatter('en_US', \NumberFormatter::PADDING_POSITION);
    $stock = Http::get("https://financialmodelingprep.com/api/v3/profile/{$ticker}?apikey={$apiKey}");
    if (json_decode($stock) == null) {
        abort(404, "Page/Stock not found. Please be sure to enter the correct stock ticker. If the stock ticker IS entered correctly, then the stock is not available right now.");
    }
    
    $stock = $stock[0];

    $stockexchange = Http::get("https://financialmodelingprep.com/api/v3/symbol/NASDAQ?apikey={$apiKey}");

    $stockexchangeinfo = $findBySymbol(strtoupper($ticker), json_decode($stockexchange));

    if (!$stockexchangeinfo) {
        $stockexchange = Http::get("https://financialmodelingprep.com/api/v3/symbol/NYSE?apikey={$apiKey}");
        $stockexchangeinfo = $findBySymbol(strtoupper($ticker), json_decode($stockexchange));
    }
    
    if ($stockexchangeinfo == null) {
        abort(404, "Page/Stock not found. Please be sure to enter the correct stock ticker. If the stock ticker IS entered correctly, then the stock is not available right now.");
    }

    $earningsDate = new DateTimeImmutable($stockexchangeinfo->earningsAnnouncement);


    return view('investments/singleStock', [
        'stock' => $stock,
        'stockexchangeinfo' => $stockexchangeinfo,
        'earningsDate' => $earningsDate->format('M-d-y H:i'),
        'humanReadable' => $humanReadable,

    ]);
});

Route::post('/add', [SinglestockController::class, 'addToPortfolio']);
