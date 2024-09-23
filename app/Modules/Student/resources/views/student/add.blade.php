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

                        <form class="new-added-form ajax reset" action="{{ route('student.store') }}"
                              method="post"
                              data-handler="commonResponse">
                            @csrf

                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Class Info</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Applicant for Class *</label>
                                    <select class="select2 class-action" name="class" id="classAction">
                                        <option value="">--Select Class--</option>
                                        @foreach($class as $item)
                                            <option value="{{$item->class_id}}" data-group="{{$item->is_group}}">{{$item->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Section/Department *</label>
                                    <select class="select2" name="department">
                                        <option value="">---Select One---</option>
                                        @foreach($department as $item)
                                            <option value="{{$item->department_id}}">{{$item->department}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" id="classGroup" name="class_group">
                                <div class="col-xl-3 col-lg-6 col-12 form-group d-none" id="groupShow">
                                    <label>Group *</label>
                                    <select class="select2" name="group" id="group_id" disabled>
                                            <option value="">---Select One---</option>
                                            <option value="1">Science</option>
                                            <option value="2">Humanities</option>
                                            <option value="3">Business Studies</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Year/Session *</label>
                                    <select class="select2" name="class_year">
                                        <option value="">---Select One---</option>
                                        @foreach($session as $item)
                                            <option value="{{$item->session_id}}">{{$item->session_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Roll *</label>
                                    <input type="text" placeholder="" class="form-control"
                                           name="roll_no">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date of Admission</label>
                                    <input type="date" placeholder="" class="form-control" name="date_of_admission">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Previous School Name</label>
                                    <input type="text" placeholder="" class="form-control" name="school_name">
                                </div>

                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Personal Info</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Name *</label>
                                    <input type="text" placeholder="" class="form-control" name="student_name"
                                           value="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date of Birth *</label>
                                    <input type="date" placeholder="" class="form-control" name="birth_date">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
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
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Tribal *</label>
                                    <select class="select2" name="tribal">
                                            <option value="">Select Tribal</option>
                                            <option value="Chakma">Chakma</option>
                                            <option value="Marma">Marma</option>
                                            <option value="Tanchangya">Tanchangya</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Rakhain">Rakhain</option>
                                            <option value="Bawm">Bawm</option>
                                            <option value="Chak">Chak</option>
                                            <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Nationality</label>
                                    <input type="text" placeholder="" class="form-control" name="nationality">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student NID/ Birth Certificate No</label>
                                    <input type="text" placeholder="" class="form-control" name="national_id">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Category</label>
                                    <select class="select2" name="category_id">
                                            <option value="1">Regular</option>
                                            <option value="2">Irregular</option>
                                            <option value="3">Improvement</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Shift</label>
                                    <select class="select2" name="shift">
                                            <option value="1">Morning Shift</option>
                                            <option value="2">Day Shift</option>
                                    </select>
                                </div>

                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Guardian Info</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's Name *</label>
                                    <input type="text" placeholder="" class="form-control" name="father_name">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Mother's Name *</label>
                                    <input type="text" placeholder="" class="form-control" name="mother_name">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's Occupation</label>
                                    <input type="text" placeholder="" class="form-control" name="father_occupation">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Mother's Occupation</label>
                                    <input type="text" placeholder="" class="form-control" name="mother_occupation">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's Phone</label>
                                    <input type="text" placeholder="" class="form-control" name="father_phone">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Mother's Phone</label>
                                    <input type="text" placeholder="" class="form-control" name="mother_phone">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Father's NID</label>
                                    <input type="text" placeholder="" class="form-control" name="father_nid">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Mother's NID</label>
                                    <input type="text" placeholder="" class="form-control" name="mother_nid">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>SMS Alert Phone *</label>
                                    <input type="text" placeholder="" class="form-control" name="sms_alert_phone">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Local Guardian name *</label>
                                    <input type="text" placeholder="" class="form-control" name="guardian_name">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Relation with Student *</label>
                                    <input type="text" placeholder="" class="form-control" name="student_relation">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
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

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Guardian Yearly Income</label>
                                    <input type="text" placeholder="" class="form-control" name="yearly_income">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address</label>
                                    <textarea class="form-control"  name="guardian_address"></textarea>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Post Office</label>
                                    <input type="text" placeholder="" class="form-control" name="guardian_po">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District</label>
                                    <select class="select2 guardian-thana-list-action" name="guardian_district_list_id">
                                        <option value="">----Select District----</option>
                                        @if(!empty($districtList))
                                            @foreach($districtList as $item)
                                                <option value="{{$item->district_list_id}}">{{$item->district_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Thana</label>
                                    <select class="select2 guardian-thana-list" name="guardian_thana_list_id">
                                            <option value="">----Select Thana----</option>
                                    </select>
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Permanent Address</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address *</label>
                                    <textarea class="form-control"  name="permanent_address"></textarea>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Post Office</label>
                                    <input type="text" placeholder="" class="form-control" name="permanent_po">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District33</label>
                                    <select class="select2 permanent-address-thana-list-action" name="permanent_district_list_id">
                                        <option value="">----Select District----</option>
                                        @if(!empty($districtList))
                                            @foreach($districtList as $item)
                                                <option value="{{$item->district_list_id}}">{{$item->district_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Thana</label>
                                    <select class="select2 permanent-address-thana-list" name="permanent_thana_list_id">
                                    </select>
                                </div>

                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Present Address</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address *</label>
                                    <textarea class="form-control"  name="present_address"></textarea>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Post Office</label>
                                    <input type="text" placeholder="" class="form-control" name="present_po">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District</label>
                                    <select class="select2 present-address-thana-list-action" name="present_district_list_id">
                                        <option value="">----Select District----</option>
                                        @if(!empty($districtList))
                                            @foreach($districtList as $item)
                                                <option value="{{$item->district_list_id}}">{{$item->district_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Thana</label>
                                    <select class="select2 present-address-thana-list" name="present_thana_list_id">
                                        <option value="">----Select Thana----</option>
                                    </select>
                                </div>
                                </div>

                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Other Info</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is Scholarship Holder</label>
                                    <select class="select2" name="is_scholarship">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is TC</label>
                                    <select class="select2 tc-option" name="is_tc">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group tc-group-section d-none">
                                    <label>Institute Name</label>
                                    <input type="text" placeholder="" class="form-control" name="tc_institute_name">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group tc-group-section d-none">
                                    <label>Issue Date</label>
                                    <input type="text" placeholder="" class="form-control" name="tc_issue_date">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group tc-group-section d-none">
                                    <label>Memo No.</label>
                                    <input type="text" placeholder="" class="form-control" name="tc_memo_no">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Blood Group</label>
                                    <select class="select2" name="blood_group">
                                            <option value="">select</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB−">AB−</option>
                                            <option value="B+">B+</option>
                                            <option value="B−">B−</option>
                                            <option value="A+">A+</option>
                                            <option value="A−">A−</option>
                                            <option value="O+">O+</option>
                                            <option value="O−">O−</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="" class="form-control" name="email">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Payable Amount</label>
                                    <input type="text" placeholder="" class="form-control" name="payable_amount">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Punch Card ID</label>
                                    <input type="text" placeholder="" class="form-control" name="punch_id">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is Autistic</label>
                                    <select class="select2 autistic-option" name="is_autistic">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group autistic-section d-none">
                                    <label>Autistic Type</label>
                                    <select class="select2" name="autistic_type">
                                            <option value="">Select Autistic Type</option>
                                            <option value="Visually impaired">Visually impaired</option>
                                            <option value="Hearing Impairment">Hearing Impairment</option>
                                            <option value="Physical Disabilities">Physical Disabilities</option>
                                            <option value="Intellectually">Intellectually</option>
                                            <option value="Speech Disabilities">Speech Disabilities</option>
                                            <option value="Others">Others</option>
                                    </select>
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Student Image</label>
                                    <input type="file" placeholder="" class="form-control" name="student_image">
                                </div>


                            </div>

                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
                                        Save
                                    </button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Account Settings Area End Here -->

    </div>
@endsection

@push('script')
<script>
    // tc-group-section

    $(document).on('change', '.tc-option', function() {
        if(this.value == 1){
            $(".tc-group-section").removeClass('d-none');
        }else{
            $(".tc-group-section").addClass('d-none');
        }
    });

    $(document).on('change', '.autistic-option', function() {
        if(this.value == 1){
            $(".autistic-section").removeClass('d-none');
        }else{
            $(".autistic-section").addClass('d-none');
        }
    });


    $(document).on('change', '.guardian-thana-list-action', function() {
      commonAjax('get','{{route('get-thana-list-by-district')}}',guardianThanaRes, guardianThanaRes,{'district_id':$(this).val()});
    });

    function guardianThanaRes(response){
        console.log(response);
        if(response.status == true){
            $(".guardian-thana-list").html(response.data);
        }
    }

    $(document).on('change', '.permanent-address-thana-list-action', function() {
      commonAjax('get','{{route('get-thana-list-by-district')}}',permanentAddressThanaRes, permanentAddressThanaRes,{'district_id':$(this).val()});
    });

    function permanentAddressThanaRes(response){
        console.log(response);
        if(response.status == true){
            $(".permanent-address-thana-list").html(response.data);
        }
    }

    $(document).on('change', '.class-action', function() {
        console.log($('#classAction').find('option[value="' + $(this).val() + '"]').attr('data-group'));
        var status = $('#classAction').find('option[value="' + $(this).val() + '"]').attr('data-group');
        if(status == 1){
            $("#classGroup").val(1);
            $("#groupShow").removeClass('d-none');
            $("#group_id").prop('disabled', false);
        }else{
            $("#classGroup").val(0);
            $("#groupShow").addClass('d-none');
            $("#group_id").prop('disabled', true);
        }
    });

    $(document).on('change', '.present-address-thana-list-action', function() {
        commonAjax('get','{{route('get-thana-list-by-district')}}',presentAddressThanaRes, presentAddressThanaRes,{'district_id':$(this).val()});
    });

    function presentAddressThanaRes(response){
        console.log(response);
        if(response.status == true){
            $(".present-address-thana-list").html(response.data);
        }
    }

</script>
@endpush

