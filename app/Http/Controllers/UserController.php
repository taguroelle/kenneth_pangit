<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;
Class UserController extends Controller {
use ApiResponser;
private $request;
public function __construct(Request $request) {
$this->request = $request;
}
public function getUsers(){
    $users = DB::connection('mysql')
->select("Select * from students");
return $this->successResponse($users);
}

public function index()
{
    $users = User::all();
    return $this->successResponse($users);
}

// view student records
public function getallstud()
{
    $users = User::all();
    return $this->successResponse($users);
}

// insert new record

public function addstud(Request $request ){
$rules = [
    'student_last_name' => 'required|alpha|max:50', 
    'student_first_name' => 'required|alpha|max:50',
    
];
$this->validate($request,$rules);
$user = User::create($request->all());
return $this->successResponse($user,Response::HTTP_CREATED);
}



//search student by studid
     public function getstudid($id)
{
      $user = User::where('id',$id)->first(); if($user){
      return $this->successResponse($user);
}
{
       return $this->errorResponse('user ID Does Not Exists', Response::HTTP_NOT_FOUND);
}
}


//update student record by studid
     public function updatestudid(Request $request,$id)
{
   $rules = [
    'student_last_name' => 'required|alpha|max:50', 
    'student_first_name' => 'required|alpha|max:50',
];
$this->validate($request, $rules);
$user = User::findOrFail($id);
$user->fill($request->all());

//alt
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
}
        $user->save();
        return $this->successResponse($user);

}

//delete student record by studid
        public function deletestudid($id)
{
        $user = User::findOrFail($id);
        $user->delete();

return $this->successResponse($user);
}
}