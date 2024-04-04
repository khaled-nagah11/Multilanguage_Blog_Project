<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index');
    }
    public function create()
    {
        return view('dashboard.users.add');
    }

    public function getUsersDatatable()
    {

        $data = User::select('*');
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action',function ($row){
                return $btn = '
                <a href="'.Route('dashboard.users.edit',$row->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i><a/>
                <a id="deleteBtn" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
            })
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
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function store(StoreUserRequest $request)
    {

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
    public function edit(User $user)
    {
        return view('dashboard.users.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'nullable|string|email|max:255,',
//        ]);
        $user->update($request->all());
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request)
    {
        if (is_numeric($request->id))
        {
            User::where('id',$request->id)->delete();
        }
        return redirect()->route('dashboard.users.index');
    }

}
