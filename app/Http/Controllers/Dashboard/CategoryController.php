<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function getCategoriesDatatable()
    {

        $data = Category::select('*')->with('parents');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($row){
                return $btn = '
                <a href="'.Route('dashboard.category.edit',$row->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i><a/>
                <a id="deleteBtn" data-id="'.$row->id.'" class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('parent',function ($row) {
                return ($row->parent == 0) ? trans('words.main category') : $row->parents->translate(app()->getLocale())->title;
            })
            ->addColumn('title',function ($row){
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
            })
//
            ->rawColumns(['action', 'status' , 'title'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent')->orwhere('parent',0)->get();
        return view('dashboard.categories.add' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $category = category::create($request->except('image', '_token'));
        if ($request->file(''))
        {
            $file = $request->file('image');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $category->update(['image' => $path]);
        }
        return redirect()->route('dashboard.category.index');
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
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent')->orWhere('parent', 0)->get();
        return view('dashboard.categories.edit', compact('category', 'categories'));
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
    public function delete(Request $request)
    {
        if (is_numeric($request->id))
        {
            Category::where('parent',$request->id)->delete();
            Category::where('id',$request->id)->delete();
        }
        return redirect()->route('dashboard.category.index');
    }
}
