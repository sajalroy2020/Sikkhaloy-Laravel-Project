<?php

namespace App\Modules\Student\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\TblDepartment;
use App\Modules\Settings\Models\TblSession;
use App\Modules\Student\Models\TblStudent;
use App\Modules\Student\Models\TblStudentClass;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentReportController extends Controller
{
    use ResponseTrait;
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    //class part start
    public function summary()
    {
        $data['pageTitle'] = "Student Summary Report";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentReportClass'] = "menu-active";
        $data['allSession'] = TblSession::get();
        return view("Student::student-report.summary", $data);
    }

    public function summaryList(Request $request)
    {
        $request->validate([
            'session' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data['session'] = TblSession::find($request->session);
            $data['summaryList'] = TblStudentClass::where('class_year', $request->session)->get();
        DB::commit();
        return view("Student::student-report.summary-list", $data);

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }


    public function details()
    {
        $data['pageTitle'] = "Student Summary Details";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentReportClass'] = "menu-active";

        $data['allSession'] = TblSession::get();
        $data['allDepartment'] = TblDepartment::where('status', STATUS_ACTIVE)->get();

        return view("Student::student-report.details", $data);
    }

    public function detailsList(Request $request)
    {

        $request->validate([
            'session' => 'required',
        ]);

        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentReportClass'] = "menu-active";
        $data['pageTitle'] = "Student Summary Details";
        $data['allSession'] = TblSession::get();
        $data['allDepartment'] = TblDepartment::where('status', STATUS_ACTIVE)->get();

        $data['checkData'] = [
            'check_class' => $request->has('check_class') ? 1 : 0,
            'check_department' => $request->has('check_department') ? 1 : 0,
            'check_shift' => $request->has('check_shift') ? 1 : 0,
            'check_studentID' => $request->has('check_studentID') ? 1 : 0,
            'check_roll' => $request->has('check_roll') ? 1 : 0,
            'check_previous_roll' => $request->has('check_previous_roll') ? 1 : 0,
            'check_name' => $request->has('check_name') ? 1 : 0,
            'check_name_bn' => $request->has('check_name_bn') ? 1 : 0,
            'check_father_name' => $request->has('check_father_name') ? 1 : 0,
            'check_father_name_bn' => $request->has('check_father_name_bn') ? 1 : 0,
            'check_father_occupation' => $request->has('check_father_occupation') ? 1 : 0,
            'check_father_phone' => $request->has('check_father_phone') ? 1 : 0,
            'check_fatherNID' => $request->has('check_fatherNID') ? 1 : 0,
            'check_mother_name' => $request->has('check_mother_name') ? 1 : 0,
            'check_mother_name_bn' => $request->has('check_mother_name_bn') ? 1 : 0,
            'check_mother_occupation' => $request->has('check_mother_occupation') ? 1 : 0,
            'check_mother_phone' => $request->has('check_mother_phone') ? 1 : 0,
            'check_motherNID' => $request->has('check_motherNID') ? 1 : 0,
            'check_SMS_alert_phone' => $request->has('check_SMS_alert_phone') ? 1 : 0,
            'check_date_of_birth' => $request->has('check_date_of_birth') ? 1 : 0,
            'check_gender' => $request->has('check_gender') ? 1 : 0,
            'check_blood_group' => $request->has('check_blood_group') ? 1 : 0,
            'check_religion' => $request->has('check_religion') ? 1 : 0,
            'check_NID_Birth_certificate' => $request->has('check_NID_Birth_certificate') ? 1 : 0,
            'check_category' => $request->has('check_category') ? 1 : 0,
            'check_merit_position' => $request->has('check_merit_position') ? 1 : 0,
            'check_image' => $request->has('check_image') ? 1 : 0,
            'check_print' => $request->has('check_print') ? 1 : 0,
        ];

        DB::beginTransaction();
        try {
            $data['session'] = TblSession::find($request->session);

            $data['detailsList'] = TblStudent::select('tbl_student.*', 'tbl_student.student_id as studentID', 'tbl_student_class.*', 'tbl_departments.department')
                ->leftJoin('tbl_student_class', 'tbl_student.id', '=', 'tbl_student_class.student_id')
                ->leftJoin('tbl_departments', 'tbl_departments.department_id', '=', 'tbl_student_class.department_id')
                ->where('tbl_student_class.class_year', $request->session)
                ->when($request->class != null, function($query) use ($request) {
                    return $query->where('tbl_student_class.class_id', $request->class);
                })
                ->when($request->department != null, function($query) use ($request) {
                    return $query->where('tbl_student_class.department_id', $request->department);
                })
                ->when($request->group != null, function($query) use ($request) {
                    return $query->where('tbl_student.shift', $request->group);
                })
                ->get();

        DB::commit();
        return view("Student::student-report.details", $data);

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }

    public function studentList()
    {
        $data['pageTitle'] = "Student List";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentReportClass'] = "menu-active";
        return view("Student::student-report.student-list", $data);
    }

    public function studentProfile(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $data['student'] = TblStudent::select('tbl_student.*', 'tbl_student.student_id as studentID', 'tbl_student_class.*', 'tbl_departments.department')
                    ->leftJoin('tbl_student_class', 'tbl_student.id', '=', 'tbl_student_class.student_id')
                    ->leftJoin('tbl_departments', 'tbl_departments.department_id', '=', 'tbl_student_class.department_id')
                    ->where('tbl_student.student_id', $request->student_id)
                    ->first();

            $data['pageTitle'] = "Student Profile";
            $data['activeStudent'] = "sub-group-active";
            $data['activeStudentReportClass'] = "menu-active";

        DB::commit();
            if ($data['student'] != null) {
                return view("Student::student-report.student-profile", $data);
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }

}
