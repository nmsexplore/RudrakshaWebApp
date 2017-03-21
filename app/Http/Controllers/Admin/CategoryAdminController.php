<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Rudraksha\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryAdminController extends Controller
{

    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth:admin');
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allcategory= $this->categoryService->get_category();
       return view('category.index',compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($this->categoryService->store_category($request)) {
            return redirect()->route('category.index')->withSuccess("category added!");
        }
        return back()->withErrors("Something went wrong");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate=$this->categoryService->get_categoryby_Id($id);
        $cate_beni=$this->categoryService->get_category_benefit($id);
       return view('category.show',compact('cate','cate_beni'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_id=$this->categoryService->get_categoryby_Id($id);
        return view('category.edit',compact('cat_id'));
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
        if ($product = $this->categoryService->editcategory($request, $id)) {

            return redirect()->route('category.index')->withSuccess("category edited!");
        }
        return back()->withErrors('something went wrong');
    }


    /**
     * show form for the benefits creation
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBenefit($id)
    {
        return view('admin.benefit.create',compact('id'));
    }

    public function storeBenefit(Request $request)
    {
        if ($this->categoryService->store_category_benefit($request)) {
            return redirect()->route('category.index')->withSuccess("category Benefit added!");
        }
        return back()->withErrors("Something went wrong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
