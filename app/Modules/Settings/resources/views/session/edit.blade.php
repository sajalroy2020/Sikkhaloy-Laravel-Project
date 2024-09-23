<div class="modal-body">
    <div class="close-btn">
        <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="item-logo">
        Edit Session
    </div>
    <form class="login-form ajax reset" action="{{ route('settings-session.store') }}"
          method="post"
          data-handler="commonResponse">
        @csrf
        <div class="row gutters-15">
            <input type="hidden" value="{{encrypt($sessionData->session_id)}}" name="id">
            <div class="form-group col-12">
                <label>Session Name *</label>
                <input type="text" placeholder="" class="form-control" name="session_name" value="{{$sessionData->session_name}}">
            </div>
            <div class="form-group col-12">
                <label>Session Name(Bangla/Arabic) *</label>
                <input type="text" placeholder="" class="form-control" name="session_name_bangla" value="{{$sessionData->session_name_bangla}}">
            </div>
            <div class="form-group col-12">
                <label>Exam Year *</label>
                <input type="text" placeholder="" class="form-control" name="exam_year" value="{{$sessionData->exam_year}}">
            </div>

            <div class="form-group col-12">
                <label>Is Used On Online Admission Form *</label>
                <select class="select2" name="is_used">
                    <option value="1" {{$sessionData->is_used == 1?'selected':''}}>Yes</option>
                    <option value="0" {{$sessionData->is_used == 0?'selected':''}}>No</option>
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
