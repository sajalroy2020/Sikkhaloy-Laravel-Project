<?php

namespace App\Modules\Studentaccounts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblFeeCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_fee_category';
    protected $primaryKey = 'fee_category_id';
}
