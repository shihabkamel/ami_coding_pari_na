<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InputValue;
use App\Mail\hellomail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;


class helloController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function section2(){
        return view('section2');
    }

    public function section2_search(Request $request)
    {
        $inputValues = $request->input('input_values');
        $searchValue = $request->input('search_value');


        $sortedInput = collect(explode(',', $inputValues))->sortDesc();
        InputValue::create([
            'user_id' => auth()->user()->id,
            'input_values' => $sortedInput->implode(','),
        ]);

        $result = $sortedInput->contains($searchValue);

        return view('section2', ['result' => $result]);
    }


    public function getInputValues(Request $request)
    {
     $userId=auth()->user()->id;

        $inputValues = DB::table('input_values')
            ->select('created_at', 'input_values')
            ->where('user_id', $userId)
            ->orderBy('created_at')
            ->get();

        if ($inputValues->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'user_id' => $userId,
                'payload' => []
            ]);
        }

        $formattedInputValues = [];
        foreach ($inputValues as $input) {
            $formattedInputValues[] = [
                'timestamp' => $input->created_at,
                'input_values' => $input->input_values
            ];
        }

        return response()->json([
            'status' => 'success',
            'user_id' => $userId,
            'payload' => $formattedInputValues
        ]);
    }

    public function login(){
        return view('login');
    }

    public function login_submit(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('register');
        }

    }

    public function register(){
        return view('register');
    }
    public function register_submit(Request $request){
        $token = hash('sha256',time());
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration Confirmation';
        $message = 'Please click on this link: <br><a href="'.$verification_link.'">Click here</a>';

        \Mail::to($request->email)->send(new hellomail($subject,$message));

        echo 'Email is sent';
}
   public function registration_verify($token,$email){
$user=user::where('token',$token)->where('email',$email)->first();
if(!$user){
    return redirect()->route('register');
}
$user->status="Active";
$user->token="";
$user->update();
echo "registration verification is successful";
return redirect()->route('login');
   }

   
   public function logout()
   {
       Auth::guard('web')->logout();
       return redirect()->route('login');
   }
  
    public function forget_password(){
        return view('forget_password');
    }
    public function forget_password_submission(Request $request){
        $token = hash('sha256',time());
        $user=User::where('email',$request->email)->first();
        if(!$user){ echo "User not found";}
        else{
            $user->token=$token;
            $user->update();
            $reset_link=url('reset-password/'.$token.'/'.$request->email);
            $subject='Reset Password';
            $message='Please click on the following link : <br> <a href="'.$reset_link.'">Click here</a>';
            \Mail::to($request->email)->send(new hellomail($subject,$message));
            echo "Check your email";
        }
    }

    public function reset_password($token,$email){
         $user=User::where('token',$token)->where('email',$email)->first();
         if(!$user){return redirect()->route('login');}
         else{
            return view('reset_password', compact('token','email'));
         }
    }

    public function reset_password_submit(Request $request){
        $user=User::where('token',$request->token)->where('email',$request->email)->first();
   $user->token='';
   $user->password=Hash::make($request->password);
   $user->update();

   return redirect()->route('login');
    }



}
