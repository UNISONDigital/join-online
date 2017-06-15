<?php

use Illuminate\Database\Seeder;
use App\Workplace;

class WorkplaceTableSeeder extends DatabaseSeeder
{

    public function __construct()
    {
        $this->filename = base_path() . '/database/seeder_csvs/workplaces.csv';
        $this->table = 'workplaces';
    }

    public function run()
    {
    	
        DB::disableQueryLog();
        DB::table($this->table)->truncate();

		// Seed all data from the CSV
		if(($handle = fopen($this->filename, 'r')) !== FALSE)
		{	

			while(($row = fgetcsv($handle, 1000, ',')) !== FALSE)
			{
				$to_insert = [
					'salesforce_id' => $row[0],
					'address_1' => $row[1],
					'address_2' => $row[2],
					'address_3' => $row[3],
					'postcode' => $row[4],
					'rms_id' => $row[5],
					'employer_id' => $row[6],
					'workplace_type' => $row[7],
				];

				Workplace::create($to_insert);

			}
			fclose($handle);
		}
   
   		// And then update the location column from the postcodes table
		DB::statement("
						UPDATE
							workplaces w
						SET 
							location = p.location 
						FROM 
							postcodes p 
						WHERE 
							UPPER(REPLACE(w.postcode, ' ', '')) = p.postcode
							AND w.postcode IS NOT NULL;
		");
    }
    
}
