<?php

use Illuminate\Database\Seeder;

use App\Postcode;

class PostcodeTableSeeder extends DatabaseSeeder
{
    public function __construct()
    {
        $this->filename = base_path() . '/database/seeder_csvs/postcodes.csv';
        $this->table = 'postcodes';
    }

    public function run()
    {

        DB::disableQueryLog();
        ini_set('memory_limit', '2G');

        DB::table($this->table)->truncate();

		if(($handle = fopen($this->filename, 'r')) !== FALSE)
		{	

			while(($row = fgetcsv($handle, 1000, ',')) !== FALSE)
			{

				$to_insert = array(
					'postcode' => str_replace(' ', '', $row[0]),
					'easting' => intval($row[1]),
					'northing' => intval($row[2]),
				);

				Postcode::create($to_insert);

			}
			fclose($handle);

			DB::statement('UPDATE postcodes SET location = ST_Transform(ST_SetSRID(ST_MakePoint(easting, northing), 27700), 4326)');

		}
    }

}