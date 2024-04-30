<?php

namespace App\Http\Controllers;

use App\Models\Singlestock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SinglestockController extends Controller
{
    public function index()
    {
        return view('stocks/');
    }

    public function search()
    {
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
    }

    public function addToPortfolio()
    {
        // dd(request());
        $validator = Validator::make(request()->all(), [
            'amountInvested' => ['required', 'digits_between:1,9999999', 'numeric'],
            'buyInPrice' => ['required', 'between:0.01,999999', 'numeric'],
            'ticker' => [],
        ]);
        
        //how to asign attributes with information from the page
        
        
        //doesnt dd anything below this
        
        if(Auth::id()==null){
            
            $validator->getMessageBag()->add('user_id', 'You must be logged in to add a stock to your portfolio. ');
            throw ValidationException::withMessages(['user_id'=>__('You must be logged in to add a stock to your portfolio. ')]);
        }
        
        $attributes = [
            "user_id" => Auth::id(),
            "ticker"=> $validator->validated()['ticker'],
            "amount_invested" => $validator->validated()['amountInvested'],
            "buyin_price" => $validator->validated()['buyInPrice'],
        ];

        // dd($attributes);



        Singlestock::create($attributes);
        return redirect('/portfolio')->with('success', 'Stock added to portfolio :)');
    }
}
