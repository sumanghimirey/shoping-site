<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/15/16
 * Time: 7:29 AM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.user';

    public function index(Request $request)
    {
        $data = [];
        // DB::enableQueryLog();

        $data['users'] = User::select('id', 'username', 'email', 'name', 'status', 'created_at', 'updated_at')->get();
        // dd(DB::getQueryLog());
        return view($this->view_path.'.list', [
            'data' => $data
        ]);
    }

    public function add(Request $request)
    {
        return view($this->view_path.'.add');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // print all the data comming form request
        // $request->all()

        // Process 1
//        $user = new User();
//        $user->username = $request->get('username');
//        $user->email = $request->get('email');
//        $user->password = bcrypt($request->get('password'));
//        $user->first_name = $request->first_name;
//        $user->middle_name = $request->get('middle_name');
//        $user->last_name = $request->get('last_name');
//        $user->status = $request->get('status');
//        $user->save();

        // Process 2
        // User::create($request->all());

        // Process 3
        User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'name' => $request->get('name'),
            'status' => $request->get('status'),
        ]);

        $request->session()->flash('message', 'User added successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function edit(Request $request, $id)
    {
        // get user data for $id
        $data = [];
        $data['user'] = User::find($id);

        return view($this->view_path.'.edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        // get user data for $id
        $user = User::find($id);
        $user->update([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->has('password')?bcrypt($request->get('password')):$user->password,
            'name' => $request->get('name'),
            'status' => $request->get('status'),
        ]);

        $request->session()->flash('message', 'User updated successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    public function delete(Request $request, $id)
    {
        // get user data for $id and Remove
        User::find($id)->delete();
        $request->session()->flash('message', 'User deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }
}