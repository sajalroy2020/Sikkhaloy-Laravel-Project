<?php

namespace App\Modules\AccountsManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsManagementController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("AccountsManagement::welcome");
    }
}
