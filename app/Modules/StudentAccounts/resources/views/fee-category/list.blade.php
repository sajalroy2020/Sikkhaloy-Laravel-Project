@extends('layouts.app')
@push('title')
    {{$pageTitle}}
@endpush

@push('style')
<style>
    th:last-child, td:last-child {
        display: table-cell; /* Show last column for wider screens */
    }
</style>
@endpush

@section('content')
    <div class="dashboard-content-one mt-5">
        <!-- Class Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>{{$pageTitle}}</h3>
                    </div>

                </div>
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search" class="form-control" id="classSearch">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    </div>
                    <div class="form-group" >
                        <button type="text" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal"
                        data-target="#feeCategoryAdd">Add Fee
                        </button>
                    </div>
                </div>

                <div class="">
                    <table class="table display text-nowrap" id="receiptHeadListTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Fee Category</th>
                            <th>Short Form</th>
                            <th>Receipt Side</th>
                            <th>Is Monthly</th>
                            <th>Category Type</th>
                            <th>Main Category </th>
                            <th>Opening Balance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- class add modla -->
    <div class="modal sign-up-modal fade" id="feeCategoryAdd" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="item-title">
                        <h3>Fee Category Add</h3>
                    </div>
                    <form class="login-form ajax reset" action="{{ route('class.store') }}"
                          method="post"
                          data-handler="commonResponse">
                        @csrf
                        <div class="row gutters-15">
                            <div class="form-group col-12">
                                <label>Fee Category Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" name="class_name">
                            </div>
                            <div class="form-group col-12">
                                <label>Short Form  <span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" name="class_name_bangla">
                            </div>

                            <div class="form-group col-12">
                                <label>Is Monthly Payment <span class="text-danger">*</span></label>
                                <select class="select2" name="is_optional">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label>Receipt Side <span class="text-danger">*</span></label>
                                <select class="select2" name="is_optional">
                                    <option value="">Select Receipt Side</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label>Category Type <span class="text-danger">*</span></label>
                                <select class="select2" name="is_optional">
                                    <option value="1">Main Category</option>
                                    <option value="2">Sub Category</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Opening Balance <span class="text-danger">*</span></label>
                                <input type="number" placeholder="0.00" class="form-control" name="class_no">
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
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush

