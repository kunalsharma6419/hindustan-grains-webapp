<?php

namespace App\Console\Commands;

use App\Models\CustomerInvoice;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UpdateOverdueInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices:update-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update overdue invoice statuses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $overdueInvoices = CustomerInvoice::where('status', 'inprogress')
            ->where('supply_date', '<', Carbon::now())
            ->get();
        
        foreach ($overdueInvoices as $invoice) {
            $invoice->status = 'overdue';
            $invoice->save();
        }
        
        $this->info('Overdue invoices have been updated successfully.');
    }
}
