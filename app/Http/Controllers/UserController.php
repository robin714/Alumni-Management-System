<?php


namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        $peoples = User::orderBy('created_at','desc')->get();
        return view('alumni.people',['peoples'=>$peoples]);
    }

    public function registration()
    {
        $departments = Department::orderBy('name','asc')->get();
        return view('auth.register',['departments'=>$departments]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'email' => 'required|string',
        ]);
        $user = array(
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        );
        if (Auth::attempt($user))
        {
            if(Auth::user()->status == User::DISABLE){
                Auth::logout();
                return redirect('login')
                    ->with('error','You are not active user, please contact with administrative')
                    ->withInput();
            }
            return redirect('/profile');
        }else{
            return redirect('login')
                ->with('error','Your username or password are incorrect please check it out')
                ->withInput();
        }
    }

    public function store(Request $data)
    {
        $data->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'min:11|max:14',
            'unique_id' => 'max:30'
        ]);
        try {
           $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'unique_id' => $data['unique_id'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'role_id' => $data['role_id'],
                'department_id' => $data['department_id'],
                'program' => $data['program'],
                'job' => $data['job'],
                'batch' => empty($data['batch']) ? null : $data['batch'],
            ]);
            return redirect('/user/view/'.$user->id);
        }catch (\Exception $e){
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        if(!Auth::check() || Auth::user()->role_id > 2){
            return redirect('/');
        }
        $departments = Department::orderBy('name','asc')->get();
        $user = User::where('id',$id)->first();
        return view('alumni.user-edit',['user'=>$user,'departments'=>$departments]);
    }
    function editProfile()
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $departments = Department::orderBy('name','asc')->get();
        $user = User::where('id',Auth::id())->first();
        return view('alumni.register-edit',['user'=>$user,'departments'=>$departments]);
    }

    public function update(Request $data, $id)
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $data->validate([
            'name' => 'string|min:3|max:100',
            'phone' => 'min:11|max:14',
            'unique_id' => 'max:30'
        ]);

        try{

            if(!empty($data['name']))
                $info['name'] = $data['name'];
            if(!empty($data['unique_id']))
                $info['unique_id'] = $data['unique_id'];
            $info['address'] = $data['address'];
            $info['phone'] = $data['phone'];
            if(!empty($data['role_id']))
                $info['role_id'] = $data['role_id'];
            if(!empty($data['department_id']))
                $info['department_id'] = $data['department_id'];
            if(!empty($data['program']))
                $info['program'] = $data['program'];
            if(!empty($data['job']))
                $info['job'] = $data['job'];
            if(!empty($data['batch']))
                $info['batch'] = $data['batch'];
            if(!empty($data['status']))
                $info['status'] = $data['status'];
            if(!empty($data['password']))
                $info['password'] = Hash::make($data['password']);
            User::where('id',$id)->update($info);

            return redirect()->back()->with('success','Information updated successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Information updated error');
        }
    }

    public function profile()
    {
        $user = User::where('id',Auth::id())->first();
        return view('alumni.profile',['user'=>$user]);
    }

    public function search()
    {
        if(!Auth::check() || Auth::user()->role_id > 3){
            return redirect('/');
        }
        return view('alumni.search');
    }
    public function searchPeople(Request $request)
    {
        $users = '';
        if (!empty($request->query)){
            $keyword = $request->get('query');
            $users = User::where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('email', 'LIKE', "%{$keyword}%")
            ->orWhere('unique_id', 'LIKE', "%{$keyword}%")
            ->orderBy('name','asc')
            ->get();
        }
        return view('alumni.search',['users'=>$users]);
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('alumni.profile',['user'=>$user]);
    }

    public function destroy(Request $request)
    {
        try{
            User::destroy($request->get('id'));
            return [
                'html' => "Information deleted successfully",
                'status' => 'success'
            ];
        }catch (\Exception $e){
            return [
                'html' => $e,
                'status' => 'error'
            ];
        }
    }
}
