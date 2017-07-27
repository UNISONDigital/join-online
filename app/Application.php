<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $fillable = [
		'title', 'first_name', 'last_name', 'email', 'date_of_birth',
		'address_1', 'address_2', 'address_3', 'town', 'postcode', 'work_email'
	];

	public function sendReminderEmail()
	{
		// # TODO
	}
}
