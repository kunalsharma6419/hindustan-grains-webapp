<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductInvoice;
use App\Models\PromoterSalaryTarget;
use Auth;
use Carbon\Carbon;

class PromoterTargetController extends Controller
{
    public function index()
    {
        $promoters = User::where('id', '!=', Auth::id())->latest()->get();
        return view('admin.promoter.index', compact('promoters'));
    }

    public function edit($id)
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $previous_month = Carbon::now()->subMonth()->format('Y-m');

        $promoters = User::findOrFail($id);

        $promoters_invoice = PaymentStatus::where('promoter_id', $promoters->id)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount_paid');

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
                'target_amount' => 0,
                'monthly_salary' => 0,
                'monthly_salary_amount_to_paid' => 0,
                'pending_percent' => 0,
                'targetdiff' => 0,
                'pending_target' => 0,
                'previous_monthly_salary_amount_to_paid' => 0
            ]);
        }

        if ($previous_target) {
            $pending_target = $previous_target->targetdiff;
            $target->pending_target = $pending_target;

            if ($pending_target > 0) {
                $remaining_target = $pending_target - $promoters_invoice;

                if ($remaining_target <= 0) {
                    $target->previous_monthly_salary_amount_to_paid = ($pending_target * $previous_target->monthly_salary / $previous_target->target_amount) + $previous_target->monthly_salary_amount_to_paid;
                    $target->target_amount_received = abs($remaining_target);
                    $target->pending_target = 0;
                    $target->targetdiff = $target->target_amount - $target->target_amount_received;
                    $target->monthly_salary_amount_to_paid = abs($remaining_target) * $target->monthly_salary / $target->target_amount;
                    $previous_target->target_amount_received += $pending_target;
                    $previous_target->targetdiff = $previous_target->target_amount - $previous_target->target_amount_received;
                } else {
                    $target->previous_monthly_salary_amount_to_paid = $promoters_invoice * $previous_target->monthly_salary / $previous_target->target_amount + $previous_target->monthly_salary_amount_to_paid;
                    $target->pending_target = $remaining_target;
                    $previous_target->target_amount_received += $promoters_invoice;
                    $previous_target->targetdiff = $previous_target->target_amount - $previous_target->target_amount_received;
                }
            }
        } else {
            $target->target_amount_received = $promoters_invoice;

            if ($target->target_amount != 0) {
                $target->monthly_salary_amount_to_be_paid = $target->target_amount_received * $target->monthly_salary / $target->target_amount;
            } else {
                $target->monthly_salary_amount_to_be_paid = 0;
            }
            $target->targetdiff = $target->target_amount - $target->target_amount_received;
        }
        return view('admin.promoter.edit', compact('promoters', 'promoters_invoice', 'target'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'promoter_id' => 'required',
            'target_amount' => 'required|numeric',
            'monthly_salary' => 'required|numeric',
            'monthly_salary_amount_to_paid' => 'required|numeric',
            'pending_percent' => 'numeric',
            'targetdiff' => 'numeric',
        ]);

        $promoterId = $request->input('promoter_id');
        $targetAmount = $request->input('target_amount');
        $monthlySalary = $request->input('monthly_salary');

        $promoterSalaryTarget = PromoterSalaryTarget::updateOrCreate(
            ['promoter_id' => $promoterId],
            [
                'target_amount' => $targetAmount,
                'monthly_salary' => $monthlySalary,
            ]
        );

        return redirect()->back()->with('success', 'Promoter salary target updated or created successfully');
    }
}
