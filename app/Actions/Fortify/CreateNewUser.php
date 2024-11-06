<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\PromoterSalaryTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        log::info('data',$input);
        // $validator = Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'phone' => ['required', 'max:10', 'unique:users'],
        //     'address' => ['required', 'string', 'max:2550'],
        //     'password' => $this->passwordRules(),
        //     // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : [],
        // ])->validate();
        
        // dd($validator);

        $data = [
            'name'       => $input['name'],
            'email'      => $input['email'],
            'phone'      => $input['phone'],
            'address'    => $input['address'],
            'usertype'   => 2,
            'password'   => Hash::make($input['password']),
        ];
    
        $user= User::create($data);
        
        $promoterId = $user->id;
        $targetAmountReceived = 0;
        $targetAmount = 50000;
        $monthlySalary = 20000;
        $monthlySalaryAmountToPaid = 0;
        $pendingPercent =0;
        $targetDiff = 0;
        $promoterSalaryTarget = PromoterSalaryTarget::create(
            [
                'promoter_id' => $promoterId,   
                'target_amount_received' => $targetAmountReceived,
                'target_amount' => $targetAmount,
                'monthly_salary' => $monthlySalary,
                'monthly_salary_amount_to_paid' => $monthlySalaryAmountToPaid,
                'pending_percent' => $pendingPercent,
                'targetdiff' => $targetDiff
            ]
        );

        return $user;
   
    }
}
