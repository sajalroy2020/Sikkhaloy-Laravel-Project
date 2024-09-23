<?php

namespace App\Modules\Studentaccounts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDailyTransaction extends Model
{
    use HasFactory;
    protected $table = 'tbl_daily_transaction';
    protected $primaryKey = 'daily_transaction_id';
}
