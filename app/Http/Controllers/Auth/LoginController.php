<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Captcha\CaptchaService;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }
    public function getCaptcha(){

        $capt = new CaptchaService();
        $captch = $capt->run();

    }
    public function login(){

        $loginType = 0;

        $validator = $this->validatorItem('login');

        if($validator->fails()){

            return $validator->validate();

        }elseif(request()->session()->get('captcha_code') !== strtolower($validator->validated()['captcha'])){

            return redirect()->back()
            ->withInput(request()->only(['email']))
            ->withErrors([
                'captcha' => "Please enter the characters correctly"
            ]);

        }else{
            $data = $validator->validate();
            $email = $data['email'];
            $password = Hash::make($data['password']);
            $user = User::where('email',$email)->where('password', 0)->first();

            if(!$user){
                return redirect()->back()
                    ->withInput(request()->only(['email']))
                    ->withErrors([
                        'email' => "Your email or password is invalid",
                        'password' => "Your email or password is invalid",
                ]);

            }else{
                Auth::login($user);
                return redirect()->to('/');
            }

        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->to('/login');
        // return route('logi');
    }
    protected function validatorItem($type){

        $x = '';

        if($type == 'login'){

            $loginType = 0;
            if(!$loginType){
                $x = Validator::make(request()->all(),[
                    'email' => 'required',
                    'password' => 'required',
                    'captcha' => 'required|max:5|min:5|string',
                ]);
            }

        }

        return $x;
    }
}
