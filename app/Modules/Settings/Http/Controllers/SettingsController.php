<?php

namespace App\Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\SchoolInformation;
use App\Modules\Settings\Models\TblClass;
use App\Modules\Settings\Models\TblClassDepartment;
use App\Modules\Settings\Models\TblDepartment;
use App\Modules\Settings\Models\TblDesignation;
use App\Modules\Settings\Models\TblSession;
use App\Modules\Settings\Models\TblSubject;
use App\Modules\Student\Models\TblStudentClass;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{

    use ResponseTrait;

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function instituteInformation()
    {
        $data['pageTitle'] = "Institute Information";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsInstituteInfo'] = "menu-active";
        $data['instituteData'] = SchoolInformation::where('school_id', auth()->user()->school_id)->first();
        return view("Settings::institute-information", $data);
    }

    public function instituteInformationUpdate(Request $request)
    {

        $request->validate([
            "institute_name" => ['required', Rule::unique('tbl_school_information','school_name')->ignore($request->id, 'school_id')->whereNull('deleted_at')],
            'institute_name_bangla' => 'required',
            'is_roll' => 'required',
            'website_language' => 'required',
            'admin_dashboard_language' => 'required',
            'is_tribal' => 'required',
            'attendance_type' => 'required',
            'result_format' => 'required',
            'first_institute_name' => 'required',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = SchoolInformation::where('school_id', $request->id)->first();
            } else {
                $schoolInfoObj = new SchoolInformation();
//                $schoolInfoObj->school_id = rand(0000, 9999);
                $schoolInfoObj->institute_id = rand(0000, 9999);
            }

            $schoolInfoObj->school_name = $request->institute_name;
            $schoolInfoObj->bangla_name = $request->institute_name_bangla;
            $schoolInfoObj->school_title = $request->institute_title;
            $schoolInfoObj->establish = $request->establish;

            $schoolInfoObj->institute_type = $request->institute_type;
            $schoolInfoObj->is_government = $request->is_government;
            $schoolInfoObj->shift = $request->shift;
            $schoolInfoObj->under_board = $request->under_board;
            $schoolInfoObj->registration_no = $request->school_code;
            $schoolInfoObj->eiin_no = $request->eiin_number;
            $schoolInfoObj->address = $request->address;
            $schoolInfoObj->post_office = $request->post_office;
            $schoolInfoObj->district = $request->district;
            $schoolInfoObj->police_station = $request->police_station;
            $schoolInfoObj->address_2 = $request->address__bangla;
            $schoolInfoObj->post_office_2 = $request->post_office_bangla;
            $schoolInfoObj->district_2 = $request->district_bangla;
            $schoolInfoObj->police_station_2 = $request->police_station_bangla;
            $schoolInfoObj->contact_no = $request->contact_no;
            $schoolInfoObj->email = $request->email;
            $schoolInfoObj->website = $request->website;
            $schoolInfoObj->user_name = $request->user_name;
            $schoolInfoObj->facebook_link = $request->facebook;
            $schoolInfoObj->twitter_link = $request->twitter;
            $schoolInfoObj->google_maps = $request->google_maps;
            $schoolInfoObj->is_roll = $request->is_roll;
            $schoolInfoObj->admin_language = $request->admin_dashboard_language;
            $schoolInfoObj->is_tribal = $request->is_tribal;
            $schoolInfoObj->attendance_type = $request->attendance_type;
            $schoolInfoObj->result_format = $request->result_format;
            $schoolInfoObj->is_info_show = $request->is_info_show_in_banner;
            $schoolInfoObj->first_institute_name = $request->first_institute_name;

            $schoolInfoObj->language = $request->website_language;
            $schoolInfoObj->sub_type_name_1 = $request->sub_type_name_1;
            $schoolInfoObj->sub_type_name_2 = $request->sub_type_name_2;
            $schoolInfoObj->sub_type_name_3 = $request->sub_type_name_3;
            $schoolInfoObj->sub_type_name_4 = $request->sub_type_name_4;
            $schoolInfoObj->sub_type_short_1 = $request->sub_type_short_1;
            $schoolInfoObj->sub_type_short_2 = $request->sub_type_short_2;
            $schoolInfoObj->sub_type_short_3 = $request->sub_type_short_3;
            $schoolInfoObj->sub_type_short_4 = $request->sub_type_short_4;


            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'logo' . time() . '.' . $extenstion;
                $file->move('admin/img/uploads/institute_info/', $filename);
                $schoolInfoObj->logo = 'admin/img/uploads/institute_info/' . $filename;
            }
            if ($request->hasfile('logo2')) {
                $file = $request->file('logo2');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'logo2' . time() . '.' . $extenstion;
                $file->move('admin/img/uploads/institute_info/', $filename);
                $schoolInfoObj->logo2 = 'admin/img/uploads/institute_info/' . $filename;
            }
            if ($request->hasfile('signature')) {
                $file = $request->file('signature');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'signature' . time() . '.' . $extenstion;
                $file->move('admin/img/uploads/institute_info/', $filename);
                $schoolInfoObj->signature = 'admin/img/uploads/institute_info/' . $filename;
            }

            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();


            return $this->success([], __(UPDATED_SUCCESSFULLY));
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    //class part start
    public function classList(Request $request)
    {
        if ($request->ajax()){
            $data = TblClass::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
                ->editColumn('is_optional', function ($data) {
                    if ($data->is_optional == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })
                ->editColumn('result_type', function ($data) {
                    if ($data->result_type == 1){
                        return "<p>GPA</p>";
                    }else{
                        return "<p>CGPA</p>";
                    }
                })
                ->editColumn('passing_type', function ($data) {
                    if ($data->passing_type == 1){
                        return "<p>Total Marks</p>";
                    }elseif($data->passing_type == 2){
                        return "<p>Individual Marks</p>";
                    }elseif($data->passing_type == 3){
                        return "<p>Total Marks with CA</p>";
                    }elseif($data->passing_type == 4){
                        return "<p>Individual Marks with CA</p>";
                    }elseif($data->passing_type == 5){
                        return "<p>Individual Marks with 2 Subject Average</p>";
                    }elseif($data->passing_type == 6){
                        return "<p>Individual Marks with 2 Subject Average- CA</p>";
                    }else{
                        return "<p>-</p>";
                    }
                })
                ->editColumn('marksheet_type', function ($data) {
                    if ($data->marksheet_type == 1){
                        return "<p>Number & GPA</p>";
                    }elseif($data->marksheet_type == 2){
                        return "<p>Only GPA</p>";
                    }elseif($data->marksheet_type == 5){
                        return "<p>Individual Subject Pass Average</p>";
                    }else{
                        return "<p>-</p>";
                    }
                })
                ->editColumn('class_type', function ($data) {
                    if ($data->class_type == 1){
                        return "<p>Junior</p>";
                    }elseif($data->class_type == 2){
                        return "<p>Secondary</p>";
                    }elseif($data->class_type == 3){
                        return "<p>Higher Secondary</p>";
                    }elseif($data->class_type == 4){
                        return "<p>Honors</p>";
                    }elseif($data->class_type == 5){
                        return "<p>Degree</p>";
                    }elseif($data->class_type == 6){
                        return "<p>Masters</p>";
                    }else{
                        return "<p>-</p>";
                    }
                })
                ->editColumn('is_group', function ($data) {
                    if ($data->is_group == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })
                ->editColumn('is_used', function ($data) {
                    if ($data->is_used == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })

                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <button class="dropdown-item" onclick="getEditModal(\'' . route('class.edit', encrypt($data->class_id)) . '\'' . ', \'#classeditModal\')"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</button>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('class.delete', encrypt($data->class_id)) . '\', \'classeditModal\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['is_optional', 'result_type', 'passing_type', 'marksheet_type', 'class_type', 'is_group', 'is_used','action'])
                ->make(true);
        }
        $data['pageTitle'] = "Class";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsClass'] = "menu-active";
        return view("Settings::class.class-list", $data);
    }

    public function classStore(Request $request)
    {

        $id = $request->id?decrypt($request->id):$request->id;
        $request->validate([
            "class_name" => ['required', Rule::unique('tbl_class','class_name')->ignore($id, 'class_id')->whereNull('deleted_at')],
            'class_name_bangla' => 'required',
            'class_no' => 'required|numeric',
            'number_of_subject' => 'required',
            'is_optional' => 'required',
            'result_type' => 'required',
            'passing_type' => 'required',
            'marksheet_type' => 'required',
            'class_type' => 'required',
            'is_group' => 'required',
            'is_used' => 'required',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = TblClass::where('class_id', decrypt($request->id))->first();
                $msg =  __(UPDATED_SUCCESSFULLY);
            } else {
                $schoolInfoObj = new TblClass();
                $msg =  __(CREATED_SUCCESSFULLY);
            }

            $schoolInfoObj->class_name = $request->class_name;
            $schoolInfoObj->bangla_name = $request->class_name_bangla;
            $schoolInfoObj->class_no = $request->class_no;
            $schoolInfoObj->no_of_subject = $request->number_of_subject;
            $schoolInfoObj->is_optional = $request->is_optional;
            $schoolInfoObj->result_type = $request->result_type;
            $schoolInfoObj->passing_type = $request->passing_type;
            $schoolInfoObj->marksheet_type = $request->marksheet_type;
            $schoolInfoObj->class_type = $request->class_type;
            $schoolInfoObj->is_group = $request->is_group;
            $schoolInfoObj->is_used = $request->is_used;
            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->school_id = auth()->user()->school_id;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();

            return $this->success([], $msg);
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function classEdit($id){
        try {
            $data['classData'] = TblClass::where('class_id', decrypt($id))->first();
            return view('Settings::class.edit', $data)->render();
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function classDelete($id){
        try {
            $data = TblClass::where('class_id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
    //class part end

    //department part start
    public function departmentList(Request $request)
    {
        if ($request->ajax()){
            $data = TblDepartment::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
                ->editColumn('department_type', function ($data) {
                    if ($data->department_type == 1){
                        return "<p>Department</p>";
                    }elseif($data->department_type == 2){
                        return "<p>Group</p>";
                    }elseif($data->department_type == 3){
                        return "<p>Section</p>";
                    }elseif($data->department_type == 4){
                        return "<p>Course</p>";
                    }else{
                        return "<p>-</p>";
                    }
                })

                ->editColumn('is_used', function ($data) {
                    if ($data->is_used == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })

                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <button class="dropdown-item" onclick="getEditModal(\'' . route('settings-department.edit', encrypt($data->department_id)) . '\'' . ', \'#editModal\')"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</button>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('settings-department.delete', encrypt($data->department_id)) . '\', \'dataTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['department_type', 'is_used','action'])
                ->make(true);
        }
        $data['pageTitle'] = "Department";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsDepartment'] = "menu-active";
        return view("Settings::department.list", $data);
    }

    public function departmentStore(Request $request)
    {
        $id = $request->id?decrypt($request->id):$request->id;
        $request->validate([
            "department_name" => ['required', Rule::unique('tbl_departments','department')->ignore($id, 'department_id')->whereNull('deleted_at')],
            'bangla_name' => 'required',
            'department_no' => 'required|numeric',
            'department_type' => 'required',
            'is_used' => 'required',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = TblDepartment::where('department_id', decrypt($request->id))->first();
                $msg =  __(UPDATED_SUCCESSFULLY);
            } else {
                $schoolInfoObj = new TblDepartment();
                $msg =  __(CREATED_SUCCESSFULLY);
            }

            $schoolInfoObj->department = $request->department_name;
            $schoolInfoObj->bangla_name = $request->bangla_name;
            $schoolInfoObj->department_no = $request->department_no;
            $schoolInfoObj->department_type = $request->department_type;
            $schoolInfoObj->is_used = $request->is_used;
            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->school_id = auth()->user()->school_id;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();

            return $this->success([], $msg);
        } catch (Exception $exception) {
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function departmentEdit($id){
        try {
            $data['departmentData'] = TblDepartment::where('department_id', decrypt($id))->first();
            return view('Settings::department.edit', $data)->render();
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function departmentDelete($id){
        try {
            $data = TblDepartment::where('department_id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
    //department part end

    //session part start
    public function sessionList(Request $request)
    {
        if ($request->ajax()){
            $data = TblSession::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
                ->editColumn('is_used', function ($data) {
                    if ($data->is_used == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })

                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <button class="dropdown-item" onclick="getEditModal(\'' . route('settings-session.edit', encrypt($data->session_id)) . '\'' . ', \'#editModal\')"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</button>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('settings-session.delete', encrypt($data->session_id)) . '\', \'dataTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['is_used','action'])
                ->make(true);
        }
        $data['pageTitle'] = "Session";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsSession'] = "menu-active";
        return view("Settings::session.list", $data);
    }

    public function sessionStore(Request $request)
    {
        $id = $request->id?decrypt($request->id):$request->id;
        $request->validate([
            "session_name" => ['required', Rule::unique('tbl_session','session_name')->ignore($id, 'session_id')->whereNull('deleted_at')],
            'session_name_bangla' => 'required',
            'exam_year' => 'required|numeric',
            'is_used' => 'required',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = TblSession::where('session_id', decrypt($request->id))->first();
                $msg =  __(UPDATED_SUCCESSFULLY);
            } else {
                $schoolInfoObj = new TblSession();
                $msg =  __(CREATED_SUCCESSFULLY);
            }

            $schoolInfoObj->session_name = $request->session_name;
            $schoolInfoObj->session_name_bangla = $request->session_name_bangla;
            $schoolInfoObj->exam_year = $request->exam_year;
            $schoolInfoObj->is_used = $request->is_used;
            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->school_id = auth()->user()->school_id;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();

            return $this->success([], $msg);
        } catch (Exception $exception) {
//            return $this->error([], $exception->getMessage());
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function sessionEdit($id){
        try {
            $data['sessionData'] = TblSession::where('session_id', decrypt($id))->first();
            return view('Settings::session.edit', $data)->render();
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function sessionDelete($id){
        try {
            $data = TblSession::where('session_id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
    //session part end

    //designation part start
    public function designationList(Request $request)
    {
        if ($request->ajax()){
            $data = TblDesignation::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
                ->editColumn('is_vacant_post', function ($data) {
                    if ($data->is_vacant_post == 1){
                        return "<p>No</p>";
                    }else{
                        return "<p>Yes</p>";
                    }
                })
                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <button class="dropdown-item" onclick="getEditModal(\'' . route('settings-designation.edit', encrypt($data->designation_id)) . '\'' . ', \'#editModal\')"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</button>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('settings-designation.delete', encrypt($data->designation_id)) . '\', \'dataTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['is_vacant_post','action'])
                ->make(true);
        }
        $data['pageTitle'] = "Designation";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsDesignation'] = "menu-active";
        return view("Settings::designation.list", $data);
    }

    public function designationStore(Request $request)
    {

        $id = $request->id?decrypt($request->id):$request->id;
        $request->validate([
            "serial" => ['required','numeric', Rule::unique('tbl_designation','serial')->ignore($id, 'designation_id')->whereNull('deleted_at')],
            "designation_name" => ['required', Rule::unique('tbl_designation','designation_name')->ignore($id, 'designation_id')->whereNull('deleted_at')],
            'designation_name_bangla' => 'required',
            'is_vacant_post' => 'required|numeric',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = TblDesignation::where('designation_id', decrypt($request->id))->first();
                $msg =  __(UPDATED_SUCCESSFULLY);
            } else {
                $schoolInfoObj = new TblDesignation();
                $msg =  __(CREATED_SUCCESSFULLY);
            }

            $schoolInfoObj->serial = $request->serial;
            $schoolInfoObj->designation_name = $request->designation_name;
            $schoolInfoObj->designation_name_bangla = $request->designation_name_bangla;
            $schoolInfoObj->is_vacant_post = $request->is_vacant_post;
            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->school_id = auth()->user()->school_id;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();

            return $this->success([], $msg);
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function designationEdit($id){
        try {
            $data['designationData'] = TblDesignation::where('designation_id', decrypt($id))->first();
            return view('Settings::designation.edit', $data)->render();
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function designationDelete($id){
        try {
            $data = TblDesignation::where('designation_id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
    //designation part end

    //designation part start
    public function subjectList(Request $request)
    {
        if ($request->ajax()){
            $data = TblSubject::where('school_id', auth()->user()->school_id)->get();
            return datatables($data)
                ->addIndexColumn()
                ->editColumn('is_optional', function ($data) {
                    if ($data->is_optional == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })
                ->editColumn('is_additional', function ($data) {
                    if ($data->is_additional == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })
                ->editColumn('is_paper_2', function ($data) {
                    if ($data->is_paper_2 == 1){
                        return "<p>Yes</p>";
                    }else{
                        return "<p>No</p>";
                    }
                })
                ->editColumn('marks_type', function ($data) {
                    if ($data->marks_type == 1){
                        return "<p>Subjective</p>";
                    }elseif($data->marks_type == 2){
                        return "<p>Subjective, Objective</p>";
                    }elseif($data->marks_type == 3){
                        return "<p>Subjective, Objective, Practical</p>";
                    }elseif($data->marks_type == 4){
                        return "<p>Subjective, Practical</p>";
                    }elseif($data->marks_type == 5){
                        return "<p>Objective, Practical</p>";
                    }else{
                        return "<p>-</p>";
                    }
                })

                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <button class="dropdown-item" onclick="getEditModal(\'' . route('settings-subject.edit', encrypt($data->subject_id)) . '\'' . ', \'#editModal\')"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</button>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('settings-subject.delete', encrypt($data->subject_id)) . '\', \'dataTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['is_additional', 'is_optional', 'is_paper_2', 'marks_type','action'])
                ->make(true);
        }
        $data['pageTitle'] = "Subject";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsSubject'] = "menu-active";
        return view("Settings::subject.list", $data);
    }

    public function subjectStore(Request $request)
    {
        $id = $request->id?decrypt($request->id):$request->id;
        $request->validate([
            "subject_name" => ['required', Rule::unique('tbl_subject','subject_name')->ignore($id, 'subject_id')->whereNull('deleted_at')],
            'subject_name_bangla' => 'required',
            'subject_code' => 'required|numeric',
            'subject_short_form' => 'required',
            'subject_short_form_bangla' => 'required',
            'is_optional' => 'required',
            'is_additional' => 'required',
            'is_paper_2' => 'required',
            'marks_type' => 'required',
            'subject_priority_no' => 'required|numeric',
        ]);

        try {
            if ($request->id) {
                $schoolInfoObj = TblSubject::where('subject_id', decrypt($request->id))->first();
                $msg =  __(UPDATED_SUCCESSFULLY);
            } else {
                $schoolInfoObj = new TblSubject();
                $msg =  __(CREATED_SUCCESSFULLY);
            }

            $schoolInfoObj->subject_name = $request->subject_name;
            $schoolInfoObj->subject_name_bangla = $request->subject_name_bangla;
            $schoolInfoObj->subject_code = $request->subject_code;
            $schoolInfoObj->subject_short_form = $request->subject_short_form;
            $schoolInfoObj->subject_short_form_bangla = $request->subject_short_form_bangla;
            $schoolInfoObj->is_optional = $request->is_optional;
            $schoolInfoObj->is_additional = $request->is_additional;
            $schoolInfoObj->is_paper_2 = $request->is_paper_2;
            $schoolInfoObj->marks_type = $request->marks_type;
            $schoolInfoObj->subject_pn = $request->subject_priority_no;
            $schoolInfoObj->status = STATUS_ACTIVE;
            $schoolInfoObj->school_id = auth()->user()->school_id;
            $schoolInfoObj->created_on = now();
            $schoolInfoObj->save();

            return $this->success([], $msg);
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
//            return $this->error([], __(SOMETHING_WENT_WRONG));
        }


    }

    public function subjectEdit($id){
        try {
            $data['subjectData'] = TblSubject::where('subject_id', decrypt($id))->first();
            return view('Settings::subject.edit', $data)->render();
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function subjectDelete($id){
        try {
            $data = TblSubject::where('subject_id', decrypt($id))->first();
            $data->delete();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
    //designation part end


    public function classDepartment(){
        $data['pageTitle'] = "Class Department";
        $data['activeSettings'] = "sub-group-active";
        $data['activeSettingsDepartment'] = "menu-active";
        $data['class'] = TblClass::get();
        return view('Settings::department.class-department', $data);
    }

    public function getDepartment(Request $request){
        try {

            $data['departments'] = TblStudentClass::select('tbl_departments.department_id as departmentID')
                    ->leftJoin('tbl_departments', 'tbl_student_class.department_id', '=', 'tbl_departments.department_id')
                    ->where('tbl_student_class.student_class_id', $request->class_id)
                    ->get();

            $data['all_departments'] = TblDepartment::where('status', STATUS_ACTIVE)->get();

            return view('Settings::department.department-list-rander', $data)->render();

        }catch (Exception $exception){
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function departmentClassStore(Request $request){

        $request->validate([
            'class_id' => 'required',
            'department_id' => 'required',
        ]);

        // DB::beginTransaction();

        try {
            // $tblClassDepartment = TblClassDepartment::where('class_id', $request->class_id)->get();

            // if (count($tblClassDepartment) > 0) {
            //     foreach ($tblClassDepartment as $item) {
            //         $item->delete();
            //     }
            // }

            $departmentClass = new TblClassDepartment();

            if ($request->department_id) {
                foreach ($request->department_id as $key => $department_id) {
                    $departmentClass->department_id = $request->department_id[$key];
                    $departmentClass->class_id = $request->class_id;
                    $departmentClass->status = STATUS_ACTIVE;
                    $departmentClass->save();
                }

                return $this->success([], CREATED_SUCCESSFULLY);
            }else{
                return $this->error([], __(SOMETHING_WENT_WRONG));
            }

        }catch (Exception $exception){
            // DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }


}
