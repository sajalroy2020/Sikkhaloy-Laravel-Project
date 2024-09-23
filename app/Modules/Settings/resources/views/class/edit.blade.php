<div class="modal-body">
    <div class="close-btn">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="item-logo">
        Edit Class
    </div>
    <form class="login-form ajax reset" action="{{ route('class.store') }}"
          method="post"
          data-handler="commonResponse">
        @csrf
        <div class="row gutters-15">
            <input type="hidden" value="{{encrypt($classData->class_id)}}" name="id">
            <div class="form-group col-12">
                <label>Class Name *</label>
                <input type="text" placeholder="" class="form-control" name="class_name" value="{{$classData->class_name}}">
            </div>
            <div class="form-group col-12">
                <label>Class Name (Bangla) *</label>
                <input type="text" placeholder="" class="form-control" name="class_name_bangla"value="{{$classData->bangla_name}}">
            </div>
            <div class="form-group col-12">
                <label>Class No. *</label>
                <input type="text" placeholder="" class="form-control" name="class_no"value="{{$classData->class_no}}">
            </div>

            <div class="form-group col-12">
                <label>Number of Subject *</label>
                <input type="text" placeholder="" class="form-control" name="number_of_subject"value="{{$classData->no_of_subject}}">
            </div>

            <div class="form-group col-12">
                <label>Is Government *</label>
                <select class="select2" name="is_optional">
                    <option value="1" {{$classData->is_optional == 1?'Selected':''}}>Yes</option>
                    <option value="2" {{$classData->is_optional == 2?'Selected':''}}>No</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Result Type *</label>
                <select class="select2" name="result_type">
                    <option value="">Select Result Type</option>
                    <option value="1" {{$classData->result_type == 1?'Selected':''}}>GPA</option>
                    <option value="2" {{$classData->result_type == 2?'Selected':''}}>CGPA</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Passing Type *</label>
                <select class="select2" name="passing_type">
                    <option value="1" {{$classData->passing_type == 1?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Total Marks</option>
                    <option value="2" {{$classData->passing_type == 2?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Individual Marks</option>
                    <option value="3" {{$classData->passing_type == 3?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Total Marks with CA</option>
                    <option value="4" {{$classData->passing_type == 4?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Individual Marks with CA</option>
                    <option value="5" {{$classData->passing_type == 5?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Individual Marks with 2 Subject Average</option>
                    <option value="6" {{$classData->passing_type == 6?'Selected':''}} {{$classData->is_optional == 1?'Selected':''}}>Individual Marks with 2 Subject Average- CA</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Marksheet Type *</label>
                <select class="select2" name="marksheet_type">
                    <option value="1" {{$classData->marksheet_type == 1?'Selected':''}}>Number &amp; GPA</option>
                    <option value="2" {{$classData->marksheet_type == 2?'Selected':''}}>Only GPA</option>
                    <option value="5" {{$classData->marksheet_type == 5?'Selected':''}}>Individual Subject Pass Average</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Class Type *</label>
                <select class="select2" name="class_type">
                    <option value="">Select Class Type</option>
                    <option value="1" {{$classData->class_type == 1?'Selected':''}}>Junior</option>
                    <option value="2" {{$classData->class_type == 2?'Selected':''}}>Secondary</option>
                    <option value="3" {{$classData->class_type == 3?'Selected':''}}>Higher Secondary</option>
                    <option value="4" {{$classData->class_type == 4?'Selected':''}}>Honors</option>
                    <option value="5" {{$classData->class_type == 5?'Selected':''}}>Degree</option>
                    <option value="6" {{$classData->class_type == 6?'Selected':''}}>Masters</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Is Group Applicable? *</label>
                <select class="select2" name="is_group">
                    <option value="0" {{$classData->is_group == 0?'Selected':''}}>No</option>
                    <option value="1" {{$classData->is_group == 1?'Selected':''}}>Yes</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Is Applicable for Online Admission *</label>
                <select class="select2" name="is_used">
                    <option value="1" {{$classData->is_used == 1?'Selected':''}}>Yes</option>
                    <option value="0" {{$classData->is_used == 0?'Selected':''}}>No</option>
                </select>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="login-btn">Save</button>
                <button type="button" class="login-btn" data-dismiss="modal"
                        aria-label="Close">Close
                </button>
            </div>
        </div>
    </form>
</div>
