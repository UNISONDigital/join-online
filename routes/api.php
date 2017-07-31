<?php

use Illuminate\Http\Request;

use App\Workplace;
use App\Employer;
use App\Postcode;
use App\Http\Controllers\ApiController;

// Return random number between 150-300 seven times, and return
// Will be replaced with actual figure in production
Route::get('/joiners-last-week',  'ApiController@joinersLastWeek'); 

// Convert raw salary to UNISON subscription band
Route::get('/salary-to-band/{salary}', 'ApiController@salaryToBand'); 

// Look up potential employers based on name or email domain
Route::get('/employers/search', 'ApiController@searchEmployers');

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

// Look up potential workplaces based on email domain + postcode provided
Route::get('/workplaces/{employer_id}', 'ApiController@getWorkplaces');
