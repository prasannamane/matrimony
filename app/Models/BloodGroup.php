<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class BloodGroup extends Model
{
    use HasFactory;
    protected $table = 'tbl_blood_group';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name'];

}
