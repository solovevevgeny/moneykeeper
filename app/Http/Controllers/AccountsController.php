<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Account;

class AccountsController extends Controller{

    public function index() {
        $Accounts = Account::all();
        return response ($Accounts, 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title'       => 'required',
            'start_amount'=>'integer|nullable'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->fails()], 400); //bad request
        }

        $Account = Account::create($request->all());
        $Account->save();
     
        return response (['Account'=>$Account], 201); // created
    }

    public function update(Request $request) {}

    public function destroy(Request $request) {}

}
