<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Application;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
	public function __construct()
	{
	}

	public function beginApplication(Request $request)
	{
		$token = $request->input('token');

		$application = new Application();
		$application->first_name = $request->input('first_name');
		$application->email = $request->input('email');
		$application->token = $token;
		$application->save();

		return redirect("/join-step-one/{$token}");
	}

	public function stepOne(Request $request, $token)
	{
		$application = Application::where('token', '=', $token)->first();

		if ($application)
		{
			$date_parts = date_parse($application->date_of_birth);
	
	  	return view('join-step-one', [
				'application' => $application,
				'date_of_birth_year' => $date_parts['year'],
				'date_of_birth_month' => $date_parts['month'],
				'date_of_birth_day' => $date_parts['day']
			]);
	  }
	  else
	  {
	  	return redirect("/");
	  }
	}

	public function saveStepOne(Request $request, $token)
	{
		$this->validate($request, [
			'title' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'date_of_birth_day' => 'required',
			'date_of_birth_month' => 'required',
			'date_of_birth_year' => 'required'
		]);

    // generate d.o.b
    $date_of_birth = $request->input('date_of_birth_year') .
    	'-' .
    	$request->input('date_of_birth_month') .
    	'-' .
    	$request->input('date_of_birth_day');

		$application = Application::where('token', '=', $token)->first();
		$application->fill([
			'title' => $request->input('title'),
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'date_of_birth' => $date_of_birth
		]);
		$application->save();

	  return redirect("/join-step-two/{$token}");
	}

	public function stepTwo(Request $request, $token)
	{
		$application = Application::where('token', '=', $token)->first();

		if ($application)
		{
	  	return view('join-step-two', ['application' => $application]);
	  }
	  else
	  {
	  	return redirect("/");
	  }
	}

	public function saveStepTwo(Request $request, $token)
	{
		$this->validate($request, [
			'address_1' => 'required',
			'town' => 'required',
			'postcode' => 'required',
			'email' => 'required'
		]);

		$application = Application::where('token', '=', $token)->first();
		$application->fill([
			'address_1' => $request->input('address_1'),
			'address_2' => $request->input('address_2'),
			'address_3' => $request->input('address_3'),
			'town' => $request->input('town'),
			'postcode' => $request->input('postcode'),
			'email' => $request->input('email'),
			'work_email' => $request->input('work_email')
		]);
		$application->save();

	  return redirect("/join-step-three/{$token}");
	}

	public function stepThree(Request $request, $token)
	{
		$application = Application::where('token', '=', $token)->first();

		if ($application)
		{
	  	return view('join-step-three', ['application' => $application]);
	  }
	  else
	  {
	  	return redirect("/");
	  }
	}

	public function saveStepThree(Request $request, $token)
	{
		$this->validate($request, [
			'salary' => 'required',
			'salary_frequency' => 'required',
			'job_title' => 'required'
		]);

		$application = Application::where('token', '=', $token)->first();
		$application->fill([
			'salary' => $request->input('salary'),
			'salary_frequency' => $request->input('salary_frequency'),
			'job_title' => $request->input('job_title'),
			'hours_per_week' => $request->input('hours_per_week')
		]);
		$application->save();

		// manual or automatic entry?
		if ($request->input('employer_id')) 
		{
			$application->fill([
			  'employer_id' => $request->input('employer_id'),
			  'workplace_id' => $request->input('workplace_id')
			]);
		}
		else
		{
			$application->fill([
			  'employer' => $request->input('employer'),
			  'workplace' => $request->input('workplace')
			]);
		}

		$application->save();

	  return redirect("/join-step-four/{$token}");
	}

	public function stepFour(Request $request, $token)
	{
		$application = Application::where('token', '=', $token)->first();

		if ($application)
		{
			$cost = $application->getCost();
			
	  	return view('join-step-four', [
				'application' => $application, 
				'cost' => $cost['rate']
			]);
	  }
	  else
	  {
	  	return redirect("/");
	  }
	}

	public function saveStepFour(Request $request, $token)
	{
		$this->validate($request, [
			'payment_method' => 'required'
		]);

		$application = Application::where('token', '=', $token)->first();
		$application->fill([
			'payment_method' => $request->input('payment_method'),
			'payroll_consent' => $request->input('payroll_consent'),
			'direct_debit_account_name' => $request->input('direct_debit_account_name'),
			'direct_debit_account_number' => $request->input('direct_debit_account_number'),
			'direct_debit_sort_code' => $request->input('direct_debit_sort_code')
		]);
		$application->save();

	  return redirect("/join-step-five/{$token}");
	}

	public function stepFive(Request $request, $token)
	{
		$application = Application::where('token', '=', $token)->first();

		if ($application)
		{
	  	return view('join-step-five', ['application' => $application]);
	  }
	}

	public function saveStepFive(Request $request, $token)
	{
		$this->validate($request, [
			'communications_method' => 'required',
			'communications_type' => 'required',
			'fund' => 'required',
			'gender' => 'required',
			'disability' => 'required',
			'orientation' => 'required',
			'ethnicity' => 'required'
		]);

		$application = Application::where('token', '=', $token)->first();
		$application->fill([
			'communications_method' => $request->input('communications_method'),
			'communications_type' => $request->input('communications_type'),
			'fund' => $request->input('fund'),
			'gender' => $request->input('gender'),
			'disability' => $request->input('disability'),
			'orientation' => $request->input('orientation'),
			'ethnicity' => $request->input('ethnicity')
		]);
		$application->save();

	  return redirect("/join-step-five/{$token}");
	}
}
