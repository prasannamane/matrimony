<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cast extends Model
{
    use HasFactory;
    protected $table = 'tbl_cast';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name', 'description'];

}
