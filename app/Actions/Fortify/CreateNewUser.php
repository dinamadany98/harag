<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'phonenumber'=>['required' ,'integer','digits:9'],
            'role'=>['required'],
        ])->validate();


        $nameimage="77.jpg";      
         if(request()->hasFile('photo'))
        
        {
        
            $img=request()->file('photo');//اسم الصوره اللى رفعتها
            $nameimage=time().'.'.$img->getClientOriginalExtension(); //تغيير اسم الصوره الى رقم عشوائى
            $path=public_path('/images'); //مكان الى هحفظ فيه الصوره 
             $img->move($path,$nameimage);
                
        }
        // $input['photo']=$nameimage;

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phonenumber'=>'+966'.$input['phonenumber'],
            'photo'=>$nameimage,
            'role'=>$input['role'],

        ]);
    }
}
