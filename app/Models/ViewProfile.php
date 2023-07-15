<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ViewProfile extends Model
{
    use HasFactory;
    protected $table = 'view_profile';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'register_id', 'profile_id'];

}
