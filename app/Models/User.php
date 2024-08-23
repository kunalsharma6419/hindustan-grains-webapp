<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'usertype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    public static function getPromoterWiseSalary()
    {
        $promotors = self::leftJoin('promoter_salary_targets', 'promoter_salary_targets.promoter_id', '=', 'users.id')
            ->where('users.usertype', 2)
            ->whereNotNull('promoter_salary_targets.promoter_id')
            ->groupBy(
                'promoter_salary_targets.promoter_id',
                'users.name',
                'users.email'
            )
            ->select(
                'promoter_salary_targets.promoter_id',
                'users.name as name',
                'users.email as email',
                \DB::raw('SUM(promoter_salary_targets.monthly_salary) as totalSalary')
            )
            ->get();
        
        foreach($promotors as $key => $promotor) {
            $promotors[$key]->totalSales = CustomerInvoice::where('promoter_id', $promotor->promoter_id)
                ->groupBy('promoter_id')
                ->sum('total_invoice_amount');
            $promotors[$key]->totalDelivery = CustomerInvoice::where('promoter_id', $promotor->promoter_id)
                ->groupBy('promoter_id')
                ->sum('delivery_charge');
        }

        return $promotors;
    }

    public static function getGrossDetails($startDate, $endDate)
    {
        $data = (object) array();
        $data->productInvoiceAmountPaid = PaymentStatus::where('payment_status', '!=', 'pending')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount_paid');
        $data->totalCustomerInvoice = ProductInvoice::whereBetween('created_at', [$startDate, $endDate])->sum('total_price');
        $data->totalPromoterSalary = PromoterSalaryTarget::whereBetween('created_at', [$startDate, $endDate])->sum('monthly_salary');
        $data->totalDeliveryCost = CustomerInvoice::whereBetween('created_at', [$startDate, $endDate])->sum('delivery_charge');
        
        $data->profitOrLoss = $data->productInvoiceAmountPaid - $data->totalCustomerInvoice - $data->totalPromoterSalary - $data->totalDeliveryCost;
        return $data;
    }
}
