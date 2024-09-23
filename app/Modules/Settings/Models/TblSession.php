<?php

namespace App\Modules\Settings\Models;

use App\Modules\Student\Models\TblStudentClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TblSession extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_session';
    protected $primaryKey = 'session_id';

    public function tblStudentClass(){
        return $this->hasMany(TblStudentClass::class, 'session_id');
    }
}
