<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
       $pages = $this->page::all();
       
       return view('admin.pages.index' , compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $pages = $this->page->create($request->all());
       return redirect(route('page.index'))->with('success' , 'تمت اضافة الصفحة ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = $this->page::whereSlug($slug)->first();
        return view('admin.pages.show' , compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $page = $this->page->find($id);
      return view('admin.pages.edit' , compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

       $this->page::find($id)->update($request->all());
       return redirect(route('page.index'))->with('success' , 'تم تعديل الصحفة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->page::find($id);
        $page->delete();
        return back()->with('success' , 'تم الحذف');
    }
}
