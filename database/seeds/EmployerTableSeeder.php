<?php

use Illuminate\Database\Seeder;
use App\Employer;

class EmployerTableSeeder extends DatabaseSeeder
{

    public function __construct()
    {
        $this->filename = base_path() . '/database/seeder_csvs/employers.csv';
        $this->table = 'employers';
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
				$to_insert = array(
					'name' => $row[0],
					'address_1' => $row[1],
					'address_2' => $row[2],
					'address_3' => $row[3],
					'postcode' => $row[4],
					'service_group' => $row[5],
					'rms_id' => $row[6],
					'salesforce_id' => $row[7],
				);

				Employer::create($to_insert);

			}
			fclose($handle);

		}

	}
   
}
