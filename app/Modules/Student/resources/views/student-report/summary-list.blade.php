<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student-summary-list</title>
    <link rel="stylesheet" href="{{asset('admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/style.css">

</head>
<body>

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div id="printableArea" class="p-3 bg-white rounded">
                <div class="pb-33">
                    <a href="{{route('dashboard')}}"><img class="w-25" src="{{asset(getOption('logo'))}}" alt="logo"></a>

                    <div class="text-center">
                        <h4 class="text-28 font-semibold lh-22 text-1b1c17 mb-1">{{getOption('school_name')}}</h4>
                        <h5 class="text-19 font-semibold lh-22 text-1b1c17 mb-1">{{getOption('address')}}</h5>
                        <h5 class="text-19 font-semibold lh-22 text-1b1c17 pb-20">Session Wise Student Summary Report of {{$session->exam_year}}</h5>

                    </div>
                    <div class="table-responsive pt-4">
                        <table class="table zTable zTable-2">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Class</th>
                                <th scope="col">Department</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Total Active</th>
                                <th scope="col">Total Inactive</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($summaryList as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>

                                    @if ($value->class_id == 1)
                                        <td>Eleven</td>
                                    @elseif ($value->class_id == 2)
                                        <td>Twelve</td>
                                    @elseif ($value->class_id == 3)
                                        <td>Play</td>
                                    @elseif ($value->class_id == 4)
                                        <td>Tan</td>
                                    @endif

                                    <td>Department</td>

                                    @if ($value->shift == 1)
                                        <td>Morning Shift</td>
                                    @else
                                        <td>Day Shift</td>
                                    @endif

                                    <td>{{$value->status == 1 ? $value->status : 0}}</td>

                                    <td>{{$value->status == 0 ? $value->status : 0}}</td>

                                    <td>{{$value->status == 1 ? $value->status : 0}}</td>
                                </tr>
                            @empty
                                <tr class="text-center"><td colspan="7">{{ __('No data found') }}</td></tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class=" form-group mg-t-8 text-right">
                        <a href="{{url()->previous()}}" type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">
                            Back
                        </a>
                        <button type="button" class="btn-fill-lg bg-blue-dark btn-hover-yellow printBTN">Print
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('admin')}}/js/jquery-3.3.1.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('admin')}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>

    <script>
        (function ($) {
            "use strict";

            $(".printBTN").click(function(){
                printDiv();
            });

            window.printDiv = function () {
                var printContents = document.getElementById('printableArea').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            };
        })(jQuery)
    </script>
</body>
</html>
