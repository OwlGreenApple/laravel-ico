<?php

namespace Icocheckr\Console\Commands;

use Illuminate\Console\Command;

use Icocheckr\Ico;
use Carbon;

class UpdateIcos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ico';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of ico';

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
     * @return mixed
     */
    public function handle()
    {
			$dt = Carbon::now();
			
      $icos = Ico::all();
			foreach($icos as $ico) {
				if (!is_null($ico->presale_start)) {
					if ( ($dt->gt(Carbon::createFromFormat('Y-m-d H:i:s', $ico->presale_start))) && ($ico->status=="upcoming") ) {
						$ico->status="ongoing";
						$ico->save();
					}
				}
				
				if (!is_null($ico->sale_start)) {
					if ( ($dt->gt(Carbon::createFromFormat('Y-m-d H:i:s', $ico->sale_start))) && ($ico->status=="upcoming") ) {
						$ico->status="ongoing";
						$ico->save();
					}
				}
				
				if (!is_null($ico->sale_end)) {
					if ( ($dt->gt(Carbon::createFromFormat('Y-m-d H:i:s', $ico->sale_end))) && ($ico->status=="ongoing") ) {
						$ico->status="ended";
						$ico->save();
					}
				}
			}
    }
}
