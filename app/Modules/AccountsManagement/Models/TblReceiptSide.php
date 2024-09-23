<?php

namespace App\Modules\Accountsmanagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblReceiptSide extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_receipt_side';
    protected $primaryKey = 'receipt_side_id';
}
