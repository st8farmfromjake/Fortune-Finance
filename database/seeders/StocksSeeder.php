<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StocksSeeder extends Seeder{
    public function run(): void {
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'AAPL',
            'name' => 'Apple Inc.',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'INTC',
            'name' => 'Intel Corporation',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'NVDA',
            'name' => 'NVIDEA Corporation',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'GOOG',
            'name' => 'Alphabet Inc.',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'SPY',
            'name' => 'SPDR S&P 500 ETF Trust',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'TSLA',
            'name' => 'Tesla Inc.',
            

        ]);
        DB::table('singlestocks')->insert([
            'user_id'=> '1',
            'ticker' => 'MFST',
            'name' => 'Microsoft Corporation',
            

        ]);
    }
}