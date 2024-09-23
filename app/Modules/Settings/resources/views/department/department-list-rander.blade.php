<div class="table-responsive expenses-table-box bg-white p-5">
    <table class="table data-table text-nowrap border">
        <thead>
            <tr>
                <th>
                    Department/Section Name
                </th>
                <th>Department/Section No</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_departments as $value)
                @foreach ($departments as $department)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input name="department_id[]" {{$value->department_id == $department->departmentID ? 'checked' : ''}} value="{{$value->department_id}}" type="checkbox" class="form-check-input">
                                <label class="form-check-label">{{$value->department}}</label>
                            </div>
                        </td>
                        <td>{{$value->department_no}}</td>
                    </tr>
                @endforeach
            @endforeach

        </tbody>
    </table>
</div>
<div class="text-center py-3">
    <button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow ">Submit</button>
</div>
