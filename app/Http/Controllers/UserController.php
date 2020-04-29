<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function userdb()
    {
        return Datatables::of(User::query())
        // ->setRowClass(function ($user) {
        //     return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
        // })
        ->setRowId(function ($user) {
            return $user->id;
        })
        ->setRowClass('{{ $id % 2 == 0 ? "alert-success" : "alert-warning" }}')
        ->setRowAttr([
            'align' => 'center',
        ])
        ->setRowData([
            'data-name' => 'row-{{$name}}',
        ])
        ->addColumn('intro', function(User $user) {
            return 'Hi ' . $user->name . '!';
            //$user->role->name;
        })
        ->editColumn('created_at', function(User $user) {
            return $user->created_at->diffForHumans();
        })
        ->editColumn('updated_at', 'column')
        ->rawColumns(['updated_at'])
        ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
