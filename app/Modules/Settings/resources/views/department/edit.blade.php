<div class="modal-body">
    <div class="close-btn">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="item-logo">
        Edit Department
    </div>
    <form class="login-form ajax reset" action="{{ route('settings-department.store') }}"
          method="post"
          data-handler="commonResponse">
        @csrf
        <div class="row gutters-15">
            <input type="hidden" value="{{encrypt($departmentData->department_id)}}" name="id">
            <div class="form-group col-12">
                <label>Department/Section Name *</label>
                <input type="text" placeholder="" class="form-control" name="department_name" value="{{$departmentData->department}}">
            </div>
            <div class="form-group col-12">
                <label>Department/Section Name(Bangla) *</label>
                <input type="text" placeholder="" class="form-control" name="bangla_name" value="{{$departmentData->bangla_name}}">
            </div>
            <div class="form-group col-12">
                <label>Department/Section No *</label>
                <input type="text" placeholder="" class="form-control" name="department_no" value="{{$departmentData->department_no}}">
            </div>

            <div class="form-group col-12">
                <label>Department/Section Type *</label>
                <select class="select2" name="department_type">
                    <option value="1" {{$departmentData->department_type == 1?'selected':''}}>Department</option>
                    <option value="2" {{$departmentData->department_type == 2?'selected':''}}>Group</option>
                    <option value="3" {{$departmentData->department_type == 3?'selected':''}}>Section</option>
                    <option value="4" {{$departmentData->department_type == 4?'selected':''}}>Course</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Is Used On Online Admission Form *</label>
                <select class="select2" name="is_used">
                    <option value="1" {{$departmentData->is_used == 1?'selected':''}}>Yes</option>
                    <option value="0" {{$departmentData->is_used == 0?'selected':''}}>No</option>
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
