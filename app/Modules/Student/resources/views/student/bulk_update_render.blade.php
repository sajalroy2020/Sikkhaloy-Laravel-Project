<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            @foreach($request_property as $key=> $property)
                <th>{{ucwords(explode("_",$key)[1])}}</th>
            @endforeach
        </tr>
    </thead>

    <tbody id="all-student">
        @foreach($students as $key3=>$item)
            <tr>
                <input type="hidden" class="std_id" value="{{encrypt($item->id)}}" name="std_id">
                @foreach($request_property as $key2=>$property)
                    <td>
                        <div class="form-group" style="min-width: 50px;">
                            @if($key2 == 'check_class')
                                <select class="select2 class" name="class">
                                    <option value="">--Select Class--</option>
                                    @foreach($class as $item)
                                        <option
                                            value="{{$item->class_id}}" {{$item->tbl_std_class_class_id == $item->class_id?'selected':''}}>{{$item->class_name}}</option>
                                    @endforeach
                                </select>
                            @elseif($key2 == 'check_department')
                                <select class="select2 department" name="department">
                                    <option value="">---Select One---</option>
                                    @foreach($department as $item)
                                        <option
                                            value="{{$item->department_id}}" {{$item->tbl_std_department_id == $item->department_id?'selected':''}}>{{$item->department}}</option>
                                    @endforeach
                                </select>
                            @elseif($key2 == 'check_group')
                                <select class="select2 group" name="group">
                                    <option value="">---Select One---</option>
                                    @foreach($department as $item)
                                        <option
                                            value="{{$item->department_id}}" {{$item->tbl_std_department_id == $item->department_id?'selected':''}}>{{$item->department}}</option>
                                    @endforeach
                                </select>
                            @elseif($key2 == 'check_shift')
                                <select class="select2 shift" name="shift">
                                    <option value="">-- Select One --</option>
                                    <option value="1">Morning Shift</option>
                                    <option value="2">Day Shift</option>
                                </select>
                            @elseif($key2 == 'check_studentID')
                                <input type="text" placeholder="" class="form-control student_id"
                                    name="student_id">
                            @elseif($key2 == 'check_roll')
                                <input type="text" placeholder="" class="form-control roll_no"
                                    name="roll_no">
                            @elseif($key2 == 'check_name')
                                <input type="text" placeholder="" class="form-control student_name" name="student_name"
                                    value="">
                            @elseif($key2 == 'check_name_bn')
                                <input type="text" placeholder="" class="form-control student_name_bn" name="student_name_bn"
                                    value="">
                            @elseif($key2 == 'check_father_name')
                                <input type="text" placeholder="" class="form-control father_name" name="father_name"
                                    value="">
                            @elseif($key2 == 'check_father_name_bn')
                                <input type="text" placeholder="" class="form-control father_name_bn" name="father_name_bn"
                                    value="">
                            @elseif($key2 == 'check_father_occupation')
                                <input type="text" placeholder="" class="form-control father_occupation" name="father_occupation"
                                    value="">
                            @elseif($key2 == 'check_father_phone')
                                <input type="text" placeholder="" class="form-control father_phone" name="father_phone"
                                    value="">
                            @elseif($key2 == 'check_fatherNID')
                                <input type="text" placeholder="" class="form-control father_nid" name="father_nid"
                                    value="">
                            @elseif($key2 == 'check_mother_name')
                                <input type="text" placeholder="" class="form-control mother_name" name="mother_name"
                                    value="">
                            @elseif($key2 == 'check_mother_name_bn')
                                <input type="text" placeholder="" class="form-control mother_name_bn" name="mother_name_bn"
                                    value="">
                            @elseif($key2 == 'check_mother_occupation')
                                <input type="text" placeholder="" class="form-control mother_occupation" name="mother_occupation"
                                    value="">
                            @elseif($key2 == 'check_mother_phone')
                                <input type="text" placeholder="" class="form-control mother_phone" name="mother_phone"
                                    value="">
                            @elseif($key2 == 'check_motherNID')
                                <input type="text" placeholder="" class="form-control mother_nid" name="mother_nid"
                                    value="">
                            @elseif($key2 == 'check_SMS_alert_phone')
                                <input type="text" placeholder="" class="form-control sms_alert_phone" name="sms_alert_phone"
                                    value="">
                            @elseif($key2 == 'check_date_of_birth')
                                <input type="date" placeholder="" class="form-control date_of_birth" name="date_of_birth"
                                    value="">
                            @elseif($key2 == 'check_gender')
                                <select class="select2 gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            @elseif($key2 == 'check_blood_group')
                                <select class="select2 blood_group" name="blood_group">
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
                            @elseif($key2 == 'check_religion')
                                <select class="select2 religion" name="religion">
                                    <option value="">Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Others">Others</option>
                                </select>
                            @elseif($key2 == 'check_NID_Birth_certificate')
                                <input type="text" placeholder="" class="form-control national_id" name="national_id">
                            @elseif($key2 == 'check_category')
                                <select class="select2 category_id" name="category_id">
                                    <option value="1">Regular</option>
                                    <option value="2">Irregular</option>
                                    <option value="3">Improvement</option>
                                </select>
                            @elseif($key2 == 'check_image')
                                <input type="file" placeholder="" class="form-control student_image" name="student_image">
                            @endif
                        </div>
                    </td>

                @endforeach
                <td>
                    <button type="button" class="btn btn-primary student-update">Update</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

