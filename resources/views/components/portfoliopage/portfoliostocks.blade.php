<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col">Ticker</th>
            <th scope="col">$ Current Price</th>
            <th scope="col">$ Amount Invested</th>
            <th scope="col">Day Change %</th>
            <th scope="col">Gain/Loss %</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($portfolioInfo as $stock)
        <tr>
            <th scope="row">{{$stock['ticker']}}</th>
            <td>$ {{number_format($stock['price'], 2, '.', '')}}</td>
            <td>$ {{$stock['amount_invested']}}</td>
            <td class={{($stock['changesPercentage']>0) ? "bg-success" : "bg-danger"}}>{{number_format($stock['changesPercentage'], 2, '.', '')}}%</td>
            <td class={{(((($stock['price']-$stock['buyin_price'])/$stock['buyin_price'])*100)>0) ? "bg-success" : "bg-danger"}}>{{number_format((($stock['price']-$stock['buyin_price'])/$stock['buyin_price'])*100, 2, '.', '')}}%</td>
        </tr>
        @endforeach
    </tbody>
</table>