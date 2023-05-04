<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;


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

        if (request()->query('user_id')) {
            $allUsers = DB::table('users')
                ->where('id', request()->query('user_id'))
                ->get();
        } else {
            $allUsers = DB::table('users')
                ->get();
        }

        $cesaeInfo = $this->getCesaeInfo();

        return view('users.all_users', compact('oMeuArray', 'cesaeInfo', 'allUsers'));
    }

    public function all_tasks()
    {
        $allTasks = $this->getAllTasks();
        return view('users.all_tasks', compact('allTasks'));
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

        return view('users.view_task', compact('ourTask'));
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
}
