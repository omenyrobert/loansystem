<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PaymentsController;

class MissedPaymentRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record:missed-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto recording Missed Payments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Recording Missed Payment...');
        $controller = app(PaymentsController::class);
        $controller->auto_missed_payments_record();
        $this->info('All Missed Payments Recorded');
    }
}
