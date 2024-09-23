<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TblThanaList;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class DistrictAndThanaController extends Controller
{
    use ResponseTrait;

    public function getThanaListByDistrict(Request $request)
    {
        try {
            //        $data['thanaList'] = TblThanaList::where(['school_id'=> auth()->user()->school_id, 'district_list_id'=> $request->district_id])->get();
            $data['thanaList'] = TblThanaList::where(['district_list_id' => $request->district_id])->get();
            $renderData = view('admin.partial.thana_list', $data)->render();
            return $this->success($renderData, 'success');

        } catch (\Exception $exception) {
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }
}
