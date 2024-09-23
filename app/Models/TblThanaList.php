<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblThanaList extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_thana_list';
    protected $primaryKey = 'thana_list_id';
}
