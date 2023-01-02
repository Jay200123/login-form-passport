<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Storage;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'city' => 'required|max:255',
            'phone' => 'required|max:255',
            'customer_image' => 'mimes:png, jpg, gif, svg',

        ]);

        //inserting data through post request
        $customer = new Customer();

        $customer->user_id = $user->id;
        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->address = $request->address;
        $customer->town = $request->town;
        $customer->city = $request->city;
        $customer->phone = $request->phone;

        $files = $request->file('uploads');

        $customer->customer_image = 'images/'.  $files->getClientOriginalName();
        $customer->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        // Auth::login($user);
        // return response()->json(["success" => "Customer created successfully.", "customer" => $customer, "status" => 200]);
   
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function employeeRegister(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        $employee = new Employee();

        $employee->user_id  = $user->id;
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->address = $request->address;
        $employee->town = $request->town;
        $employee->city = $request->city;
        $employee->phone = $request->phone;

        $files = $request->file('uploads');

        $employee->employee_image = 'images/'. $files->getClientOriginalName();
        $employee->save();
        // $employee->update();


        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "employee created successfully.", "employee" => $employee, "status" => 200]);

    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;

            // $token = $success->getClientOrignalName();

            // Storage::put('public/tokens/'.$token->getClientOriginalName(), file_get_contents($token));
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    public function logout() {
        // $accessToken = auth()->user()->token();
        // $user = $request->user()->tokens->find($accessToken);
        // $user->revoke();

        // Auth::user()->tokens->each(function($token, $key) {
        //     $token->delete();
        // });

        $user = Auth::user()->tokens();
        $user->revoke();

        $response = ["message" => "You have Successfully Logout!"];

        // return response()->json($response, 200);
        return redirect('/')->with('message', json_encode([$response, 200]));
        // return redirect('customer')->with('message', json_encode(['success'=>'sucessfull!']));
    }
    
}