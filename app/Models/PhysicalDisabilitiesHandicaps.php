<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class PhysicalDisabilitiesHandicaps extends Model
{
    use HasFactory;
    protected $table = 'tbl_physical_disabilities_handicaps';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name'];

}
