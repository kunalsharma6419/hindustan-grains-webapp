<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductInvoice;
use App\Models\PromoterSalaryTarget;
use Auth;
class PromoterTargetController extends Controller
{
    public function index()
    {
        $promoters = User::where('id', '!=', Auth::id())->latest()->get();
        return view('admin.promoter.index', compact('promoters'));
    }

    public function edit($id)
    {
        $promoters=User::find($id);
        $promoters_invoice=ProductInvoice::where('promoter_id',$promoters->id)->sum('total_price');
        $target=PromoterSalaryTarget::where('promoter_id',$promoters->id)->first();
        return view('admin.promoter.edit',compact('promoters','promoters_invoice','target'));
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
    $targetAmountReceived = $request->input('target_amount_received');
    $targetAmount = $request->input('target_amount');
    $monthlySalary = $request->input('monthly_salary');
    $monthlySalaryAmountToPaid = $request->input('monthly_salary_amount_to_paid');
    $pendingPercent = $request->input('pending_percent');
    $targetDiff = $request->input('targetdiff');

    $promoterSalaryTarget = PromoterSalaryTarget::updateOrCreate(
        ['promoter_id' => $promoterId],
        [
            'target_amount_received' => $targetAmountReceived,
            'target_amount' => $targetAmount,
            'monthly_salary' => $monthlySalary,
            'monthly_salary_amount_to_paid' => $monthlySalaryAmountToPaid,
            'pending_percent' => $pendingPercent,
            'targetdiff' => $targetDiff
        ]
    );

        return redirect()->back()->with('success', 'Promoter salary target updated or created successfully');
    }
}
