<div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-center">Currency Calculator</h1>
            <div class="row align-items-md-stretch mx-4">
                <div class="col-md-12">
                    <div class="h-100 p-5 text-bg-dark rounded-3 d-flex justify-content-center">
                        <div class="mx-4">
                            <label for="amount">$ Amount: </label>
                            <input type="text">
                        </div>
                        <div class="mx-4">
                            <label for="cars">Currency 1 (From):</label>

                            <select name="currencies" id="currencies">
                                <option value="USD">USD</option>
                                <option value="EURO">EURO</option>
                                <option value="British_Pound">British Pound</option>
                                <option value="Canadian_Dollar">Canadian Dollar</option>
                                <option value="Australian_Dollar">Australian Dollar</option>
                                <option value="Swiss_Franc">Swiss Franc</option>
                                <option value="Vietnamese_Dong">Vietnamese Dong</option>
                                <option value="Russian_Ruble">Russian Ruble</option>
                            </select>
                        </div>
                        <!--NOTE: how many *currency1 gets me _____currency2?-->
                        <div class="mx-4">
                            <label for="cars">Currency 2 (To):</label>

                            <select name="currencies" id="currencies">
                                <option value="USD">USD</option>
                                <option value="EURO">EURO</option>
                                <option value="British_Pound">British Pound</option>
                                <option value="Canadian_Dollar">Canadian Dollar</option>
                                <option value="Australian_Dollar">Australian Dollar</option>
                                <option value="Swiss_Franc">Swiss Franc</option>
                                <option value="Vietnamese_Dong">Vietnamese Dong</option>
                                <option value="Russian_Ruble">Russian Ruble</option>
                            </select>
                        </div>
                        <div>
                            <button class="bg-primary">Calculate</button>
                        </div>
                    </div>
                    <h1 class="text-center">Result:</h1>
                    <h3 class="text-center">N/A</h3>
                </div>
            </div>
        </div>