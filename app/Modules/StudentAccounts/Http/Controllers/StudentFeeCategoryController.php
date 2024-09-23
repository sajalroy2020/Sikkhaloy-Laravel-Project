<?php

namespace App\Modules\StudentAccounts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentFeeCategoryController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $data['pageTitle'] = "Fee Category List";
        $data['activeStudentAccount'] = "sub-group-active";
        $data['activeStudentAccountFeeCategoryClass'] = "menu-active";

        return view("StudentAccounts::fee-category.list", $data);
    }
}
