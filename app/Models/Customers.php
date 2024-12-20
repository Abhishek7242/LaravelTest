<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='customers';
    protected $primaryKey ='id';
    public function setNameAttribute($value)  {
        
$this->attributes['name']=ucwords($value);
    }
    public function getDobAttribute($value)  {

        $formatedDate = date('d-M-Y', strtotime($value));
        return $formatedDate;    }
}
