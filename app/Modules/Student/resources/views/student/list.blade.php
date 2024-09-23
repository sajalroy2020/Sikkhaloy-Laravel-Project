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
                        <h3>All Student</h3>
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
                        <a href="{{route('student.add')}}" type="text" class="fw-btn-fill btn-gradient-yellow" >Add Student
                        </a>
                    </div>
                    <div class="form-group" style="margin-left: 10px;">
                        <a href="{{route('student.import')}}" type="text" class="fw-btn-fill btn-gradient-yellow" >Import
                        </a>
                    </div>

                    <div class="form-group" style="margin-left: 10px;">
                        <a href="{{route('student.bulk.update')}}" type="text" class="fw-btn-fill btn-gradient-yellow" >Bulk Update
                        </a>
                    </div>

                </div>
                <div class="">
                    <table class="table display text-nowrap" id="stdListTable">
                        <thead>
                        <tr>
                            <th>
                                SN
                            </th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Nationality</th>
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

@endsection

@push('script')
    <script>
        var dataTable
        $(document).on('input', '#classSearch', function () {
            dataTable.search($(this).val()).draw();
        });

        dataTable = $("#stdListTable").DataTable({
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
            ajax: "{{route('student.list')}}",
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": 'DT_RowIndex', "name": 'DT_RowIndex', searchable: false},
                {"data": "student_id", "name": "tbl_student.student_id"},
                {"data": "student_name", "name": "tbl_student.student_name"},
                {"data": "gender", "name": "tbl_student.gender"},
                {"data": "religion", "name": "tbl_student.religion"},
                {"data": "nationality", "name": "tbl_student.nationality"},
                {"data": "action"}
            ]

        });
    </script>
@endpush

