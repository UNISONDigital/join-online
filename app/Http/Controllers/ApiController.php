<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Workplace;
use App\Employer;
use App\Postcode;

use Illuminate\Http\Request;

class ApiController extends Controller
{
	public function __construct()
	{
	}

	public function joinersLastWeek(Request $request)
	{		
		$total = 0;

		for ($i = 0; $i < 7; $i++) {
			$total += rand(150, 300);
		}

		return response()->json([
			'success' => true, 
			'result' => $total
		])->withCallback($request->input('callback'));
	}

	// Convert raw salary to UNISON subscription band
	public function salaryToBand(Request $request, $salary) 
	{
		if ($salary && filter_var($salary, FILTER_VALIDATE_FLOAT)) 
		{
			$success = true;

			switch(true) 
			{
				case $salary <= 2000:
					$result = ['band' => 'A', 'rate' => '£1.30'];
					break;

				case $salary <= 5000:
					$result = ['band' => 'B', 'rate' => '£3.50'];
					break;

				case $salary <= 8000:
					$result = ['band' => 'C', 'rate' => '£5.30'];
					break;

				case $salary <= 11000:
					$result = ['band' => 'D', 'rate' => '£6.60'];
					break;

				case $salary <= 14000:
					$result = ['band' => 'E', 'rate' => '£7.85'];
					break;

				case $salary <= 17000:
					$result = ['band' => 'F', 'rate' => '£9.70'];
					break;

				case $salary <= 20000:
					$result = ['band' => 'G', 'rate' => '£11.50'];
					break;

				case $salary <= 25000:
					$result = ['band' => 'H', 'rate' => '£14.00'];
					break;

				case $salary <= 30000:
					$result = ['band' => 'I', 'rate' => '£17.25'];
					break;

				case $salary <= 35000:
					$result = ['band' => 'J', 'rate' => '£20.30'];
					break;

				default:
					$result = ['band' => 'K', 'rate' => '£22.50'];
					break;
			}
		} 
		else 
		{
			$success = false;
			$result = 'invalid_salary_provided';
		}

		return response()->json([
			'success' => $success, 
			'result' => $result
		])->withCallback($request->input('callback'));
	}

	public function searchEmployers(Request $request)
	{	
		$search_type = $request->input('type', 'name');
		$q = $request->input('q');

		if ($search_type == 'name') 
		{
			$result = Employer::where('name', 'ILIKE', "%$q%")->
				select('name', 'service_group', 'rms_id', 'id')->
				take(10)->
				get()->
				toArray();
			if (count($result) > 0) 
			{
				$success = true;
			} 
			else 
			{
				$success = false;
				$result = 'no_matching_employers';
			}
		} 
		elseif ($search_type == 'email') 
		{
			// TODO: implement
			$success = false;
			$result = 'not_yet_implemented';
		} else 
		{
			$success = false;
			$result = 'invalid_search_type';
		}

		return response()->json([
			'success' => $success, 
			'result' => $result
		])->withCallback($request->input('callback'));
	}

	public function getWorkplaces(Request $request, $employer_id)
	{
		$raw_postcode = $request->input('postcode');

		$query = Workplace::where('employer_id', '=', $employer_id)->
			select('id', 'address_1', 'address_2', 'address_3', 'postcode', 'workplace_type');

		if ($raw_postcode) 
		{
			// Normalise our postcode before searching
			$postcode = strtoupper(str_replace(' ', '', $raw_postcode));

			// Check if we have it, and try to get its location
			$postcode = Postcode::where('postcode', '=', $postcode)->
				selectRaw('ST_AsEWKT(location) AS wkt_location')->
				first();

			if ($postcode) 
			{
				// If we've got a valid postcode, then add a distance ordering onto the query
				$query = $query->selectRaw('ST_Distance(location, ST_GeomFromEWKT(?)) AS distance', [$postcode->wkt_location])->
					orderBy('distance', 'asc');				
			} else 
			{
				// Return failure if the postcode is invalid
				return response()->json([
					'success' => false, 
					'result' => 'invalid_postcode_provided',
				])->withCallback($request->input('callback'));
			}
		}

		$result = $query->get()->
			transform(function($item, $key) 
			{
	  		if ($item->distance)
	  		{
	  			$item->distance = round($item->distance / 1609.344, 1); // Divide by 1609.344 to convert metres to miles
	  		} 
	  		else {
	  			$item->distance = null;
	  		}
	  		return $item;
		  })->toArray();

		if (count($result) > 0) 
		{
			$success = true;
		} 
		else
		{
			$success = false;
		}

		return response()->json([
			'success' => $success, 
			'result' => $result
		])->withCallback($request->input('callback'));
	}
}
