<?php
namespace App\Controllers;

use App\Database\QueryBuilder;
use App\Traits\ResponseTrait;

use App\Validations\ValidateData;
class phonesController
{
    use ValidateData;
    use ResponseTrait;
    // use validateData;
    protected $queryBuilder;
    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder();
    
    }
    public function index()
    {
        $phones = $this->queryBuilder->table('phones')->getAll()->execute();

        if (count($phones) < 1) {
            return $this->sendResponse(data: $phones, message: 'phone number list is empty');
        }

        return $this->sendResponse(data: $phones, message: 'phone number list has  been recived');
    }
    public function show($id)
    {
        $phone = $this->queryBuilder
            ->table('phones')->get()
            ->where('id', '=', $id)
            ->execute();

        if (!$phone) {
            return $this->sendResponse(data: null, message: 'couldnt find the phone number', error: true, status: HTTP_BadREQUEST);
        }

        return $this->sendResponse(data: $phone, message: 'phone number lists has  been recived', );
    }
    public function store($request)
    {
         $this->validate([
            'name||required|min:3|max:15|string' ,
            'phone_number||required|length:11|string'
        ],$request);
            // if (!isset($request->phone_number) || empty($request->phone_number) ) 
        //     return $this->sendResponse(message: 'please enter phone number', status: HTTP_BadREQUEST, error: true);
        

    $newPhone = $this->queryBuilder->table('phones')->insert([
        'name' => $request->name,
        'phone' => $request->phone_number,
    ])->execute();
    return $this->sendResponse(data: $newPhone, message: 'new phone number has been set successfully');
    
}
        
     
    public function update($id, $request)
    {
        $isErorr = false;
        $errorMessages  = [];
        if (!isset($request->name) || empty($request->name))
            $isErorr = true && array_push($errorMessages, 'please enter name');
        if (!isset($request->phone_number) || empty($request->phone_number))
                $isErorr = true && array_push($errorMessages, 'please enter phone number');
        if ($isErorr)
            return $this->sendResponse(message:$errorMessages,error:true,status:HTTP_BadREQUEST);
            $phone = $this->queryBuilder
            ->table('phones')->get()
            ->where('id', '=', $id)
            ->execute();

            if (!$phone) {
                return $this->sendResponse(data: null, message: 'couldnt find the phone number', error: true, status: HTTP_BadREQUEST);
            }
        $updatedPhone = $this->queryBuilder->table('phones')->update([
            'name' => $request->name,
            'phone' => $request->phone_number,
        ])->where('id', '=', $id)->execute();
        return $this->sendResponse(data: $updatedPhone, message: ' phone number has been  successfully updated');

    }
     
    public function destroy($id)
    {
        if ($id == "*") {
            $deletePhone = $this->queryBuilder->table('phones')->delete()->execute();return $this->sendResponse(data: $deletePhone, message: ' phone number has been  successfully deleted');} else {
                $phone = $this->queryBuilder
                ->table('phones')->get()
                ->where('id', '=', $id)
                ->execute();
    
                if (!$phone) {
                    return $this->sendResponse(data: null, message: 'couldnt find the phone number', error: true, status: HTTP_BadREQUEST);
                }
            $deletePhone = $this->queryBuilder->table('phones')->delete()->where('id', '=', $id)->execute();
            return $this->sendResponse(data: $deletePhone, message: ' phone number has been  successfully deleted');
        }
    }
}
