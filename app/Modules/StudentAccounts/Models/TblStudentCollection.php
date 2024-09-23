<?php

namespace App\Modules\Studentaccounts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblStudentCollection extends Model
{
    use HasFactory;
    protected $table = 'tbl_student_collection';
    protected $primaryKey = 'collection_id';
}
