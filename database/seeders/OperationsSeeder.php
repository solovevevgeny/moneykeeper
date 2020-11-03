<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operation;

class OperationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $Operation = new Operation();
        $Operation->type = "sup";
        $Operation->account_from_id = 1;
        $Operation->amount = 1000;
        $Operation->comment = "Списание со счета Альфабанк";
        $Operation->save();

        $Operation = new Operation();
        $Operation->type = "sup";
        $Operation->account_from_id = 2;
        $Operation->amount = 1000;
        $Operation->comment = "Списание со счета Сбербанк";
        $Operation->save();
 
        $Operation = new Operation();
        $Operation->type = "add";
        $Operation->account_from_id = 1;
        $Operation->amount = 8000;
        $Operation->comment = "Постулпение на счет Альфабанка";
        $Operation->save();
 
        $Operation = new Operation();
        $Operation->type = "sup";
        $Operation->account_from_id = 1;
        $Operation->account_to_id = 2;
        $Operation->amount = 1000;
        $Operation->comment = "Перевод с Альфабанка на Сбербанк";
        $Operation->save();

    }
}
