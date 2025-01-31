<?php

namespace App\Modules\StudentAccounts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAccountsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("StudentAccounts::welcome");
    }
}
