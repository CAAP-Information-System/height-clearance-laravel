<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Aerodrome;
use App\Models\Airtraffic;

class TransferAerodromesToAirtraffics extends Command
{
    protected $signature = 'transfer:aerodromes-to-airtraffics';

    protected $description = 'Transfer data from aerodromes table to airtraffics table';

    public function handle()
    {
        // Retrieve all aerodromes
        $aerodromes = Aerodrome::all();

        // Iterate over each aerodrome
        foreach ($aerodromes as $aerodrome) {
            // Create a new Airtraffic instance
            $airtraffic = new Airtraffic();

            // Assign values from aerodrome to airtraffic
            $airtraffic->user_id = $aerodrome->user_id;
            $airtraffic->application_id = $aerodrome->application_id;
            $airtraffic->evaluation_status = $aerodrome->evaluation_status;
            $airtraffic->doc_compliance_result = $aerodrome->doc_compliance_result;
            // Assign other fields similarly...

            // Save the airtraffic record
            $airtraffic->save();
        }

        $this->info('Data transfer completed successfully!');
    }
}
