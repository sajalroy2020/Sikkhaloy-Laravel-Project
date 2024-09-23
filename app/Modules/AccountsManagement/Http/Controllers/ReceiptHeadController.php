<?php

namespace App\Modules\AccountsManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Accountsmanagement\Models\TblReceiptSide;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptHeadController extends Controller
{
    use ResponseTrait;
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    //class part start
    public function list(Request $request)
    {
        $data['pageTitle'] = "Receipt Head List";
        $data['activeAccountsManagement'] = "sub-group-active";
        $data['activeReceiptHeadClass'] = "menu-active";

        if ($request->ajax()) {
            $data = TblReceiptSide::where('status', STATUS_ACTIVE)->get();

            return datatables($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(47px, 51px, 0px);">
                                    <a href="'.route('student.edit',$data->receipt_side_id).'" class="dropdown-item"><i class="fas fa-cogs text-dark-pastel-green" ></i>Edit</a>
                                    <a class="dropdown-item" href="#" onclick="deleteItem(\'' . route('student.delete', $data->receipt_side_id) . '\', \'stdListTable\')"><i class="fas fa-times text-orange-red"></i>Delete</a>
                                    <a class="dropdown-item" href="'.route('student.view',$data->receipt_side_id).'"><i class="fas fa-times text-orange-red"></i>Print</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("AccountsManagement::receipt-head.list", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'receipt_head_name' => 'required',
            'opening_balance' => 'required',
        ]);

        DB::beginTransaction();
        try {
            if ($request->id) {
                $dataObj = TblReceiptSide::find($request->id);
                $msg = __(UPDATED_SUCCESSFULLY);
            } else {
                $dataObj = new TblReceiptSide();
                $msg = __(CREATED_SUCCESSFULLY);
            }

            $dataObj->receipt_side_name = $request->receipt_head_name;
            $dataObj->opening_balance = $request->opening_balance;
            $dataObj->status = 1;
            $dataObj->save();

        DB::commit();
        // return view("Student::student-report.summary-list");
        return $this->success([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $dataObj = TblReceiptSide::find($id);
            $dataObj->delete();

        DB::commit();
        return $this->success([], DELETED_SUCCESSFULLY);
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->error([], $exception->getMessage());
        }
    }


}
