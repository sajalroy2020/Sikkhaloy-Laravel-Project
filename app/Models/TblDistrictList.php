<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblDistrictList extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_district_list';
    protected $primaryKey = 'district_list_id';
}
