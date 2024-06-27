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
        
        $target = PromoterSalaryTarget::where('promoter_id', $promoters->id)
            ->where('month', $currentMonth)
            ->first();

        $previous_target = PromoterSalaryTarget::where('promoter_id', $promoters->id)
            ->where('month', $previous_month)
            ->first();
        
        if (!$target) {
            if(isset($previous_target) && $previous_target->targetdiff > 0){
                $pending_target = $previous_target->targetdiff;
                $previous_monthly_salary_amount_to_paid = $previous_target->monthly_salary_amount_to_paid;
            }
            
            $target = PromoterSalaryTarget::create([
                'promoter_id' => $promoters->id,
                'month' => \Carbon\Carbon::now()->format('Y-m'),
                'target_amount_received' => 0,
                'target_amount' => 50000,
                'monthly_salary' => 20000,
                'monthly_salary_amount_to_paid' => 0,
                'pending_percent' => 100,
                'targetdiff' => 50000,
                'pending_target' => $pending_target ?? 0,
                'previous_monthly_salary_amount_to_paid' => $previous_monthly_salary_amount_to_paid ?? 0
            ]);
            }
            
            return view('admin.promoter.edit', compact('promoters','target'));
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
