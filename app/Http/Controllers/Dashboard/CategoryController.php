<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCategoriesDatatable()
    {

        $data = Category::select('*')->with('parent');
        $data = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                return $btn = '
                <a href="'.Route('dashboard.category.edit',$row->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i><a/>
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
        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
