<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $fillable = [
		'title', 'first_name', 'last_name', 'email', 'date_of_birth',
		'address_1', 'address_2', 'address_3', 'town', 'postcode', 'work_email',
		'salary', 'salary_frequency', 'job_title', 'employer', 'workplace', 'employer_id', 'workplace_id', 'hours_per_week',
		'payment_method', 'payroll_consent', 'direct_debit_account_name', 'direct_debit_account_number', 'direct_debit_sort_code', 'direct_debit_day_of_month',
		'communications_method', 'communications_type', 'fund', 'gender', 'disability', 'orientation', 'ethnicity'
	];

	public static function calculateCost($salary)
	{
		$result = null;

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
		return $result;
	}

	public function getCost()
	{
		if ($this->salary_frequency == 'hourly') 
		{
			$total = ($this->salary * $this->hours_per_week) * 52;
		}
		else if ($this->salary_frequency == 'weekly') 
		{
			$total = $this->salary * 52;
		}
		else if ($this->salary_frequency == 'monthly') 
		{
			$total = $this->salary * 12;
		}
		else 
		{
			$total = $this->salary;
		}
		return Application::calculateCost($total);
	}

	public function getFirstName()
	{
		if ($this->first_name)
		{
			return $this->first_name;
		}
		else
		{
			return 'Your';
		}
	}

	public function getLastName()
	{
		if ($this->last_name)
		{
			return $this->last_name;
		}
		else
		{
			return 'name..';
		}
	}

	public function sendReminderEmail()
	{
		// # TODO
	}
}
	