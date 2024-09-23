@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')

@endpush

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Enrollment Form</h3>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Account Settings Area Start Here -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="new-added-form ajax" action="{{ route('student.bulk.update-render') }}"
                              method="post" data-handler="bulkListResponse">
                            @csrf
                            <div class="py-3">
                                <div class="row">
                                    <div class="form-group col-sm-4 col-md-3">
                                        <label>Class Year/Session <span class="text-danger">*</span></label>
                                        <select class="select2" name="class_year" required>
                                            <option value="">-- Select One --</option>
                                            @foreach ($allSession as $session)
                                                <option value="{{$session->session_id}}">{{$session->exam_year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-3">
                                        <label>Class <span class="text-danger">*</span></label>
                                        <select class="select2" name="class">
                                            <option value="">--Select Class--</option>
                                            @foreach($class as $item)
                                                <option value="{{$item->class_id}}">{{$item->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-3">
                                        <label>Section/ Department <span class="text-danger">*</span></label>
                                        <select class="select2" name="department">
                                            <option value="">-- Select One --</option>
                                            @foreach ($allDepartment as $value)
                                                <option value="{{$value->department_id}}">{{$value->department}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-3">
                                        <label>Group</label>
                                        <select class="select2" name="group">
                                            <option value="">-- Select One --</option>
                                            <option value="1">Arts</option>
                                            <option value="2">Buisness</option>
                                            <option value="3">Science</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-3">
                                        <label>Shift</label>
                                        <select class="select2" name="shift">
                                            <option value="">-- Select One --</option>
                                            <option value="1">Morning Shift</option>
                                            <option value="2">Day Shift</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-4 col-md-3 mt-2">
                                        <button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow mt-5">Show</button>
                                    </div>
                                </div>

                                <div class="row p-4">
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_class']){{$checkData['check_class'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input checkbox" name="check_class">
                                            <label class="form-check-label pl-5 text-white">Class</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_department']){{$checkData['check_department'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input checkbox" name="check_department">
                                            <label class="form-check-label pl-5 text-white"> Section/Department </label>
                                        </div>
                                    </div>

                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_shift']){{$checkData['check_shift'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_shift">
                                            <label class="form-check-label pl-5 text-white">Shift</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_studentID']){{$checkData['check_studentID'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_studentID">
                                            <label class="form-check-label pl-5 text-white"> Student ID </label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_roll']){{$checkData['check_roll'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_roll">
                                            <label class="form-check-label pl-5 text-white">Roll No</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_previous_roll']){{$checkData['check_previous_roll'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_previous_roll">
                                            <label class="form-check-label pl-5 text-white"> Previous Roll No</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_name']){{$checkData['check_name'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_name">
                                            <label class="form-check-label pl-5 text-white">Name</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_name_bn']){{$checkData['check_name_bn'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_name_bn">
                                            <label class="form-check-label pl-5 text-white"> Name (Bangla)</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_father_name']){{$checkData['check_father_name'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_father_name">
                                            <label class="form-check-label pl-5 text-white"> Father Name</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_father_name_bn']){{$checkData['check_father_name_bn'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_father_name_bn">
                                            <label class="form-check-label pl-5 text-white"> Father Name (Bangla)</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_father_occupation']){{$checkData['check_father_occupation'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_father_occupation">
                                            <label class="form-check-label pl-5 text-white"> Father Occupation</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_father_phone']){{$checkData['check_father_phone'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_father_phone">
                                            <label class="form-check-label pl-5 text-white"> Father Phone</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_fatherNID']){{$checkData['check_fatherNID'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_fatherNID">
                                            <label class="form-check-label pl-5 text-white"> Father NID</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_mother_name']){{$checkData['check_mother_name'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_mother_name">
                                            <label class="form-check-label pl-5 text-white">Mother Name</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_mother_name_bn']){{$checkData['check_mother_name_bn'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_mother_name_bn">
                                            <label class="form-check-label pl-5 text-white">Mother Name (Bangla)</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_mother_occupation']){{$checkData['check_mother_occupation'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_mother_occupation">
                                            <label class="form-check-label pl-5 text-white">Mother Occupation</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_mother_phone']){{$checkData['check_mother_phone'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_mother_phone">
                                            <label class="form-check-label pl-5 text-white">Mother Phone</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_motherNID']){{$checkData['check_motherNID'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_motherNID">
                                            <label class="form-check-label pl-5 text-white">Mother NID</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_SMS_alert_phone']){{$checkData['check_SMS_alert_phone'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_SMS_alert_phone">
                                            <label class="form-check-label pl-5 text-white">SMS Alert Phone</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_date_of_birth']){{$checkData['check_date_of_birth'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_date_of_birth">
                                            <label class="form-check-label pl-5 text-white">Date of Birth</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_gender']){{$checkData['check_gender'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_gender">
                                            <label class="form-check-label pl-5 text-white">Gender</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_blood_group']){{$checkData['check_blood_group'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_blood_group">
                                            <label class="form-check-label pl-5 text-white">Blood Group</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_religion']){{$checkData['check_religion'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_religion">
                                            <label class="form-check-label pl-5 text-white">Religion</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_NID_Birth_certificate']){{$checkData['check_NID_Birth_certificate'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_NID_Birth_certificate">
                                            <label class="form-check-label pl-5 text-white">NID/Birth Certificate</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_category']){{$checkData['check_category'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_category">
                                            <label class="form-check-label pl-5 text-white">Category</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_merit_position']){{$checkData['check_merit_position'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_merit_position">
                                            <label class="form-check-label pl-5 text-white">Merit Position</label>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <div class="form-check bg-blue-dark d-flex align-items-center px-3 py-2 radius-4">
                                            <input @isset($checkData['check_image']){{$checkData['check_image'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_image">
                                            <label class="form-check-label pl-5 text-white">Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="bulk-update-list-section"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- Account Settings Area End Here -->

    </div>

    <input type="hidden" id="update-store-route" value="{{route('student.bulk.update-store')}}">

@endsection

@push('script')
<script>
    function bulkListResponse(response){
        console.log(response);
        $(".bulk-update-list-section").html(response.data);
    }

    // get update value
    $(document).on('click', '.student-update', function () {
        let getStudent = $(this).closest('#all-student tr');

        let studentData = {
            std_id: getStudent.find('.std_id').val(),
            roll_no: getStudent.find('.roll_no').val(),
            class: getStudent.find('.class').val(),
            department: getStudent.find('.department').val(),
            group: getStudent.find('.group').val(),
            shift: getStudent.find('.shift').val(),
            student_id: getStudent.find('.student_id').val(),
            student_name: getStudent.find('.student_name').val(),
            father_name: getStudent.find('.father_name').val(),
            father_name_bn: getStudent.find('.father_name_bn').val(),
            father_occupation: getStudent.find('.father_occupation').val(),
            father_phone: getStudent.find('.father_phone').val(),
            father_nid: getStudent.find('.father_nid').val(),
            mother_name: getStudent.find('.mother_name').val(),
            mother_name_bn: getStudent.find('.mother_name_bn').val(),
            mother_occupation: getStudent.find('.mother_occupation').val(),
            mother_phone: getStudent.find('.mother_phone').val(),
            mother_nid: getStudent.find('.mother_nid').val(),
            sms_alert_phone: getStudent.find('.sms_alert_phone').val(),
            date_of_birth: getStudent.find('.date_of_birth').val(),
            gender: getStudent.find('.gender').val(),
            blood_group: getStudent.find('.blood_group').val(),
            religion: getStudent.find('.religion').val(),
            national_id: getStudent.find('.national_id').val(),
            student_image: getStudent.find('.student_image').val()
        };

            let data = new FormData();
            data.append('stdData', JSON.stringify(studentData));
            data.append("_token", $('meta[name="csrf-token"]').attr('content'));

            commonAjax('post', $('#update-store-route').val(), studentData, studentDataCallback, data);
    });

    function studentDataCallback(response) {
        console.log(response);
        if (response.status == 200) {
            $(".department-show").html(response.responseText);
        }
    }
</script>
@endpush


