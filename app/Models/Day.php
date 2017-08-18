<?php
/**
 * Created by PhpStorm.
 * User: Yerman
 * Date: 18.08.2017
 * Time: 13:14
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'day';

    protected $fillable = [
        'value'
    ];
}