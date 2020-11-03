<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $Account = new Account();
        $Account->title = "Альфабанк";
        $Account->start_amount = 0;
        $Account->current_amount = $Account->start_amount;
        $Account->save();

        $Account = new Account();
        $Account->title = "Сбербанк";
        $Account->start_amount = 0;
        $Account->current_amount = $Account->start_amount;
        $Account->save();

        $Account = new Account();
        $Account->title = "Санкт-Петербург";
        $Account->start_amount = 0;
        $Account->current_amount = $Account->start_amount;
        $Account->save();

        $Account = new Account();
        $Account->title = "Кошелек";
        $Account->start_amount = 0;
        $Account->current_amount = $Account->start_amount;
        $Account->save();

        $Account = new Account();
        $Account->title = "Сейф";
        $Account->start_amount = 0;
        $Account->current_amount = $Account->start_amount;
        $Account->save();


    }
}
