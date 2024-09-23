<?php

namespace App\Modules\Student\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblStudent extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_student';
}
