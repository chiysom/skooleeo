<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'body', 'phone'];
}
