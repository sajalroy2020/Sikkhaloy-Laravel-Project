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
        <div class="card height-auto mt-2">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>{{$pageTitle}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.summary')}}" class="nav-link px-5 text-secondary text-18"> Summary </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.details')}}" class="nav-link text-secondary px-5 text-18"> Details </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{route('student-report.student-list')}}" class="nav-link active font-medium px-5 text-secondary text-18"> Student Profile </a>
            </li>
        </ul>

        <div class="bg-white p-4">
            <h5 class="text-center pt-4 pb-3 text-24 font-medium">Student Info By ID</h5>
            <form class="new-added-form reset" action="{{ route('student-report.student-profile') }}"
                method="post" data-handler="commonResponse">
                @csrf
                <div class="form-group col-md-6 mx-auto">
                    <label>Student ID</label>
                    <input type="text" placeholder="Student id" class="form-control" name="student_id" required>
                </div>
                <div class="text-center py-3">
                    <button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow ">Submit</button>
                </div>
            </form>
        </div>

    </div>

@endsection
