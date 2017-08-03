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
	