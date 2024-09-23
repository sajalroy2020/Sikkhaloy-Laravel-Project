@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')

@endpush

@section('content')
    <div class="dashboard-content-one">

        <form class="new-added-form reset" action="{{route('settings-department.department-class-store')}}"
                        method="post" data-handler="commonResponse">
                        @csrf
            <!-- Class Table Area Start Here -->
            <div class="card height-auto mt-5">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title text-center w-100 pt-3">
                            <h3>{{$pageTitle}}</h3>
                        </div>
                    </div>

                    <div class="bg-white p-4">
                        <div class="form-group col-md-6 mx-auto">
                            <h5 class="pt-4 text-18 font-medium">Class Section/ Department Assign</h5>
                            <label>Class <span class="text-danger">*</span></label>
                            <select class="select2 class-list" name="class_id" required>
                                <option value="">-- Select One --</option>
                                @foreach ($class as $value)
                                    <option value="{{$value->class_id}}">{{$value->class_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="department-show">

                </div>

            </div>

        </form>

    </div>
    <input type="hidden" id="department-route" value="{{route('settings-department.get-department')}}">

@endsection

@push('script')
    <script>
        $(document).on('change', '.class-list', function () {
            commonAjax('get', $('#department-route').val(), getDepartment, getDepartment, {'class_id': $(this).val()});
        });

        function getDepartment(response) {
            if (response.status == 200) {
                $(".department-show").html(response.responseText);
            }
        }

    </script>
@endpush
