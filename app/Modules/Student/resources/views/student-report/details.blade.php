@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')
<style>
    th:last-child, td:last-child {
        display: table-cell; /* Show last column for wider screens */
    }
</style>
@endpush

@section('content')
    <div class="dashboard-content-one">
        <!-- Class Table Area Start Here -->
        <div class="card height-auto mt-2">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>{{$pageTitle}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.summary')}}" class="nav-link px-5 text-secondary text-18"> Summary </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.details')}}" class="nav-link active font-medium px-5 text-18"> Details </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.student-list')}}" class="nav-link px-5 text-secondary text-18"> Student Profile </a>
            </li>
        </ul>

        <div class="bg-white p-4 mb-4">
            <h5 class="text-center pt-4 pb-3 text-24 font-medium">Student Information</h5>
            <form class="new-added-form reset" action="{{ route('student-report.details-list') }}"
                method="post" data-handler="commonResponse">
                @csrf
                <div class="py-3">
                    <div class="row">
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Class Year/Session <span class="text-danger">*</span></label>
                            <select class="select2" name="session" required>
                                <option value="">-- Select One --</option>
                                @foreach ($allSession as $session)
                                    <option value="{{$session->session_id}}">{{$session->exam_year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Class</label>
                            <select class="select2" name="class">
                                <option value="">--Select Class--</option>
                                <option value="1">Eleven</option>
                                <option value="2">Twelve</option>
                                <option value="3">Play</option>
                                <option value="4">Tan</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Section/ Department</label>
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
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Student Category</label>
                            <select class="select2" name="student_category">
                                <option value="">-- Select One --</option>
                                <option value="1">Regular</option>
                                <option value="2">Irregular</option>
                                <option value="3">Improvement</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Gender</label>
                            <select class="select2" name="gender">
                                <option value="">-- Select One --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Religion</label>
                            <select class="select2" name="religion">
                                <option value="">Select Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Christian">Christian</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Guardian Profession</label>
                            <select class="select2" name="guardian_profession">
                                <option value="">Select Guardian Profession</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Labour">Labour</option>
                                <option value="Business">Business</option>
                                <option value="Small Business">Small Business</option>
                                <option value="Govt. Job Holder">Govt. Job Holder</option>
                                <option value="Non Govt. Job Holder">Non Govt. Job Holder</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Lawyer">Lawyer</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Fisherman">Fisherman</option>
                                <option value="Weaver">Weaver</option>
                                <option value="Blacksmith / Potter">Blacksmith / Potter</option>
                                <option value="Foreigner">Foreigner</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Student Status</label>
                            <select class="select2" name="student_status">
                                <option value="">-- Select One --</option>
                                <option value="1">Active</option>
                                <option value="2">TC Issue</option>
                                <option value="3">Admission Cancel</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-md-3">
                            <label>Sorting By</label>
                            <select class="select2" name="sorting_by">
                                <option value="">-- Select One --</option>
                                <option value="1">Class Roll (Ascending)</option>
                                <option value="2">Class Roll (Descending)</option>
                                <option value="3">Student ID (Ascending)</option>
                                <option value="4">Student ID (Descending)</option>
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
                        <div class="p-2">
                            <div class="form-check bg-danger d-flex align-items-center px-3 py-2 radius-4">
                                <input @isset($checkData['check_print']){{$checkData['check_print'] == 1 ? 'checked' : ''}}@endisset type="checkbox" class="form-check-input" name="check_print">
                                <label class="form-check-label pl-5 text-white">Show Print Button</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @isset($detailsList)
            <div class="bg-white p-4 mb-5" id="student_data">
                <div class="text-center">
                    <h5 class="text-19 font-semibold lh-22 text-1b1c17 pb-10">Student List</h5>
                    <p>Academic Year/ Session: {{$session->exam_year}}</p>
                </div>
                <table class="table display text-nowrap table-responsive border">
                    <thead>
                    <tr>
                        <th @isset($checkData['check_class']) class="{{$checkData['check_class'] == 1 ? '' : 'd-none'}}" @endisset>Class</th>
                        <th @isset($checkData['check_department']) class="{{$checkData['check_department'] == 1 ? '' : 'd-none'}}" @endisset>Section/Department</th>
                        <th @isset($checkData['check_roll']) class="{{$checkData['check_roll'] == 1 ? '' : 'd-none'}}" @endisset>Roll No</th>
                        <th @isset($checkData['check_studentID']) class="{{$checkData['check_studentID'] == 1 ? '' : 'd-none'}}" @endisset>Student ID</th>
                        <th @isset($checkData['check_previous_roll']) class="{{$checkData['check_previous_roll'] == 1 ? '' : 'd-none'}}" @endisset>Previous Roll No</th>
                        <th @isset($checkData['check_name']) class="{{$checkData['check_name'] == 1 ? '' : 'd-none'}}" @endisset>Student Name</th>
                        <th @isset($checkData['check_name_bn']) class="{{$checkData['check_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>Student Name (Bangla)</th>
                        <th @isset($checkData['check_shift']) class="{{$checkData['check_shift'] == 1 ? '' : 'd-none'}}" @endisset>Shift</th>
                        <th @isset($checkData['check_father_name']) class="{{$checkData['check_father_name'] == 1 ? '' : 'd-none'}}" @endisset>Father Name</th>
                        <th @isset($checkData['check_father_name_bn']) class="{{$checkData['check_father_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>Father Name (Bangla)</th>
                        <th @isset($checkData['check_father_occupation']) class="{{$checkData['check_father_occupation'] == 1 ? '' : 'd-none'}}" @endisset>Father Occupation</th>
                        <th @isset($checkData['check_father_phone']) class="{{$checkData['check_father_phone'] == 1 ? '' : 'd-none'}}" @endisset>Father Phone</th>
                        <th @isset($checkData['check_fatherNID']) class="{{$checkData['check_fatherNID'] == 1 ? '' : 'd-none'}}" @endisset>Father NID</th>
                        <th @isset($checkData['check_mother_name']) class="{{$checkData['check_mother_name'] == 1 ? '' : 'd-none'}}" @endisset>Mother Name</th>
                        <th @isset($checkData['check_mother_name_bn']) class="{{$checkData['check_mother_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>Mother Name (Bangla)</th>
                        <th @isset($checkData['check_mother_occupation']) class="{{$checkData['check_mother_occupation'] == 1 ? '' : 'd-none'}}" @endisset>Mother Occupation</th>
                        <th @isset($checkData['check_mother_phone']) class="{{$checkData['check_mother_phone'] == 1 ? '' : 'd-none'}}" @endisset>Mother Phone</th>
                        <th @isset($checkData['check_motherNID']) class="{{$checkData['check_motherNID'] == 1 ? '' : 'd-none'}}" @endisset>Mother NID</th>
                        <th @isset($checkData['check_SMS_alert_phone']) class="{{$checkData['check_SMS_alert_phone'] == 1 ? '' : 'd-none'}}" @endisset>SMS Alert Phone</th>
                        <th @isset($checkData['check_date_of_birth']) class="{{$checkData['check_date_of_birth'] == 1 ? '' : 'd-none'}}" @endisset>Date of Birth <span class="text-10">dd/mm/yyyy</span></th>
                        <th @isset($checkData['check_gender']) class="{{$checkData['check_gender'] == 1 ? '' : 'd-none'}}" @endisset>Gender</th>
                        <th @isset($checkData['check_blood_group']) class="{{$checkData['check_blood_group'] == 1 ? '' : 'd-none'}}" @endisset>Blood Group</th>
                        <th @isset($checkData['check_religion']) class="{{$checkData['check_religion'] == 1 ? '' : 'd-none'}}" @endisset>Religion</th>
                        <th @isset($checkData['check_NID_Birth_certificate']) class="{{$checkData['check_NID_Birth_certificate'] == 1 ? '' : 'd-none'}}" @endisset>NID/Birth Certificate</th>
                        <th @isset($checkData['check_category']) class="{{$checkData['check_category'] == 1 ? '' : 'd-none'}}" @endisset>Category</th>
                        <th @isset($checkData['check_merit_position']) class="{{$checkData['check_merit_position'] == 1 ? '' : 'd-none'}}" @endisset>Merit Position</th>
                        <th @isset($checkData['check_image']) class="{{$checkData['check_image'] == 1 ? '' : 'd-none'}}" @endisset>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailsList as $data)
                            <tr>
                                <td @isset($checkData['check_class']) class="{{$checkData['check_class'] == 1 ? '' : 'd-none'}}" @endisset>
                                    @if ($data->class_id == 1)
                                        Eleven
                                    @elseif ($data->class_id == 2)
                                        Twelve
                                    @elseif ($data->class_id == 3)
                                        Play
                                    @else
                                        Tan
                                    @endif
                                </td>
                                <td @isset($checkData['check_department']) class="{{$checkData['check_department'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->department}}</td>
                                <td @isset($checkData['check_roll']) class="{{$checkData['check_roll'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->roll_no}}</td>
                                <td @isset($checkData['check_studentID']) class="{{$checkData['check_studentID'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->studentID}}</td>
                                <td @isset($checkData['check_previous_roll']) class="{{$checkData['check_previous_roll'] == 1 ? '' : 'd-none'}}" @endisset>p-roll</td>
                                <td @isset($checkData['check_name']) class="{{$checkData['check_name'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->student_name}}</td>
                                <td @isset($checkData['check_name_bn']) class="{{$checkData['check_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->student_name_bangla}}</td>
                                <td @isset($checkData['check_shift']) class="{{$checkData['check_shift'] == 1 ? '' : 'd-none'}}" @endisset>
                                    @if ($data->shift == 1)
                                        Morning Shift
                                    @else
                                        Day Shift
                                    @endif
                                </td>
                                <td @isset($checkData['check_father_name']) class="{{$checkData['check_father_name'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->father_name}}</td>
                                <td @isset($checkData['check_father_name_bn']) class="{{$checkData['check_father_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->father_name_bangla}}</td>
                                <td @isset($checkData['check_father_occupation']) class="{{$checkData['check_father_occupation'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->father_occupation}}</td>
                                <td @isset($checkData['check_father_phone']) class="{{$checkData['check_father_phone'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->father_phone}}</td>
                                <td @isset($checkData['check_fatherNID']) class="{{$checkData['check_fatherNID'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->father_nid}}</td>
                                <td @isset($checkData['check_mother_name']) class="{{$checkData['check_mother_name'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->mother_name}}</td>
                                <td @isset($checkData['check_mother_name_bn']) class="{{$checkData['check_mother_name_bn'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->mother_name_bangla}}</td>
                                <td @isset($checkData['check_mother_occupation']) class="{{$checkData['check_mother_occupation'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->mother_occupation}}</td>
                                <td @isset($checkData['check_mother_phone']) class="{{$checkData['check_mother_phone'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->mother_phone}}</td>
                                <td @isset($checkData['check_motherNID']) class="{{$checkData['check_motherNID'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->mother_nid}}</td>
                                <td @isset($checkData['check_SMS_alert_phone']) class="{{$checkData['check_SMS_alert_phone'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->sms_alert_phone}}</td>
                                <td @isset($checkData['check_date_of_birth']) class="{{$checkData['check_date_of_birth'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->birth_date}}</td>
                                <td @isset($checkData['check_gender']) class="{{$checkData['check_gender'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->gender}}</td>
                                <td @isset($checkData['check_blood_group']) class="{{$checkData['check_blood_group'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->blood_group}}</td>
                                <td @isset($checkData['check_religion']) class="{{$checkData['check_religion'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->religion}}</td>
                                <td @isset($checkData['check_NID_Birth_certificate']) class="{{$checkData['check_NID_Birth_certificate'] == 1 ? '' : 'd-none'}}" @endisset>N/A</td>
                                <td @isset($checkData['check_category']) class="{{$checkData['check_category'] == 1 ? '' : 'd-none'}}" @endisset>{{$data->gender}}</td>
                                <td @isset($checkData['check_merit_position']) class="{{$checkData['check_merit_position'] == 1 ? '' : 'd-none'}}" @endisset>
                                    @if ($data->category_id == 1)
                                    Regular
                                    @elseif ($data->category_id == 2)
                                    Irregular
                                    @elseif ($data->category_id == 3)
                                    Improvement
                                    @endif
                                </td>
                                <td @isset($checkData['check_image']) class="{{$checkData['check_image'] == 1 ? '' : 'd-none'}}" @endisset>
                                    <img class="rounded-circle w-25" src="{{asset($data->image)}}" alt="">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @isset($checkData['check_print'])
                    @if ($checkData['check_print'] == 1)
                        <div class="text-center">
                            <button type="button" class="btn-fill-lg bg-blue-dark btn-hover-yellow printBTN">Print</button>
                        </div>
                    @endif
                @endisset
            </div>
        @endisset



    </div>

@endsection

@push('script')
    <script>
        // $(document).ready(function() {
        //     $('#student_data').DataTable( {
        //         "searching": true,
        //         "paging": true,
        //         "ordering": false,
        //         "responsive": false,
        //     } );
        // } );

        $(".printBTN").click(function(){
            printDiv();
        });

        window.printDiv = function () {
            var printContents = document.getElementById('student_data').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        };
    </script>
@endpush
