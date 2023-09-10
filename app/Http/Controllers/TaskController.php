<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::where('status',false )->get();
        $tasks = Task::where('status',FALSE )->paginate(5);
        return view('tasks.index',['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $task_name = $request->input('task_name');
        Task::create([
            'content' => $task_name
        ]);

        return redirect('/top')->with('success','タスクが追加されました');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.updateForm',['task' => $task]);
    }

    public function update(Request $request)
    {
        $task_name = $request->input('task_name');
        $id = $request->input('id');

        Task::where('id',$id)->update([
            'content' => $task_name,
        ]);

        return redirect('/top')->with('success_update','タスクが編集されました');
    }

    public function delete($id)
    {
        Task::where('id',$id)->delete();

        return redirect('/top')->with('success_delete','タスクが削除されました');
    }

    public function tasked($id)
    {
        Task::where('id',$id)->update([
            'status' => TRUE,
        ]);

        return redirect('/top')->with('success','タスクを完了しました');
    }

    public function finished()
    {
        $tasks = Task::where('status',TRUE)->get();

        return view('tasks.finished',['tasks' => $tasks]);
    }

    public function restore($id)
    {
        Task::where('id',$id)->update([
            'status' => FALSE,
        ]);

        return redirect('/top')->with('success_restore','タスクを復元しました');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword))
        {
            // $tasks = Task::where('content','like','%'.$keyword.'%')->where('status',FALSE)->get();
            $tasks = Task::where('content','like','%'.$keyword.'%')->where('status',FALSE)->paginate(5);
        }else{
            // $tasks = Task::where('status',FALSE)->get();
            $tasks = Task::where('status',FALSE)->paginate(5);
        }
        return view('tasks.index',['tasks' => $tasks]);
    }
}
