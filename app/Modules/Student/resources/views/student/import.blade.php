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
            <h3>Import Student</h3>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Account Settings Area Start Here -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="new-added-form ajax reset" action="{{ route('student.import.store') }}"
                              method="post"
                              data-handler="commonResponse">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class">
                                        <option value="">--Select Class--</option>
                                        <option value="1">Eleven</option>
                                        <option value="2">Twelve</option>
                                        <option value="3">Play</option>
                                        <option value="4">Tan</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Section/Department *</label>
                                    <select class="select2" name="department">
                                        <option value="">---Select One---</option>
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class Year/Session *</label>
                                    <select class="select2" name="class_year">
                                        <option value="">---Select One---</option>
                                        <option value="1">2022-2023</option>
                                    </select>
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

                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Excel File</label>
                                    <input type="file" placeholder="" class="form-control" name="upload_file">
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
</script>
@endpush

