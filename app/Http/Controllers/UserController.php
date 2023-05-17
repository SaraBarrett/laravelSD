<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $aMinhaVariavel = "Hello turma de Soft Dev!";

        $usersModel = User::all();

        return view('users.home', compact('aMinhaVariavel'));
    }

    public function all_users()
    {
        $oMeuArray = [
            'nome' => 'Sara',
            'nome2' => 'José',
            'nome3' => 'Rúben',
        ];

        $search = request()->query('search') ? request()->query('search') : null;

        if (request()->query('user_id')) {
            $allUsers = DB::table('users')
                ->where('id', request()->query('user_id'))
                ->get();
        } else {
            $allUsers = DB::table('users')
                ->get();
        }


        if ($search) {
            $allUsers = DB::table('users')
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->get();
        }

        $cesaeInfo = $this->getCesaeInfo();

        return view('users.all_users', compact('oMeuArray', 'cesaeInfo', 'allUsers'));
    }

    public function all_tasks()
    {
        $allTasks = $this->getAllTasks();
        return view('tasks.all_tasks', compact('allTasks'));
    }

    public function viewUser($id)
    {
        $ourUser = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('users.view_user', compact('ourUser'));
    }

    public function deleteUser($id)
    {

        DB::table('tasks')
            ->where('users_id', $id)
            ->delete();


        DB::table('users')
            ->where('id', $id)
            ->delete();

        return back();
    }

    public function viewTask($id)
    {
        $ourTask = DB::table('tasks')
            ->where('id', $id)
            ->first();

        return view('tasks.view_task', compact('ourTask'));
    }

    public function deleteTask($id)
    {

        DB::table('tasks')
            ->where('id', $id)
            ->delete();

        return back();
    }

    public function addUser()
    {
        return view('users.add_user');
    }

    public function createUser(Request $request)
    {


        $myUser = $request->all();

        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'name' => 'required|string',
                'password' => 'required',
            ]
        );

        User::insert([
            'email' => $request->email,
            'name' =>  $request->name,
            'password' => Hash::make($request->password)
        ]);

        return redirect('home_all_users')->with('message', 'Utilizador adicioonado com sucesso');
    }

    protected function getCesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Cenas',
            'email' => 'cenas@gmail.com',
        ];

        return $cesaeInfo;
    }

    protected function getAllTasks()
    {

        $allTasks = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.users_id')
            ->select('tasks.*', 'users.name as usname')
            ->get();

        return $allTasks;
    }

    public function addTask()
    {
        $allUsers = DB::table('users')
            ->get();
        return view('tasks.add_task', compact('allUsers'));
    }

    public function storeTask(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'description' => 'required',
                'user_id' => 'required',
            ]
        );

        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' =>  $request->description,
            'users_id' => $request->user_id,

        ]);

        return redirect()->route('show_all_tasks')->with('message', 'Tarefa adicionada com sucesso');
    }
}
