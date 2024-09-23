<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblSubject extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_subject';
    protected $primaryKey = 'subject_id';
}
