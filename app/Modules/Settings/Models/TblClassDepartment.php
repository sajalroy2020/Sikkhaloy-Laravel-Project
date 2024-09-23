<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblClassDepartment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_class_department';
    protected $primaryKey = 'class_department_id';
}
