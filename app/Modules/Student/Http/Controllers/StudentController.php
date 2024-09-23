<?php

namespace App\Modules\Student\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TblDistrictList;
use App\Models\TblThanaList;
use App\Modules\Settings\Models\SchoolInformation;
use App\Modules\Settings\Models\TblClass;
use App\Modules\Settings\Models\TblDepartment;
use App\Modules\Settings\Models\TblSession;
use App\Modules\Student\Models\TblStudent;
use App\Modules\Student\Models\TblStudentClass;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;

class StudentController extends Controller
{
    use ResponseTrait;

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    //class part start
    public function studentList(Request $request)
    {
        if ($request->ajax()) {
            $data = TblStudent::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
//                ->editColumn('is_optional', function ($data) {
//                    if ($data->is_optional == 1){
//                        return "<p>Yes</p>";
//                    }else{
//                        return "<p>No</p>";
//                    }
//                })
//                ->editColumn('result_type', function ($data) {
//                    if ($data->result_type == 1){
//                        return "<p>GPA</p>";
//                    }else{
//                        return "<p>CGPA</p>";
//                    }
//                })
//                ->editColumn('passing_type', function ($data) {
//                    if ($data->passing_type == 1){
//                        return "<p>Total Marks</p>";
//                    }elseif($data->passing_type == 2){
//                        return "<p>Individual Marks</p>";
//                    }elseif($data->passing_type == 3){
//                        return "<p>Total Marks with CA</p>";
//                    }elseif($data->passing_type == 4){
//                        return "<p>Individual Marks with CA</p>";
//                    }elseif($data->passing_type == 5){
//                        return "<p>Individual Marks with 2 Subject Average</p>";
//                    }elseif($data->passing_type == 6){
//                        return "<p>Individual Marks with 2 Subject Average- CA</p>";
//                    }else{
//                        return "<p>-</p>";
//                    }
//                })
//                ->editColumn('marksheet_type', function ($data) {
//                    if ($data->marksheet_type == 1){
//                        return "<p>Number & GPA</p>";
//                    }elseif($data->marksheet_type == 2){
//                        return "<p>Only GPA</p>";
//                    }elseif($data->marksheet_type == 5){
//                        return "<p>Individual Subject Pass Average</p>";
//                    }else{
//                        return "<p>-</p>";
//                    }
//                })
//                ->editColumn('class_type', function ($data) {
//                    if ($data->class_type == 1){
//                        return "<p>Junior</p>";
//                    }elseif($data->class_type == 2){
//                        return "<p>Secondary</p>";
//                    }elseif($data->class_type == 3){
//                        return "<p>Higher Secondary</p>";
//                    }elseif($data->class_type == 4){
//                        return "<p>Honors</p>";
//                    }elseif($data->class_type == 5){
//                        return "<p>Degree</p>";
//                    }elseif($data->class_type == 6){
//                        return "<p>Masters</p>";
//                    }else{
//                        return "<p>-</p>";
//                    }
//                })
//                ->editColumn('is_group', function ($data) {
//                    if ($data->is_group == 1){
//                        return "<p>Yes</p>";
//                    }else{
//                        return "<p>No</p>";
//                    }
//                })
//                ->editColumn('is_used', function ($data) {
//                    if ($data->is_used == 1){
//                        return "<p>Yes</p>";
//                    }else{
//                        return "<p>No</p>";
//                    }
//                })

                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <a href="'.route('student.edit',encrypt($data->id)).'" class="dropdown-item"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</a>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('student.delete', encrypt($data->id)) . '\', \'stdListTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                    <a class="dropdown-item" href="'.route('student.view',encrypt($data->id)).'"><i class="fas fa-times text-orange-red"></i>Print</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        $data['pageTitle'] = "Student List";
        $data['pageTitle'] = "Enrollment Form";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentClass'] = "menu-active";
//        return view("Student::student.list", $data);
        return view("Student::student.list", $data);
    }

    public function studentAdd()
    {
        $data['pageTitle'] = "Student Add";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentClass'] = "menu-active";
        $data['instituteData'] = SchoolInformation::where('school_id', auth()->user()->school_id)->first();
//        $data['thanaList'] = TblDistrictList::where(['school_id'=> auth()->user()->school_id])->get();
        $data['districtList'] = TblDistrictList::all();
        $data['department'] = TblDepartment::where('school_id', auth()->user()->school_id)->get();
        $data['session'] = TblSession::where('school_id', auth()->user()->school_id)->get();
        $data['class'] = TblClass::where('school_id', auth()->user()->school_id)->get();
        return view("Student::student.add", $data);
    }

    public function studentStore(Request $request)
    {
//        dd($request->all());

        $id = $request->id ? decrypt($request->id) : $request->id;
        $request->validate([
            'class' => 'required|numeric',
            'department' => 'required|numeric',
            'group' => 'required_if:class_group,==,1',
            'class_year' => 'required',
            'roll_no' => 'required|numeric',
            'student_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'sms_alert_phone' => ['required', 'regex:/^(?:(?:\+|00)88|01)?\d{11}\r?$/'],
            'guardian_name' => 'required',
            'student_relation' => 'required',
            'permanent_address' => 'required',
            'present_address' => 'required',
        ]);


        DB::beginTransaction();
        try {
            if ($request->id) {
                $dataObj = TblStudent::where('id', decrypt($request->id))->first();
                $msg = __(UPDATED_SUCCESSFULLY);
            } else {
                $dataObj = new TblStudent();
                $msg = __(CREATED_SUCCESSFULLY);
            }

            $dataObj->student_id = rand(0000, 9999);
//            $dataObj->p_student_id = $request->class_name;
            $dataObj->school_id = auth()->user()->school_id;
            $dataObj->date_of_admission = $request->date_of_admission;
//            $dataObj->admission_no = $request->class_name;
            $dataObj->school_name = $request->school_name;
            $dataObj->student_name = $request->student_name;
//            $dataObj->student_name_bangla = $request->class_name;
//            $dataObj->student_name_english = $request->class_name;
//            $dataObj->nick_name = $request->class_name;
            $dataObj->gender = $request->gender;
            $dataObj->birth_date = $request->birth_date;
            $dataObj->religion = $request->religion;
            $dataObj->category_id = $request->category_id;
            $dataObj->shift = $request->shift;
            $dataObj->tribal = $request->tribal;
            $dataObj->nationality = $request->nationality;
            $dataObj->national_id = $request->national_id;
            $dataObj->father_name = $request->father_name;
//            $dataObj->father_name_bangla = $request->class_name;
//            $dataObj->father_name_english = $request->class_name;
            $dataObj->father_occupation = $request->father_occupation;
            $dataObj->father_phone = $request->father_phone;
            $dataObj->father_nid = $request->father_nid;
            $dataObj->mother_name = $request->mother_name;
//            $dataObj->mother_name_bangla = $request->class_name;
//            $dataObj->mother_name_english = $request->class_name;
            $dataObj->mother_occupation = $request->mother_occupation;
            $dataObj->mother_phone = $request->mother_phone;
            $dataObj->mother_nid = $request->mother_nid;
//            $dataObj->student_phone = $request->class_name;
            $dataObj->sms_alert_phone = $request->sms_alert_phone;
            $dataObj->guardian_name = $request->guardian_name;
//            $dataObj->guardian_phone = $request->class_name;
            $dataObj->student_relation = $request->student_relation;
//            $dataObj->guardian_nid = $request->class_name;
            $dataObj->guardian_profession = $request->guardian_profession;
            $dataObj->yearly_income = $request->yearly_income;
            $dataObj->guardian_address = $request->guardian_address;
            $dataObj->guardian_po = $request->guardian_po;
            $dataObj->guardian_district_list_id = $request->guardian_district_list_id;
            $dataObj->guardian_thana_list_id = $request->guardian_thana_list_id ?? 1;
            $dataObj->permanent_address = $request->permanent_address;
            $dataObj->permanent_po = $request->permanent_po;
            $dataObj->permanent_district_list_id = $request->permanent_district_list_id;
//            $dataObj->permanent_district = $request->permanent_thana_list_id;
            $dataObj->permanent_thana_list_id = $request->permanent_thana_list_id ?? 1;
//            $dataObj->permanent_thana = $request->class_name;
            $dataObj->present_address = $request->present_address;
            $dataObj->present_po = $request->present_po;
            $dataObj->present_district_list_id = $request->present_district_list_id;
//            $dataObj->present_district = $request->class_name;
            $dataObj->present_thana_list_id = $request->present_thana_list_id ?? 1;
//            $dataObj->present_thana = $request->class_name;
            $dataObj->is_scholarship = $request->is_scholarship;
            $dataObj->is_tc = $request->is_tc;
            if ($request->is_tc == 1) {
                $dataObj->tc_institute_name = $request->tc_institute_name;
                $dataObj->tc_issue_date = $request->tc_issue_date;
                $dataObj->tc_memo_no = $request->tc_memo_no;
            }
            $dataObj->is_autistic = $request->is_autistic;
            if ($request->is_autistic == 1) {
                $dataObj->autistic_type = $request->autistic_type;
            }

            $dataObj->blood_group = $request->blood_group;
            $dataObj->email = $request->email;
            $dataObj->payable_amount = $request->payable_amount;
            $dataObj->punch_id = $request->punch_id;

            if ($request->hasfile('student_image')) {
                $file = $request->file('student_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'student_image' . time() . '.' . $extenstion;
                $file->move('admin/img/uploads/student/', $filename);
                $dataObj->image = 'admin/img/uploads/student/' . $filename;
            }
//
//            $dataObj->family_member = $request->class_name;
//            $dataObj->family_member_earning = $request->class_name;
//            $dataObj->total_land = $request->class_name;
//            $dataObj->marital_status = $request->class_name;
//            $dataObj->student_mobile = $request->class_name;
//            $dataObj->ssc_roll = $request->class_name;
//            $dataObj->ssc_registration_no = $request->class_name;
//            $dataObj->ssc_gpa = $request->class_name;
//            $dataObj->ssc_district = $request->class_name;
//            $dataObj->ssc_school = $request->class_name;
//            $dataObj->ssc_board = $request->class_name;
//            $dataObj->ssc_passing_year = $request->class_name;
//            $dataObj->ssc_center_name = $request->class_name;
//            $dataObj->merit_position = $request->class_name;
            $dataObj->save();

            //save std class data now
            if ($request->id) {
                $stdClassObj = TblStudentClass::where('student_id', decrypt($request->id))->first();
            }else{
                $stdClassObj = new TblStudentClass();
            }
            $stdClassObj->school_id = auth()->user()->school_id;
            $stdClassObj->class_id = $request->class;
            $stdClassObj->department_id = $request->department;
            $stdClassObj->group_id = $request->group??0;
            $stdClassObj->class_year = $request->class_year;
            $stdClassObj->student_id = $dataObj->id;
            $stdClassObj->roll_no = $request->roll_no;
//            $stdClassObj->b_roll = $request->class_name;
//            $stdClassObj->registration_no = $request->class_name;
//            $stdClassObj->is_promoted = $request->class_name;
            $stdClassObj->shift = $request->shift;
            $stdClassObj->category_id = $request->category_id;
            $stdClassObj->status = 1;
            $stdClassObj->save();

            DB::commit();

            return $this->success([], $msg);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function studentEdit($id)
    {
        try {
            $data['pageTitle'] = "Edit Student";
            $data['activeStudent'] = "sub-group-active";
            $data['activeStudentClass'] = "menu-active";
            $data['student'] = TblStudent::where('id', decrypt($id))->first();
            $data['student_class'] = TblStudentClass::where('student_id', decrypt($id))->first();
            $data['instituteData'] = SchoolInformation::where('school_id', auth()->user()->school_id)->first();
//        $data['thanaList'] = TblDistrictList::where(['school_id'=> auth()->user()->school_id])->get();
            $data['districtList'] = TblDistrictList::all();
            $data['selectedGuardianDistrictByThana'] = TblThanaList::where('district_list_id', $data['student']?->guardian_district_list_id)->get();
            $data['selectedPreAddrDistrictByThana'] = TblThanaList::where('district_list_id', $data['student']?->present_district_list_id)->get();
            $data['selectedPerAddrDistrictByThana'] = TblThanaList::where('district_list_id', $data['student']?->permanent_district_list_id)->get();
            $data['department'] = TblDepartment::where('school_id', auth()->user()->school_id)->get();
            $data['session'] = TblSession::where('school_id', auth()->user()->school_id)->get();
            $data['class'] = TblClass::where('school_id', auth()->user()->school_id)->get();

            return view("Student::student.edit", $data);
        } catch (Exception $exception) {
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function studentDelete($id)
    {
        try {
            $data = TblStudent::where('id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        } catch (Exception $exception) {
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function studentImport()
    {
        $data['pageTitle'] = "Student Import";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentClass'] = "menu-active";
        return view("Student::student.import", $data);
    }


    public function studentImportStore(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'class' => 'required|numeric',
//            'department' => 'required|numeric',
            'class_year' => 'required',
//            'upload_file' => 'required|mimetypes:application/csv,application/excel',
        ]);


        try {

            $msg = __(CREATED_SUCCESSFULLY);


            $file = $request->file('upload_file');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'student_import_file' . time() . '.' . $extenstion;
            $file->move('admin/img/uploads/student/', $filename);
            $path = 'admin/img/uploads/student/' . $filename;

            $reader = SimpleExcelReader::create($path);
            $rows = $reader->getRows();
            foreach ($rows as $row) {
                $existingData = TblStudentClass::where([
                    'class_id'=> $request->class,
                    'department_id'=> $request->department??1,
                    'class_year'=> $request->class_year,
                    'roll_no'=> $row['Roll No']
                ])->first();
                if (!is_null($existingData)){
                    continue;
                }
                DB::beginTransaction();

                $dataObj = new TblStudent();
                $dataObj->student_id = rand(0000, 9999);
                $dataObj->school_id = auth()->user()->school_id;

                $dataObj->student_name = $row['Student Name'];
                $dataObj->gender = $row['Gender'];
                $dataObj->birth_date = $row['Birth Date'];
                $dataObj->father_name = $row['Father Name'];
                $dataObj->mother_name = $row['Mother Name'];
                $dataObj->sms_alert_phone = $row['SMS Alert Phone'];
                $dataObj->guardian_name = $row['Guardian Name'];
                $dataObj->student_relation = $row['Student Relation'];
                $dataObj->permanent_address = $row['Permanent Address'];
                $dataObj->present_address = $row['Present Address'];

                $dataObj->save();

                //save std class data now
                $stdClassObj = new TblStudentClass();
                $stdClassObj->school_id = auth()->user()->school_id;
                $stdClassObj->class_id = $request->class;
                $stdClassObj->department_id = $request->department ?? 1;
                $stdClassObj->class_year = $request->class_year;
                $stdClassObj->student_id = $dataObj->id;
                $stdClassObj->roll_no = $row['Roll No'];
                $stdClassObj->shift = $request->shift;
                $stdClassObj->category_id = $request->category_id;
                $stdClassObj->status = 1;
                $stdClassObj->save();
                DB::commit();

            }


            return $this->success([], $msg);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function bulkUpdate(){
        $data['pageTitle'] = "Bulk Update";
        $data['activeStudent'] = "sub-group-active";
        $data['activeStudentClass'] = "menu-active";
        $data['class'] = TblClass::where('school_id', auth()->user()->school_id)->get();
        $data['allSession'] = TblSession::where('school_id', auth()->user()->school_id)->get();
        $data['allDepartment'] = TblDepartment::where('school_id', auth()->user()->school_id)->get();
        return view("Student::student.bulk_update", $data);
    }

    public function bulkUpdateRender(Request $request){

        $request->validate([
            'class' => 'required|numeric',
            'department' => 'required|numeric',
            'class_year' => 'required',
        ]);

        try {
            $data['class'] = TblClass::where('school_id', auth()->user()->school_id)->get();
            $data['allSession'] = TblSession::where('school_id', auth()->user()->school_id)->get();
            $data['department'] = TblDepartment::where('school_id', auth()->user()->school_id)->get();
            $data['request_property'] = Arr::except($request->all(), ['_token','class','department','class_year','group','shift']);
            if (empty($data['request_property'])){
                return $this->error([], 'Select at least one column');
            }
            $data['students'] = TblStudentClass::leftJoin('tbl_student', 'tbl_student_class.student_id','=','tbl_student.id')
                ->where(['tbl_student_class.class_year'=>$request->class_year,'tbl_student_class.class_id'=>$request->class,'tbl_student_class.department_id'=>$request->department])
                ->where(function ($query)use ($request){
                    if ($request->group){
                        $query->where('tbl_student_class.group', $request->group);
                    }
                    if ($request->shift){
                        $query->where('tbl_student_class.shift', $request->shift);
                    }
                })
                ->get([
                    'tbl_student.*',
                    'tbl_student_class.student_class_id as tbl_std_class_id',
                    'tbl_student_class.school_id as tbl_std_school_id',
                    'tbl_student_class.class_id as tbl_std_class_class_id',
                    'tbl_student_class.department_id as tbl_std_department_id',
                    'tbl_student_class.group_id as tbl_std_group_id',
                    'tbl_student_class.class_year as tbl_std_class_year',
                    'tbl_student_class.student_id as tbl_std_student_id',
                    'tbl_student_class.roll_no as tbl_std_roll_no',
                    'tbl_student_class.registration_no as tbl_std_registration_no',
                    'tbl_student_class.is_promoted as tbl_std_is_promoted',
                    'tbl_student_class.shift as tbl_std_shift',
                    'tbl_student_class.category_id as tbl_std_category_id',
                ]);

            $renderData = view('Student::student.bulk_update_render', $data)->render();
            return $this->success($renderData, 'Success');
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
        }

    }

    public function bulkUpdateStore(Request $request){
        $stdData = json_decode($request->stdData, true);
        try {
            DB::beginTransaction();

            $dataObj = TblStudent::find(decrypt($stdData['std_id']));
            $dataObj->student_id = isset($stdData['student_id']);
            $dataObj->student_name = isset($stdData['student_name']);
            $dataObj->gender = isset($stdData['gender']);
            $dataObj->birth_date = isset($stdData['date_of_birth']);
            $dataObj->father_name = isset($stdData['father_name']);
            $dataObj->father_name_bangla = isset($stdData['father_name_bn']);
            $dataObj->father_occupation = isset($stdData['father_occupation']);
            $dataObj->father_phone = isset($stdData['father_phone']);
            $dataObj->father_nid = isset($stdData['father_nid']);
            $dataObj->mother_name = isset($stdData['mother_name']);
            $dataObj->mother_name_bangla = isset($stdData['mother_name_bn']);
            $dataObj->mother_occupation = isset($stdData['mother_occupation']);
            $dataObj->mother_phone = isset($stdData['mother_phone']);
            $dataObj->mother_nid = isset($stdData['mother_nid']);
            $dataObj->sms_alert_phone = isset($stdData['sms_alert_phone']);
            $dataObj->blood_group = isset($stdData['blood_group']);
            $dataObj->religion = isset($stdData['religion']);
            $dataObj->guardian_name = isset($stdData['guardian_name']);
            $dataObj->student_relation = isset($stdData['student_relation']);
            $dataObj->permanent_address = isset($stdData['permanent_address']);
            $dataObj->present_address = isset($stdData['present_address']);
            $dataObj->national_id = isset($stdData['national_id']);

            if (isset($stdData['student_image'])) {
                $file = $request->file('student_image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'student_image' . time() . '.' . $extenstion;
                $file->move('admin/img/uploads/student/', $filename);
                $dataObj->image = 'admin/img/uploads/student/' . $filename;
            }
            $dataObj->save();

            //save std class data now
            $stdClassObj = TblStudentClass::where('student_id', decrypt($stdData['std_id']))->first();
            $stdClassObj->class_id = isset($stdData['class']);
            $stdClassObj->group_id = isset($stdData['group']);
            $stdClassObj->department_id = isset($stdData['department']);
            $stdClassObj->class_year = isset($stdData['class_year']);
            $stdClassObj->student_id = decrypt($stdData['std_id']);
            $stdClassObj->roll_no = isset($stdData['roll_no']);
            $stdClassObj->shift = isset($stdData['shift']);
            $stdClassObj->category_id = isset($stdData['class_id']);
            $stdClassObj->save();
            DB::commit();

            return $this->success([], UPDATED_SUCCESSFULLY);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }

}











