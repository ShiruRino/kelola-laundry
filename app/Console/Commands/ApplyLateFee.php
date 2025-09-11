<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ApplyLateFee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:apply-late-fee';
    protected $description = 'Add late fee for overdue laundry pickups';

    public function handle()
    {
        $transactions = \App\Models\Transaction::where('status', 'done')
            ->where('picked_up', false)
            ->whereDate('done_at', '<=', now()->subDays(2))
            ->get();

        foreach ($transactions as $t) {
            if (!$t->late_fee) {
                $fee = 5000;
                $t->late_fee = $fee;
                $t->total_price += $fee;
                $t->save();
                $this->info("Applied late fee to transaction ID {$t->id}");
            }
        }
    }

}
