<?php

namespace App\Http\Controllers;

use App\Department;
use App\Event;
use App\EventPeople;
use App\Mail\EventMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Validator;

class EventController extends Controller
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
        $events = Event::orderBy('startDateTime','asc')->get();
        return view('alumni.event.event',['events'=>$events]);
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
        return view('alumni.event.create',['departments'=>$departments]);
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
            'event_place' => 'required|string',
            'department_id' => 'required',
        ]);
        try{
            Event::create([
                'title'=>$request['title'],
                'description'=>$request['description'],
                'event_place'=>$request['event_place'],
                'startDateTime'=>$request['startDateTime'],
                'user_id'=>Auth::id(),
                'department_id'=>$request['department_id'],
            ]);
            return redirect()->back()->with('success','Event Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
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
        $event = Event::where('id',$id)->first();
        return view('alumni.event.view',['event'=>$event]);
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
        $event = Event::where('id',$id)->first();
        return view('alumni.event.edit',['departments'=>$departments,'event'=>$event]);
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
            'event_place' => 'required|string',
        ]);
        try{
            Event::where('id',$id)->update([
                'title'=>$request['title'],
                'description'=>$request['description'],
                'event_place'=>$request['event_place'],
                'startDateTime'=>$request['startDateTime'],
                'department_id'=>empty($request->department_id) ? Auth::user()->department_id : $request['department_id'],
            ]);
            return redirect()->back()->with('success','Event Updated Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with([
                'html' => $e->getMessage(),
                'status' => 'error'
            ]);
        }
    }

    public function action(Request $request)
    {

        $event = EventPeople::where('event_id',$request['event_id'])->where('user_id',$request['user_id'])->where('action',$request['action'])->get()->count();
        //dd($request->all());
        if($event > 0){
            $errors = new MessageBag();
            $errors->add('action', 'You already selected this action');
            return [
                'html' => "Already Assigned",
                'status' => 'error'
            ];;
        }
        try{
            $already_added = EventPeople::where('event_id',$request['event_id'])->where('user_id',$request['user_id'])->first();
            if($already_added) {
                $already_added->update(['action'=>$request['action']]);
                return [
                    'html' => "Success to update",
                    'status' => 'success'
                ];
            }else{
                EventPeople::create(
                    [
                        'user_id' => $request['user_id'],
                        'event_id' => $request['event_id'],
                        'action' => $request['action']
                    ]
                );
                return [
                    'html' => "Success to saved",
                    'status' => 'success'
                ];
            }

        }catch (\Exception $e){
            return [
                'html' => $e->getMessage(),
                'status' => 'error'
            ];
        }


    }

    public function listActionPeople($id)
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $events = EventPeople::with('user')->where('event_id',$id)->get();
        return view('alumni.event.action',['events'=>$events]);
    }

    public function sendEmail($idss)
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $ids = explode('-',$idss);
        $user_id = $ids[0];
        $event_id = $ids[1];
        $user = User::where('id',$user_id)->first();
        return view('alumni.event.sendMail',['user'=>$user]);
    }

    public function sendEmailToUser(Request $request)
    {
        try{
            $toMail = $request->get('toMail');
            Mail::to($toMail)->send(new EventMail($request->all()));
            return redirect()->back()->with('success','Success to send mail');
        }catch (\Exception $e){
            return redirect()->back()->with('error',$e);
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
            Event::destroy($request->get('id'));
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
