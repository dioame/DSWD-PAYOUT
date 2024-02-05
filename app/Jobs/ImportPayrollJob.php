<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PayrollImports;

class ImportPayrollJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $params;
    public function __construct($params)
    {
        //
        $this->params = $params;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Excel::import(new PayrollImports($this->params), $this->params['path']);
    }
}
