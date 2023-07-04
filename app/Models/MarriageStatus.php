<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class MarriageStatus extends Model
{
    use HasFactory;
    protected $table = 'tbl_marriage_status';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name'];

}
