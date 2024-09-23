@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')
    <style>
        .hr-lines:before {
            content: " ";
            display: block;
            height: 2px;
            width: 130px;
            position: absolute;
            top: 50%;
            left: 0;
            background: red;
        }

    </style>
@endpush

@section('content')
    <div class="dashboard-content-one">
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Institute Information</h3>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Account Settings Area Start Here -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>Update Information</h3>
                            </div>

                        </div>
                        <form class="new-added-form ajax" action="{{ route('institute.information.update') }}"
                              method="post"
                              data-handler="commonResponse">
                            @csrf
                                <input type="hidden" name="id" value="{{$instituteData?->school_id}}">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Institute Name *</label>
                                    <input type="text" placeholder="" class="form-control" name="institute_name" value="{{$instituteData?->school_name}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Institute Name (Bangla) *</label>
                                    <input type="text" placeholder="" class="form-control"
                                           name="institute_name_bangla" value="{{$instituteData?->bangla_name}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Institute Title</label>
                                    <input type="text" placeholder="" class="form-control" name="institute_title" value="{{$instituteData?->school_title}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Establish</label>
                                    <input type="text" placeholder="" class="form-control" name="establish" value="{{$instituteData?->establish}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Institute Type</label>
                                    <select class="select2" name="institute_type">
                                        <option value="">---Select One---</option>
                                        <option value="1" {{$instituteData?->institute_type == 1?'selected':''}}>School</option>
                                        <option value="2" {{$instituteData?->institute_type == 2?'selected':''}}>College</option>
                                        <option value="3" {{$instituteData?->institute_type == 3?'selected':''}}>School & College</option>
                                        <option value="4" {{$instituteData?->institute_type == 4?'selected':''}}>Polytechnic Institution</option>
                                        <option value="5" {{$instituteData?->institute_type == 5?'selected':''}}>Madrasha</option>
                                        <option value="6" {{$instituteData?->institute_type == 6?'selected':''}}>University</option>
                                        <option value="7" {{$instituteData?->institute_type == 7?'selected':''}}>Coaching Center</option>
                                        <option value="8" {{$instituteData?->institute_type == 8?'selected':''}}>Qwami Madrasah</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is Government</label>
                                    <select class="select2" name="is_government">
                                        <option value="0" {{$instituteData?->is_government == 0?'selected':''}}>No</option>
                                        <option value="1" {{$instituteData?->is_government == 1?'selected':''}}>Yes</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Shift</label>
                                    <select class="select2" name="shift">
                                        <option value="1" {{$instituteData?->shift == 1?'selected':''}}>Morning</option>
                                        <option value="2" {{$instituteData?->shift == 2?'selected':''}}>Evening</option>
                                        <option value="3" {{$instituteData?->shift == 3?'selected':''}}>Both</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Under Which Board</label>
                                    <select class="select2" name="under_board">
                                        <option value="Barisal" {{$instituteData?->under_board == 'Barisal'?'selected':''}}>Barisal</option>
                                        <option value="Chittagong" {{$instituteData?->under_board == 1?'selected':''}}>Chittagong</option>
                                        <option value="Comilla" {{$instituteData?->under_board == 'Chittagong'?'selected':''}}>Comilla</option>
                                        <option value="Dhaka" {{$instituteData?->under_board == 'Dhaka'?'selected':''}}>Dhaka</option>
                                        <option value="Dinajpur" {{$instituteData?->under_board == 'Dinajpur'?'selected':''}}>Dinajpur</option>
                                        <option value="Jessore" {{$instituteData?->under_board == 'Jessore'?'selected':''}}>Jessore</option>
                                        <option value="Rajshahi" {{$instituteData?->under_board == 'Rajshahi'?'selected':''}}>Rajshahi</option>
                                        <option value="Sylhet" {{$instituteData?->under_board == 'Sylhet'?'selected':''}}>Sylhet</option>
                                        <option value="Madrasah" {{$instituteData?->under_board == 'Madrasah'?'selected':''}}>Madrasah</option>
                                        <option value="Technical" {{$instituteData?->under_board == 'Technical'?'selected':''}}>Technical</option>
                                        <option value="DIBS" {{$instituteData?->under_board == 'DIBS'?'selected':''}}>DIBS(Dhaka)</option>
                                        <option value="BEFAQ" {{$instituteData?->under_board == 'BEFAQ'?'selected':''}}>BEFAQ</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School Code</label>
                                    <input type="text" placeholder="" class="form-control" name="school_code" value="{{$instituteData?->registration_no}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>EIIN Number</label>
                                    <input type="text" placeholder="" class="form-control" name="eiin_number" value="{{$instituteData?->eiin_no}}">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Username</label>
                                    <input type="text" placeholder="" class="form-control" name="user_name" value="{{$instituteData?->user_name}}">
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="" class="form-control" name="address" value="{{$instituteData?->address}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address (Bangla/Arabic)</label>
                                    <input type="text" placeholder="" class="form-control" name="address__bangla" value="{{$instituteData?->address_2}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Post Office</label>
                                    <input type="text" placeholder="" class="form-control" name="post_office" value="{{$instituteData?->post_office}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Post Office (Bangla/Arabic)</label>
                                    <input type="text" placeholder="" class="form-control" name="post_office_bangla" value="{{$instituteData?->post_office_2}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Police Station</label>
                                    <input type="text" placeholder="" class="form-control" name="police_station" value="{{$instituteData?->police_station}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Police Station(Bangla/Arabic)</label>
                                    <input type="text" placeholder="" class="form-control" name="police_station_bangla" value="{{$instituteData?->police_station_2}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District</label>
                                    <input type="text" placeholder="" class="form-control" name="district" value="{{$instituteData?->district}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>District(Bangla/Arabic)</label>
                                    <input type="text" placeholder="" class="form-control" name="district_bangla" value="{{$instituteData?->district_2}}">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Contact No</label>
                                    <input type="text" placeholder="" class="form-control" name="contact_no" value="{{$instituteData?->contact_no}}">
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>E-Mail</label>
                                    <input type="email" placeholder="" class="form-control" name="email" value="{{$instituteData?->email}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Website</label>
                                    <input type="text" placeholder="" class="form-control" name="website" value="{{$instituteData?->website}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Facebook Link</label>
                                    <input type="text" placeholder="" class="form-control" name="facebook" value="{{$instituteData?->facebook_link}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Twitter Link</label>
                                    <input type="text" placeholder="" class="form-control" name="twitter" value="{{$instituteData?->twitter_link}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Google Maps</label>
                                    <input type="text" placeholder="" class="form-control" name="google_maps" value="{{$instituteData?->google_maps}}">
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Website Language *</label>
                                    <select class="select2" name="website_language">
                                        <option value="1" {{$instituteData?->language == 1?'selected':''}}>English</option>
                                        <option value="2" {{$instituteData?->language == 2?'selected':''}}>Bangla</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admin Dashboard Language *</label>
                                    <select class="select2" name="admin_dashboard_language">
                                        <option value="1" {{$instituteData?->admin_language == 1?'selected':''}}>English</option>
                                        <option value="2" {{$instituteData?->admin_language == 2?'selected':''}}>Bangla</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is Tribal *</label>
                                    <select class="select2" name="is_tribal">
                                        <option value="1" {{$instituteData?->is_tribal == 1?'selected':''}}>Yes</option>
                                        <option value="0" {{$instituteData?->is_tribal == 0?'selected':''}}>No</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Attendance Type *</label>
                                    <select class="select2" name="attendance_type">
                                        <option value="1" {{$instituteData?->attendance_type == 1?'selected':''}}>Manually</option>
                                        <option value="2" {{$instituteData?->attendance_type == 2?'selected':''}}>Automatic (Machine)</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Result Format *</label>
                                    <select class="select2" name="result_format">
                                        <option value="1" {{$instituteData?->result_format == 1?'selected':''}}>Individual Exam Marks</option>
                                        <option value="2" {{$instituteData?->result_format == 2?'selected':''}}>% From Terminal Exam</option>
                                        <option value="3" {{$instituteData?->result_format == 3?'selected':''}}>% Terminal Exam(Individual)</option>
                                        <option value="4" {{$instituteData?->result_format == 4?'selected':''}}>Average From Terminal Exam</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>First Institute Name *</label>
                                    <select class="select2" name="first_institute_name">
                                        <option value="0" {{$instituteData?->first_institute_name == 0?'selected':''}}>Bangla</option>
                                        <option value="1" {{$instituteData?->first_institute_name == 1?'selected':''}}>English</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Is Institute Info Show In Banner?</label>
                                    <select class="select2" name="is_info_show_in_banner">
                                        <option value="1" {{$instituteData?->is_info_show == 1?'selected':''}}>Yes</option>
                                        <option value="0" {{$instituteData?->is_info_show == 0?'selected':''}}>No</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Roll/Serial</label>
                                    <select class="select2" name="is_roll">
                                        <option value="0" {{$instituteData?->is_roll == 0?'selected':''}}>Roll</option>
                                        <option value="1" {{$instituteData?->is_roll == 1?'selected':''}}>Serial</option>
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject Type Name-1</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_name_1" value="{{$instituteData?->sub_type_name_1}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject Type Name-2</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_name_2" value="{{$instituteData?->sub_type_name_2}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject Type Name-3</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_name_3" value="{{$instituteData?->sub_type_name_3}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Subject Type Name-4</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_name_4" value="{{$instituteData?->sub_type_name_4}}">
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Short Form-1</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_short_1" value="{{$instituteData?->sub_type_short_1}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Short Form-2</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_short_2" value="{{$instituteData?->sub_type_short_2}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Short Form-3</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_short_3" value="{{$instituteData?->sub_type_short_3}}">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Short Form-4</label>
                                    <input type="text" placeholder="" class="form-control" name="sub_type_short_4" value="{{$instituteData?->sub_type_short_4}}">
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <div class="zForm-wrap zImage-upload-details">
                                        <div class="zImage-inside">
                                            <div class="d-flex pb-12"><img
                                                    src="{{asset('assets/icon/cloud-upload.svg')}}" alt="">
                                            </div>
                                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                &amp; {{__("drop files here")}}</p>
                                        </div>
                                        <label for="zImageUpload"
                                               class="sf-form-label">{{__("New Logo")}}</label>
                                        <div class="upload-img-box">
                                            @if($instituteData?->logo)
                                                <img src="{{ asset($instituteData?->logo) }}"/>
                                            @else
                                                <img src="">
                                            @endif
                                            <input type="file" name="logo" id="zImageUpload1"
                                                   accept="image/*" onchange="previewFile(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <div class="zForm-wrap zImage-upload-details">
                                        <div class="zImage-inside">
                                            <div class="d-flex pb-12"><img
                                                    src="{{asset('assets/icon/cloud-upload.svg')}}" alt="">
                                            </div>
                                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                &amp; {{__("drop files here")}}</p>
                                        </div>
                                        <label for="zImageUpload"
                                               class="sf-form-label">{{__("New Logo-2")}}</label>
                                        <div class="upload-img-box">
                                            @if($instituteData?->logo2)
                                                <img src="{{ asset($instituteData?->logo2) }}"/>
                                            @else
                                                <img src="">
                                            @endif
                                            <input type="file" name="logo2" id="zImageUpload2"
                                                   accept="image/*" onchange="previewFile(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <div class="zForm-wrap zImage-upload-details">
                                        <div class="zImage-inside">
                                            <div class="d-flex pb-12">
                                                <img src="{{asset('assets/icon/cloud-upload.svg')}}" alt="">
                                            </div>
                                            <p class="fs-15 fw-500 lh-16 text-1b1c17">{{__("Drag")}}
                                                &amp; {{__("drop files here")}}</p>
                                        </div>
                                        <label for="zImageUpload"
                                               class="sf-form-label">{{__("New Signature")}}</label>
                                        <div class="upload-img-box">
                                            @if($instituteData?->signature)
                                                <img src="{{ asset($instituteData?->signature) }}"/>
                                            @else
                                                <img src="">
                                            @endif
                                            <input type="file" name="signature" id="zImageUpload3"
                                                   accept="image/*" onchange="previewFile(this)">
                                        </div>
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

@endpush

