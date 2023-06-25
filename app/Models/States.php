<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class States extends Model
{
    use HasFactory;
    protected $table = 'tbl_states';
    protected $primaryKey = 'id';
    //public $timestamps = true;
    protected $fillable = [ 'name', 'country_id'];
}
