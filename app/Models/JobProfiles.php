<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class JobProfiles extends Model
{
    use HasFactory;
    protected $table = 'tbl_job_profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name'];

}
