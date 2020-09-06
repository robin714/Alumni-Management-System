<?php

namespace App\Http\Controllers;

use App\Department;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $notices = Notice::orderBy('created_at','desc')->get();
        return view('alumni.notice.notice',['notices'=>$notices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $departments = Department::orderBy('name','asc')->get();
        return view('alumni.notice.create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
        ]);
        try{
            Notice::create([
                'title'=>$request['title'],
                'description'=>$request['description'],
                'user_id'=>Auth::id(),
                'department_id'=>empty($request->department_id) ? Auth::user()->department_id : $request['department_id'],
            ]);
            return redirect()->back()->with('success','Notice Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with([
                'html' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::where('id',$id)->first();
        return view('alumni.notice.view',['notice'=>$notice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $departments = Department::orderBy('name','asc')->get();
        $notice = Notice::where('id',$id)->first();
        return view('alumni.notice.edit',['departments'=>$departments,'notice'=>$notice]);
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
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string',
        ]);
        try{
            Notice::where('id',$id)->update([
                'title'=>$request['title'],
                'description'=>$request['description'],
                'department_id'=>empty($request->department_id) ? Auth::user()->department_id : $request['department_id'],
            ]);
            return redirect()->back()->with('success','Notice Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with([
                'html' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        if(!Auth::check() || Auth::user()->role_id > 2){
            return redirect('/');
        }
        try{
            Notice::destroy($request->get('id'));
            return [
                'html' => "Success to delete",
                'status' => 'success'
            ];
        }catch (\Exception $e){
            return [
                'html' => "Somethig wrong, try again!",
                'status' => 'error'
            ];
        }
    }
}
