<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Religion extends Model
{
    use HasFactory;
    protected $table = 'tbl_religion';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'name', 'description'];

    public function register()
    {
        return $this->hasMany(Register::class, 'religion_id', 'id');
    }
}
