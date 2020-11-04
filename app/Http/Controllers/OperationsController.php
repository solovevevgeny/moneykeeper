<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Operation;
use App\Models\Account;

class OperationsController extends Controller{
    
    public function index() {
        $operations = Operation::all();
        return response ([
                'operations'=>$operations
        ], 200);
    }


    private function accountAmountChange($account_id, $amount) {
        $account = Account::find($account_id);
        $account->current_amount = $account->current_amount + $amount;
        $account->save();
    }

    private function operationAdd($request) {
        $operation = Operation::create($request->all());
        $operation->save();

        $result = ['data'=>$operation, 'statusCode'=>201];
        $this->accountAmountChange($request->input('account_to_id'), $request->input('amount'));

        return $result;
    }

    private function operationSup($request) {
        $operation = Operation::create($request->all());
        $operation->save();

        $result = ['data'=>$operation, 'statusCode'=>201];

        $this->accountAmountChange($request->input('account_from_id'), $request->input('amount'));
        return $result;
    }

    private function operationMove($request) {
        $operation = Operation::create($request->all());
        $operation->save();

        $result = ['data'=>$operation, 'statusCode'=>201];

        $this->accountAmountChange($request->input('account_to_id'), $request->input('amount')); // +
        $this->accountAmountChange($request->input('account_from_id'), $request->input('amount') * -1 ); // -

        return $result;
    }

    public function create(Request $request) {

        switch ($request->input('type')){
            case 'Add': 
                $validateRules = [
                    'type' => 'string:requried',
                    'amount' => 'required|integer',
                    'account_to_id' => 'required|integer',
                    'comment' => 'string'
                ];
            break;

            case 'Sup': 
                $validateRules = [
                        'type' => 'string:requried',
                        'amount' => 'required|integer',
                        'account_from_id' => 'required|integer',
                        'comment' => 'string'
                    ];
                break;

            case 'Move': 
                $validateRules = [
                        'type' => 'string:requried',
                        'amount' => 'required|integer',
                        'account_to_id' => 'required|integer',
                        'account_from_id' => 'required|integer',
                        'comment' => 'string'
                    ];
                break;
            }
            
        $validator = Validator::make($request->all(), $validateRules);

        if ($validator->fails()) {
             return response()->json(['errors'=>$validator->errors()]);
        }

        $callMethod = 'operation' . $request->input('type');
        $result = $this->{$callMethod}($request);

        return response ($result['data'], $result['statusCode']); // created
    }

    public function update($id, Request $request) {
        $operation = Operation::find($id);
        if ($operation == null) {
            return response (null, 404);
        }
        else {
            $operation->update($request->all());
            return response ($operation, 201);
        }
        
    }

    public function delete($id) {
        // todo: validation 
        $operation = Operation::find($id);
        if ($operation !== null) {
            $deleteResult = $operation->delete();
            return response(null, 204); // delete success, empty entity
        }
        else {
            return response (null, 404); // not found
        }

    }

    public function show($id) {
        $operation = Operation::find($id);
        if ($operation == null) {
            return response (null, 404); // operation not found
        }
        else {
            return $operation;
        }
    }

}
