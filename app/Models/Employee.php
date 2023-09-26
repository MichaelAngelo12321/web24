<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'company_id',
        'surName',
        'email',
        'phone_number'
    ];


    public function company(){
       return $this->belongsTo('App\Models\Company','company_id');
    }
}
