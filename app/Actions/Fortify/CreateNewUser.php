<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\PromoterSalaryTarget;
use Carbon\Carbon;
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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'phone' => ['required', 'string', 'phone', 'max:10', 'unique:users'],
            'address' => ['required', 'string', 'max:2550'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'usertype' => 2,
            'password' => Hash::make($input['password']),

        ]);
        $promoterId = $user->id;
        $targetAmountReceived = 0;
        $targetAmount = 0;
        $monthlySalary = 0;
        $monthlySalaryAmountToPaid = 0;
        $pendingPercent = 0;
        $targetDiff = 0;
        $current_month = Carbon::now()->format('Y-m');

        $promoterSalaryTarget = PromoterSalaryTarget::create(
            [
                'promoter_id' => $promoterId,
                'target_amount_received' => $targetAmountReceived,
                'target_amount' => $targetAmount,
                'monthly_salary' => $monthlySalary,
                'monthly_salary_amount_to_paid' => $monthlySalaryAmountToPaid,
                'pending_percent' => $pendingPercent,
                'targetdiff' => $targetDiff,
                'month' => $current_month
            ]
        );

        return $user;
    }
}
