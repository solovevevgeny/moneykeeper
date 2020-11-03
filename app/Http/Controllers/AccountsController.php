<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountsController extends Controller{

    public function index() {
        $Accounts = Account::all();
        return response ($Accounts, 200);
    }

    public function store(Request $request) {
    }

    public function update(Request $request) {}

    public function destroy(Request $request) {}

}
