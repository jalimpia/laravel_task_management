<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Exception;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        try {
            $task = new Task;
            $task->name = $request->name;
            $task->description = $request->description;
            $task->priority = $request->priority;
            $task->save();
            return redirect()->back()->with('message', 'Added Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit')->with('task', $task);
    }

    public function update($id, Request $request)
    {

        try {
            $task = Task::find($id);
            $task->name = $request->name;
            $task->description = $request->description;
            $task->priority = $request->priority;
            $task->save();
            return redirect()->back()->with('message', 'Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::find($id);
            $task->delete();
            return redirect()->back()->with('message', 'Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error!' . $e);
        }
    }

    public function update_order(Request $request)
    {
        $i = 0;
        foreach ($request->id as $id) {
            $task = Task::find($id);
            $task->priority = $request->ordering[$i];
            $task->save();
            $i++;
        }
        return redirect()->back()->with('message', 'Priority Updated');
    }
}
