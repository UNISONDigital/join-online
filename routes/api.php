<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Return random number between 150-300 seven times, and return
// Will be replaced with actual figure in production
Route::get('/joiners_last_seven_days', function(Request $request) {
	
	$total = 0;

	for ($i = 0; $i < 7; $i++) {
		$total += rand(150, 300);
	}

	return response()->json([
		'success' => true, 
		'result' => $total
	])->withCallback($request->input('callback'));

});

// Validate national insurance number and check for previous membership
Route::get('/validate_ni_number/{ni_number}', function(Request $request, $ni_number) {
	
	if (preg_match('/^(?!BG)(?!GB)(?!NK)(?!KN)(?!TN)(?!NT)(?!ZZ)(?:[A-CEGHJ-PR-TW-Z][A-CEGHJ-NPR-TW-Z])(?:\s*\d\s*){6}([A-D]|\s)$/', $ni_number)) {

		// TODO: look up previous membership
		// For now, assume false
		return response()->json([
			'success' => true, 
			'result' => 'new_member'
		])->withCallback($request->input('callback'));

	} else {

		// If it doesn't match the regex, return false 
		return response()->json([
			'success' => false, 
			'result' => 'invalid_ni_number'
		])->withCallback($request->input('callback'));

	}

});

// Look up potential employers based on email domain

// Look up potential workplaces based on email domain + postcode provided

// Convert raw salary to UNISON subscription band
Route::get('/salary_to_band/{salary}', function(Request $request, $salary) {
	
	if ($salary && filter_var($salary, FILTER_VALIDATE_FLOAT)) {

		$success = true;

		switch(true) {
			
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

	} else {
		$success = false;
		$result = 'invalid_salary_provided';
	}

	return response()->json([
		'success' => $success, 
		'result' => $result
	])->withCallback($request->input('callback'));

});







