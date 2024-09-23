<?php

namespace App\Modules\Studentaccounts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblPaymentSet extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment_set';
    protected $primaryKey = 'payment_set_id';
}
