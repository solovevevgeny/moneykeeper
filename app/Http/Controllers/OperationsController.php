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
            return response(['errors'=>$validator->fails()], 400); //bad request
        }

        $operation = Operation::create($request->all());
        $operation->save();
     
        return response (['operation'=>$operation], 201); // created
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
