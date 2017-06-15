<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Phaza\LaravelPostgis\Geometries\Point;


class Workplace extends Model
{
    use PostgisTrait;

    protected $postgisFields = [
        'location',
    ];

    public function employer() {
    	return $this->belongsTo('Employer');
    }
}
