<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class City extends Model
{
    use HasFactory;
    protected $table = 'tbl_cities';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name', 'state_id'];

}
