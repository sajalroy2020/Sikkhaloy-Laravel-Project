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
                        <h3>Receipt Head List</h3>
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
                        <button type="button" class="fw-btn-fill btn-gradient-yellow" id="add-receipt">Add Receipt
                        </button>
                    </div>
                </div>

                <div id="receipt-add-from" class="py-4 mb-3 mt-1" style="display: none;">
                    <form class="new-added-form ajax reset" action="{{ route('accounts-management.receipt-head-store') }}"
                              method="post"
                              data-handler="commonResponse">
                            @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12 form-group mx-auto">
                                <label>Receipt Head Name <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="receipt_head_name">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-6 col-12 form-group mx-auto">
                                <label>Opening Balance <span class="text-danger">*</span></label>
                                <input type="number" placeholder="0" class="form-control" name="opening_balance">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-2 col-md-2 col-lg-3 col-12 form-group mx-auto">
                                <button type="submit" class="fw-btn-fill btn-gradient-yellow">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="">
                    <table class="table display text-nowrap" id="receiptHeadListTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Date</th>
                            <th>Receipt Head Name</th>
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

@endsection

@push('script')
    <script>
        var dataTable
        $(document).on('input', '#classSearch', function () {
            dataTable.search($(this).val()).draw();
        });

        dataTable = $("#receiptHeadListTable").DataTable({
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
            ajax: "{{route('accounts-management.receipt-head-list')}}",
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": 'DT_RowIndex', "name": 'DT_RowIndex', searchable: false},
                {"data": "date", "name": "tbl_receipt_side.created_at"},
                {"data": "receipt_head_name", "name": "tbl_receipt_side.receipt_side_name"},
                {"data": "opening_balance", "name": "tbl_receipt_side.opening_balance"},
                {"data": "action"}
            ]

        });

        // data insurt from
        $(document).ready(function(){
            $('#add-receipt').click(function(){
                $('#receipt-add-from').toggle();
            });
        });
    </script>
@endpush

