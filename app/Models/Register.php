<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [ 'first_name', 'last_name', 'mobile', 'password'];

    public function parent()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id');
    }
}