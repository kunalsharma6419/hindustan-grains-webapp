<?php

// App/Listeners/UpdatePromoterSalaryTargets.php

namespace App\Listeners;

use App\Events\PaymentStatusCreated;
use App\Models\PaymentStatus;
use App\Models\PromoterSalaryTarget;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Payment;

class UpdatePromoterSalaryTargets
{
    public function handle(PaymentStatusCreated $event)
    {
        $paymentStatus = $event->paymentStatus;
        $promoterId = $paymentStatus->promoter_id;
        $currentMonth = Carbon::now()->format('Y-m');
        $previous_month = Carbon::now()->subMonth()->format('Y-m');
        $amountPaid = $paymentStatus->amount_paid;

        $promoters = User::findOrFail($promoterId);

        $target = PromoterSalaryTarget::where('promoter_id', $promoters->id)
            ->where('month', $currentMonth)
            ->first();

        $previous_target = PromoterSalaryTarget::where('promoter_id', $promoters->id)
            ->where('month', $previous_month)
            ->first();

            if (!$target) {
                $target = PromoterSalaryTarget::create([
                    'promoter_id' => $promoters->id,
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
            }
    
                if (isset($previous_target) && $previous_target->targetdiff > 0) {
                    $pending_target = $previous_target->targetdiff;
                    $remaining_target = $pending_target - $amountPaid;
    
                    if ($remaining_target <= 0) {
                        $previous_target->target_amount_received += $pending_target;
                        $previous_target->monthly_salary_amount_to_paid = $previous_target->target_amount_received * $previous_target->monthly_salary / $previous_target->target_amount;
                        $previous_target->targetdiff = $previous_target->target_amount - $previous_target->target_amount_received;
                        $previous_target->pending_percent = 100 - (($previous_target->target_amount_received * 100) / $previous_target->target_amount);
                        
                        $target->pending_target = $previous_target->targetdiff;
                        $target->previous_monthly_salary_amount_to_paid = $previous_target->monthly_salary_amount_to_paid;
                        $target->target_amount_received = abs($remaining_target);
                        $target->targetdiff = $target->target_amount - $target->target_amount_received;
                        $target->pending_percent = 100 - (($target->target_amount_received * 100) / $target->target_amount);

                        if ($target->target_amount != 0) {
                            $target->monthly_salary_amount_to_paid = $target->target_amount_received * $target->monthly_salary / $target->target_amount;
                        }else{
                            $target->monthly_salary_amount_to_paid = 0;
                        }
                    } else {
                        $previous_target->target_amount_received += $amountPaid;
                        $previous_target->monthly_salary_amount_to_paid = $previous_target->target_amount_received * $previous_target->monthly_salary / $previous_target->target_amount;
                        $previous_target->targetdiff = $previous_target->target_amount - $previous_target->target_amount_received;
                        $previous_target->pending_percent = 100 - (($previous_target->target_amount_received * 100) / $previous_target->target_amount);

                        $target->previous_monthly_salary_amount_to_paid = $previous_target->monthly_salary_amount_to_paid;
                        $target->pending_target = $previous_target->targetdiff;
                        $target->pending_percent = 100 - (($target->target_amount_received * 100) / $target->target_amount);
                    }
                } else {
                    $target->target_amount_received += $amountPaid;
        
                    if ($target->target_amount != 0) {
                        $target->monthly_salary_amount_to_paid = $target->target_amount_received * $target->monthly_salary / $target->target_amount;
                    } else {
                        $target->monthly_salary_amount_to_paid = 0;
                    }
                    $target->targetdiff = $target->target_amount - $target->target_amount_received;
                    $target->pending_percent = 100 - (($target->target_amount_received * 100) / $target->target_amount);
                }
            
            $previous_target ? $previous_target->save() : null;
            $target->save();
    }
}
