<table class="table table-dark table-bordered table-striped">
    <tbody>
        <tr>
            <th scope="row">Previous Close: </th>
            <td>{{$stockexchangeinfo->previousClose}}</td>
            <th>Day Range: </th>
            <td>{{$stockexchangeinfo->dayLow}} - {{$stockexchangeinfo->dayHigh}}</td>
            <th>Market Cap: </th>
            <td>{{$humanReadable->format($stock['mktCap'])}}</td>
            <th>Earnings Date:</th>
            <td>{{$earningsDate}}</td>
        </tr>
        <tr>
            <th scope="row">Open: </th>
            <td>{{$stockexchangeinfo->open}}</td>
            <th>52 Week Range: </th>
            <td>{{$stockexchangeinfo->yearLow}} - {{$stockexchangeinfo->yearHigh}}</td>
            <th>Beta (5Y Monthly): </th>
            <td>{{$humanReadable->format($stock['beta'])}}</td>
            <th>Last Dividend: </th>
            <td>${{$stock['lastDiv']}}</td>
        </tr>
        <tr>
            <th scope="row">Sector: </th>
            <td>{{$stock['sector']}}</td>
            <th>Volume: </th>
            <td>{{number_format($stockexchangeinfo->volume)}}</td>
            <th>P/E Ratio(TTM): </th>
            <td>{{$stockexchangeinfo->pe}}</td>
            <th>Country:</th>
            <td>{{$stock['country']}}</td>
        </tr>
        <tr>
            <th scope="row">Industry: </th>
            <td>{{$stock['industry']}}</td>
            <th>Average Volume: </th>
            <td>{{$humanReadable->format($stock['volAvg'])}}</td>
            <th>EPS(TTM): </th>
            <td>{{$stockexchangeinfo->eps}}</td>
            <th># of Employees:</th>
            <td>{{$humanReadable->format($stock['fullTimeEmployees'])}}</td>
        </tr>
    </tbody>
</table>

<div class="d-flex m-4 p-4 text-center border border-solid border-white justify-content-center">{{$stock['description']}}</div>