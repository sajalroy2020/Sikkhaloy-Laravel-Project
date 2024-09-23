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

        <div class="card height-auto mt-5">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class=""></div>
                   <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                            <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="single-info-details">
                    <div class="item-img">
                        <img src="{{asset($student->image)}}" alt="student">
                    </div>
                    <div class="item-content">
                        <div class="header-inline item-header">
                            <h3 class="text-dark-medium font-medium">{{$student->student_name ? $student->student_name : 'N/A'}}</h3>
                            <div class="header-elements">
                                <ul>
                                    <li><a href="#"><i class="far fa-edit"></i></a></li>
                                    <li><a href="#"><i class="fas fa-print"></i></a></li>
                                    <li><a href="#"><i class="fas fa-download"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale
                        word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale
                        word moun taiery.</p>
                        <div class="info-table table-responsive">
                            <table class="table text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="font-medium text-dark-medium">{{$student->student_name ? $student->student_name : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td class="font-medium text-dark-medium">{{$student->gender ? $student->gender : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Father Name:</td>
                                        <td class="font-medium text-dark-medium">{{$student->father_name ? $student->father_name : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mother Name:</td>
                                        <td class="font-medium text-dark-medium">{{$student->mother_name ? $student->mother_name : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth:</td>
                                        <td class="font-medium text-dark-medium">{{$student->birth_date ? $student->birth_date : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Religion:</td>
                                        <td class="font-medium text-dark-medium">{{$student->religion ? $student->religion : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Father Occupation:</td>
                                        <td class="font-medium text-dark-medium">{{$student->father_occupation ? $student->father_occupation : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="font-medium text-dark-medium">{{$student->email ? $student->email : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Admission Date:</td>
                                        <td class="font-medium text-dark-medium">{{$student->date_of_admission ? $student->date_of_admission : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Class:</td>
                                        <td class="font-medium text-dark-medium"> 3
                                            {{-- {{$student->religion}} --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Section:</td>
                                        <td class="font-medium text-dark-medium">{{$student->department ? $student->department : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Roll:</td>
                                        <td class="font-medium text-dark-medium">{{$student->roll_no ? $student->roll_no : 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td class="font-medium text-dark-medium">{{$student->permanent_address ? $student->permanent_address: 'N/A'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td class="font-medium text-dark-medium">{{$student->student_phone ? $student->student_phone : 'N/A'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
