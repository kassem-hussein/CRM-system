<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::query()->paginate(5);
        return view('Tasks.list',['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tasks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        return redirect('/tasks')->with('success','messages.add_task_m');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('Tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/tasks')->with('success','messages.update_task_m');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/tasks')->with('success','messages.delete_task_m');
    }

    public function print(){
        $tasks = Task::all();
        return view('Tasks.print',['tasks'=>$tasks]);
    }
}
