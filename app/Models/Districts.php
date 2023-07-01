<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Districts extends Model
{
    use HasFactory;
    protected $table = 'tbl_districts';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name', 'state_id'];

}
