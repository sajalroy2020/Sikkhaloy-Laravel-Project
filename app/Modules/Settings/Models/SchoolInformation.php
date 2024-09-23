<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolInformation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_school_information';
    protected $primaryKey = 'school_information_id';
}
