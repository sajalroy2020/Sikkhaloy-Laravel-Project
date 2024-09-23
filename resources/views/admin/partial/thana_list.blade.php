@if(!empty($thanaList))
    <option value="">----Select Thana----</option>
    @foreach($thanaList as $item)
        <option value="{{$item->thana_list_id}}">{{$item->thana_name}}</option>
    @endforeach
@endif
