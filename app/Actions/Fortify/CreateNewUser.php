<?php

namespace App\Actions\Fortify;

use App\Models\PaymentStatus;
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

        $target = PromoterSalaryTarget::create([
            'promoter_id' => $promoterId,
            'month' => \Carbon\Carbon::now()->format('Y-m'),
            'target_amount_received' => 0,
            'target_amount' => 50000,
            'monthly_salary' => 20000,
            'monthly_salary_amount_to_paid' => 0,
            'pending_percent' => 100,
            'targetdiff' => 50000,
            'pending_target' => 0,
            'previous_monthly_salary_amount_to_paid' => 0
        ]);

        return $user;
    }
}
