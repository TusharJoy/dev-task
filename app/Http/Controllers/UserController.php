<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UserTableHelper;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use UserTableHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getData(Request $request)
    {
        $users = User::query();
        $users = $this->filtering($request, $users);
        return Datatables::of($users)
            ->make(true);
    }
}
