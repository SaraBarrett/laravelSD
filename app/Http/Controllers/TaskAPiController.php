<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollectionResource;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskAPiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): TaskCollectionResource
    {
        return  new TaskCollectionResource(resource: Task::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'users_id' => 'required',
        ]);


        $task = Task::create($request->all());

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        file_put_contents("show1.txt", print_r($task, true));

        return  new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = $task->update($request->all());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $task = $task->delete();

        return response()->json('deleted');
    }
}
