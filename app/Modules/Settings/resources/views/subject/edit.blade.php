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
    <form class="login-form ajax reset" action="{{ route('settings-subject.store') }}"
          method="post"
          data-handler="commonResponse">
        @csrf
        <div class="row gutters-15">
            <input type="hidden" value="{{encrypt($subjectData->subject_id)}}" name="id">
            <div class="form-group col-12">
                <label>Subject Name *</label>
                <input type="text" placeholder="" class="form-control" name="subject_name" value="{{$subjectData->subject_name}}">
            </div>
            <div class="form-group col-12">
                <label>Subject Name (Bangla/Arabic) *</label>
                <input type="text" placeholder="" class="form-control" name="subject_name_bangla" value="{{$subjectData->subject_name_bangla}}">
            </div>
            <div class="form-group col-12">
                <label>Subject Code *</label>
                <input type="text" placeholder="" class="form-control" name="subject_code" value="{{$subjectData->subject_code}}">
            </div>

            <div class="form-group col-12">
                <label>Subject Short Form *</label>
                <input type="text" placeholder="" class="form-control" name="subject_short_form" value="{{$subjectData->subject_short_form}}">
            </div>
            <div class="form-group col-12">
                <label>Subject Short Form(Bangla/Arabic) *</label>
                <input type="text" placeholder="" class="form-control" name="subject_short_form_bangla" value="{{$subjectData->subject_short_form_bangla}}">
            </div>

            <div class="form-group col-12">
                <label>Is Optional *</label>
                <select class="select2" name="is_optional">
                    <option value="0" {{$subjectData->is_optional == 0?'selected':''}}>No</option>
                    <option value="1" {{$subjectData->is_optional == 1?'selected':''}}>Yes</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Is Additional *</label>
                <select class="select2" name="is_additional">
                    <option value="0" {{$subjectData->is_additional == 0?'selected':''}}>No</option>
                    <option value="1" {{$subjectData->is_additional == 1?'selected':''}}>Yes</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Is Paper 2 *</label>
                <select class="select2" name="is_paper_2">
                    <option value="0" {{$subjectData->is_paper_2 == 0?'selected':''}}>No</option>
                    <option value="1" {{$subjectData->is_paper_2 == 1?'selected':''}}>Yes</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>Marks Type *</label>
                <select class="select2" name="marks_type">
                    <option value="1" {{$subjectData->marks_type == 1?'selected':''}}>Subjective</option>
                    <option value="2" {{$subjectData->marks_type == 2?'selected':''}}>Subjective, Objective</option>
                    <option value="3" {{$subjectData->marks_type == 3?'selected':''}}>Subjective, Objective, Practical</option>
                    <option value="4" {{$subjectData->marks_type == 4?'selected':''}}>Subjective, Practical</option>
                    <option value="5" {{$subjectData->marks_type == 5?'selected':''}}>Objective, Practical</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Subject Priority No. *</label>
                <input type="text" placeholder="" class="form-control" name="subject_priority_no" value="{{$subjectData->subject_pn}}">
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
