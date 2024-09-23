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
    <div class="dashboard-content-one">
        <!-- Class Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>All Class</h3>
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
                    <div class="form-group">
                        <button type="text" class="fw-btn-fill btn-gradient-yellow" data-toggle="modal"
                                data-target="#classAddModal">Add Class
                        </button>
                    </div>
                </div>
                <div class="">
                    <table class="table display  text-nowrap" id="classListTable">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>Class Name</th>
                            <th>Class Name (Bangla)</th>
                            <th>Class No.</th>
                            <th>Number of Subject</th>
                            <th>Is Optional</th>
                            <th>Result Type</th>
                            <th>Passing Type</th>
                            <th>Marksheet Type</th>
                            <th>Class Type</th>
                            <th>Group Applicable</th>
                            <th>Group Applicable</th>
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
    <div class="modal sign-up-modal fade" id="classAddModal" tabindex="-1" role="dialog"
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
                    <div class="item-logo">
                        Add New Class
                    </div>
                    <form class="login-form ajax reset" action="{{ route('class.store') }}"
                          method="post"
                          data-handler="commonResponse">
                        @csrf
                        <div class="row gutters-15">
                            <div class="form-group col-12">
                                <label>Class Name *</label>
                                <input type="text" placeholder="" class="form-control" name="class_name">
                            </div>
                            <div class="form-group col-12">
                                <label>Class Name (Bangla) *</label>
                                <input type="text" placeholder="" class="form-control" name="class_name_bangla">
                            </div>
                            <div class="form-group col-12">
                                <label>Class No. *</label>
                                <input type="text" placeholder="" class="form-control" name="class_no">
                            </div>

                            <div class="form-group col-12">
                                <label>Number of Subject *</label>
                                <input type="text" placeholder="" class="form-control" name="number_of_subject">
                            </div>

                            <div class="form-group col-12">
                                <label>Is Government *</label>
                                <select class="select2" name="is_optional">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Result Type *</label>
                                <select class="select2" name="result_type">
                                    <option value="">Select Result Type</option>
                                    <option value="1">GPA</option>
                                    <option value="2">CGPA</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Passing Type *</label>
                                <select class="select2" name="passing_type">
                                    <option value="1">Total Marks</option>
                                    <option value="2">Individual Marks</option>
                                    <option value="3">Total Marks with CA</option>
                                    <option value="4">Individual Marks with CA</option>
                                    <option value="5">Individual Marks with 2 Subject Average</option>
                                    <option value="6">Individual Marks with 2 Subject Average- CA</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Marksheet Type *</label>
                                <select class="select2" name="marksheet_type">
                                    <option value="1">Number &amp; GPA</option>
                                    <option value="2">Only GPA</option>
                                    <option value="5">Individual Subject Pass Average</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Class Type *</label>
                                <select class="select2" name="class_type">
                                    <option value="">Select Class Type</option>
                                    <option value="1">Junior</option>
                                    <option value="2">Secondary</option>
                                    <option value="3">Higher Secondary</option>
                                    <option value="4">Honors</option>
                                    <option value="5">Degree</option>
                                    <option value="6">Masters</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Is Group Applicable? *</label>
                                <select class="select2" name="is_group">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label>Is Applicable for Online Admission *</label>
                                <select class="select2" name="is_used">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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
            </div>
        </div>
    </div>

    <!-- class edit modla -->
    <div class="modal sign-up-modal fade" id="classeditModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        var dataTable
        $(document).on('input', '#classSearch', function () {
            dataTable.search($(this).val()).draw();
        });

        dataTable = $("#classListTable").DataTable({
            pageLength: 10,
            ordering: false,
            serverSide: true,
            processing: true,
            responsive: true,
            searching: false,
            paging: true,
            language: {
                paginate: {
                    previous: "Previous",
                    next: "Next",
                },
                searchPlaceholder: "Search event",
                search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
            },
            ajax: "{{route('class.list')}}",
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": 'DT_RowIndex', "name": 'DT_RowIndex', searchable: false},
                {"data": "class_name", "name": "tbl_class.class_name"},
                {"data": "bangla_name"},
                {"data": "class_no"},
                {"data": "no_of_subject"},
                {"data": "is_optional"},
                {"data": "result_type"},
                {"data": "passing_type"},
                {"data": "marksheet_type"},
                {"data": "class_type"},
                {"data": "is_group"},
                {"data": "is_used"},
                {"data": "action"}
            ]

        });
    </script>
@endpush

