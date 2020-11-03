<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Operation;

class OperationsController extends Controller{
    
    public function index() {
        $operations = Operation::all();
        return response ([
                'operations'=>$operations
        ], 200);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'type' => 'string|required',
            'amount' => 'required',
            'account_from_id' => 'integer',
            'account_to_id' => 'integer',
            'comment'=>'string'
        ]);

        if ($validator->fails()) {
            return response(['errors'=>$validator->fails()], 500);
        }

        $operation = Operation::create($request->all());
        $operation->save();
     
        return response (['operation'=>$operation], 201); // CREATED
    }

    public function update(Request $request) {}

    public function destroy(Request $request) {}

}
