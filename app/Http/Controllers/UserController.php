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

        file_put_contents("usersModel.txt", print_r($usersModel, true));
        return view('users.home', compact('aMinhaVariavel'));
    }

    public function all_users()
    {
        $oMeuArray = [
            'nome' => 'Sara',
            'nome2' => 'José',
            'nome3' => 'Rúben',
        ];

        $allUsers = DB::table('users')
            ->get();

        file_put_contents("allUsers.txt", print_r($allUsers, true));

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
        $ourUser = User::where('id', $id)->first();

        return view('users.view_user', compact('ourUser'));
    }
    public function addUser()
    {
        return view('users.all_users');
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


        file_put_contents("test.txt", $allTasks);


        return $allTasks;
    }
}
