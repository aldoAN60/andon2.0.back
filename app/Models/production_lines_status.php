<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class production_lines_status extends Model
{
    protected $table = 'production_lines_status';
    public $timestamps = false;
    use HasFactory;
}
