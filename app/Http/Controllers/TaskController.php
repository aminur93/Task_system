<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = task::latest()->get();
        return view('task.index',compact('task'));
    }
    
    public function store(Request $request)
    {
        //dd($request->all());
        
        //Request validation
        $request->validate([
            'task' => 'required'
        ]);
        
        $task = new task();
        
        $task->title = $request->task;
        $task->save();
        
        session()->flash('msg','Task Has been Created');
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $task = task::findOrFail($id);
        $task->delete();
        
        session()->flash('mssg','Task has been Deleted');
        
        return redirect()->back();
    }
}
