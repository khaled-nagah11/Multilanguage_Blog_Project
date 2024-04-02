<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.add');
    }

    public function getUsersDatatable()
    {

        $data = User::select('*');
        return DataTables::of($data)->addIndexColumn()

//        if (auth()->user()->can('viewAny', $this->user)) {
//            $data = User::select('*');
//        }else{
//            $data = User::where('id' , auth()->user()->id);
//        }
//        return Datatables::of($data)
//            ->addIndexColumn()
//            ->addColumn('action', function ($row) {
//                $btn = '';
//                if (auth()->user()->can('update', $row)) {
//                    $btn .= '<a href="' . Route('dashboard.users.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
//                }
//                if (auth()->user()->can('delete', $row)) {
//                    $btn .= '
//
//                        <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
//                }
//                return $btn;
//            })
//            ->addColumn('status', function ($row) {
//                return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
//            })
//            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
