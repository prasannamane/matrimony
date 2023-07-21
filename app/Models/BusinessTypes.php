<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class BusinessTypes extends Model
{
    use HasFactory;
    protected $table = 'tbl_business_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name'];

}