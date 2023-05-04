<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //função pública
    public function index()
    {

        //retornar todos da tabela flights
        Flight::all();

        //retornar o voo com id 1 da tabela flights
        Flight::where('id', 1)->first();

        //inserir um User
        /*User::insert([
            'name' => 'Márcia',
            'email' => 'Marcia@gmail.com',
            'password' => 'Marcia123',
        ]);*/

        //fazer update a um User
        User::where('email', 'Marcia@gmail.com')
            ->update(['password' => 'Marcia2023']);

        //apagar um User
        User::where(
            ['email', 'Marcia@gmail.com'],
            ['password' => 'Marcia2023']
        );


        //actualizar ou criar
        User::updateOrCreate(
            ['email' => 'Marcia@gmail.com'],
            [
                'name' => 'Márcia',
                'password' => 'Marcia1234'
            ]
        );



        $myVar = 'Sou uma variável a ser enviada para a Blade';

        $contactInfo = [
            'name' => 'Nome da Pessoa',
            'phone' => 'Contacto da Pessoa'
        ];

        //retornar a view com dados
        return view('contacts.home_contacts', compact('myVar', 'contactInfo'));
    }

    //função pública
    public function allContacts()
    {
        $allUsers = $contacts = User::all();

        if (!empty(request()->query('user_id'))) {
            $contacts = User::where('id', request()->query('user_id'))
                ->get();
        } else {
            $contacts = $allUsers;
        }

        $tasks = $this->getAllTasks();


        //retornar a view com os dados dos contactos
        return view('contacts.all_contacts', compact('allUsers', 'contacts', 'tasks'));
    }

    public function viewContact($id)
    {
        $ourUser = User::where('id', $id)->first();

        //retornar a view com os dados do nosso User
        return view('contacts.view_contact', compact('ourUser'));
    }

    public function deleteContact($id)
    {
        User::where('id', $id)->delete();

        return back();
    }

    private function getContact()
    {
        DB::table('users')
            ->where('email', 'Sara@gmail.com')
            ->first();
    }

    protected function getAllTasks()
    {
        $tasks = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.users_id')
            ->select('tasks.id AS id', 'tasks.name AS name', 'users.name AS usname', 'tasks.description AS description')
            ->get();

        return $tasks;
    }


    //função que só se acede neste Controller
    protected function getContacts()
    {
        $contacts = [
            ['id' => 1, 'name' => 'Sara', 'phone' => '985654455'],
            ['id' => 2, 'name' => 'Bruno', 'phone' => '985654455'],
            ['id' => 3, 'name' => 'Márcia', 'phone' => '985654455']
        ];

        return $contacts;
    }

    public function addUser()
    {
        $users = $this->getAllUsers();
        return view('contacts.add_contact', compact('users'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  $request->password,
        ]);

        return redirect()->route('contacts.all')->with('message', 'Contacto adicionado com sucesso');
    }

    public function addTask()
    {
        $users = $this->getAllUsers();
        return view('contacts.add_task', compact('users'));
    }

    public function createTask(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'users_id' => 'required',
        ]);

        DB::table('tasks')
            ->insert([
                'name' => $request->name,
                'description' => $request->description,
                'users_id' => $request->users_id,
            ]);

        return redirect()->route('contacts.all')->with('message', 'Contacto adicionado com sucesso');
    }
    public function updateUser(Request $request)
    {
        User::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  $request->password,
            ]);

        return redirect()->route('contacts.all')->with('message', 'Contacto actualizado com sucesso');
    }

    protected function getCesaeInfo()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'morada' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];
        return $cesaeInfo;
    }

    protected function insertUser()
    {
        $message = 'Query Ok!';

        DB::table('users')
            ->insert([
                'name' => 'Sara',
                'email' => 'Sara@gmail.com',
                'password' => 'Sara1234',
            ]);

        return $message;
    }



    protected function getAllUsers()
    {
        $users = USer::all();

        return $users;
    }
}
