<?php

namespace App\Modules\Student\Models;

use App\Modules\Settings\Models\TblSession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblStudentClass extends Model
{
    use HasFactory;
    protected $table = 'tbl_student_class';
    protected $primaryKey = 'student_class_id';

    public function tblSession(){
        return $this->belongsTo(TblSession::class, 'class_year');
    }
}
