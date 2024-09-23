<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblDesignation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_designation';
    protected $primaryKey = 'designation_id';
}
