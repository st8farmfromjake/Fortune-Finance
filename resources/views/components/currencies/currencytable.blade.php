<table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Amount $ </th>
                    <th scope="col">Day Change % (USD to ___)</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">USD to USD</th>
                    <td>1</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <th scope="row">USD to EURO</th>
                    <td>${{number_format($forexExchangeRates[0]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[0]->c - $forexExchangeRates[0]->o)/$forexExchangeRates[0]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[0]->c - $forexExchangeRates[0]->o)/$forexExchangeRates[0]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to British Pound</th>
                    <td>${{number_format($forexExchangeRates[1]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[1]->c - $forexExchangeRates[1]->o)/$forexExchangeRates[1]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[1]->c - $forexExchangeRates[1]->o)/$forexExchangeRates[1]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Canadian Dollar</th>
                    <td>${{number_format($forexExchangeRates[2]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[2]->c - $forexExchangeRates[2]->o)/$forexExchangeRates[2]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[2]->c - $forexExchangeRates[2]->o)/$forexExchangeRates[2]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Swiss Franc</th>
                    <td>${{number_format($forexExchangeRates[3]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[3]->c - $forexExchangeRates[3]->o)/$forexExchangeRates[3]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[3]->c - $forexExchangeRates[3]->o)/$forexExchangeRates[3]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Japanese Yen</th>
                    <td>${{number_format($forexExchangeRates[4]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[4]->c - $forexExchangeRates[4]->o)/$forexExchangeRates[4]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[4]->c - $forexExchangeRates[4]->o)/$forexExchangeRates[4]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Australian Dollar</th>
                    <td>${{number_format($forexExchangeRates[5]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[5]->c - $forexExchangeRates[5]->o)/$forexExchangeRates[5]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[5]->c - $forexExchangeRates[5]->o)/$forexExchangeRates[5]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Russian Ruble</th>
                    <td>${{number_format($forexExchangeRates[6]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[6]->c - $forexExchangeRates[6]->o)/$forexExchangeRates[6]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[6]->c - $forexExchangeRates[6]->o)/$forexExchangeRates[6]->o, 5, '.', '')}}%</td>
                </tr>
                <tr>
                    <th scope="row">USD to Argentine Peso</th>
                    <td>${{number_format($forexExchangeRates[7]->c, 2, '.', '')}}</td>
                    <td class="{{(number_format((float)($forexExchangeRates[7]->c - $forexExchangeRates[7]->o)/$forexExchangeRates[7]->o, 5, '.', '')>0) ? "bg-success" : "bg-danger"}}">{{number_format((float)($forexExchangeRates[7]->c - $forexExchangeRates[7]->o)/$forexExchangeRates[7]->o, 5, '.', '')}}%</td> 
                </tr>
            </tbody>
        </table>