<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Create new TasksController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mutate the Name attribute.
     *
     * @return void
     */
    public function setNameAttribute($value)
    {
      $this->attributes['name'] = ucfirst($value);
    }

    /**
     * Get all tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tasks = Task::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

      return view('tasks.index', compact('tasks'));
    }

    /**
     * Return create task form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tasks.create');
    }

    /**
     * Saves given Task.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Task::create(array_merge(
          ['user_id' => Auth::id()],
          $request->all()
      ));

      return redirect('tasks');
    }

    /**
     * Delete given Task.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      Task::where('id', $request->id)->delete();

      return redirect('tasks');
    }

    /**
     * Return edit view for the task.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $task = Task::where('id', $request->id)->first();

      return view('tasks.edit', compact('task'));
    }

    /**
     * Update given task.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      Task::where('id', $request->id)->update(['name' => $request->name]);

      return redirect('tasks');
    }

}
