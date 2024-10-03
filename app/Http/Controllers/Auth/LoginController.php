<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;
use App\Http\Services\Captcha\CaptchaService;


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
            ->withInput(request()->only(['id']))
            ->withErrors([
                'captcha' => __('messages.login.errors.captchaNotValidate')
            ]);

        }else{

            $login = $loginType?
                'login':
                $this->loginRegisterOtp($validator->validated());

            if($login['status']){
                return redirect()->route('login-confirm-form', $login['token']);
            }else{
                if($login['error'] == 'block'){

                    return redirect()->back()
                    ->withInput(request()->only(['id']))
                    ->withErrors([
                    'id' => __('messages.login.errors.block')
                    ]);

                }else{

                    return redirect()->back()
                    ->withInput(request()->only(['id']))
                    ->withErrors([
                    'captcha' => __('messages.login.errors.captchaNotValidate')
                    ]);
                }

            }

        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
    protected function validatorItem($type){

        $x = '';


        if($type == 'login'){

            $loginType = 0;
            if(!$loginType){
                $x = Validator::make(request()->all(),[
                    'email' => 'required|email:rfc,dns',
                    'password' => 'required',
                    'captcha' => 'required|max:5|min:5|string',
                ]);
            }

        }

        return $x;
    }
}
