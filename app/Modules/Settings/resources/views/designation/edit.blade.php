<div class="modal-body">
    <div class="close-btn">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="item-logo">
        Edit Designation
    </div>
    <form class="login-form ajax reset" action="{{ route('settings-designation.store') }}"
          method="post"
          data-handler="commonResponse">
        @csrf
        <div class="row gutters-15">
            <input type="hidden" value="{{encrypt($designationData->designation_id)}}" name="id">
            <div class="form-group col-12">
                <label>Serial *</label>
                <input type="text" placeholder="" class="form-control" name="serial" value="{{$designationData->serial}}">
            </div>
            <div class="form-group col-12">
                <label>Designation Name *</label>
                <input type="text" placeholder="" class="form-control" name="designation_name" value="{{$designationData->designation_name}}">
            </div>
            <div class="form-group col-12">
                <label>Designation Name (Bangla) *</label>
                <input type="text" placeholder="" class="form-control" name="designation_name_bangla" value="{{$designationData->designation_name_bangla}}">
            </div>

            <div class="form-group col-12">
                <label>Is Vacant Post *</label>
                <select class="select2" name="is_vacant_post">
                    <option value="1" {{$designationData->is_vacant_post == 1?'selected':''}}>Yes</option>
                    <option value="2" {{$designationData->is_vacant_post == 2?'selected':''}}>No</option>
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
