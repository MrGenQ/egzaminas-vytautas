<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'addTask', 'storeTask', 'updateClientTask', 'storeClientUpdate']]);
    }
    public function index(Request $request){
        $errors = '';

        $filterStatus = $request->input('status');
        if($filterStatus != ""){
            $tasks = Main::where(function($query) use ($filterStatus){
                $query->where('status', 'like', $filterStatus);
            })->simplePaginate(10);
        }
        else{
            $tasks = Main::simplePaginate(10);
        }
        return view('pages.home', compact('tasks', 'errors'));
    }
    public function addTask(){
        return view('pages.add-task');
    }
    public function storeTask(Request $request){

        $validated = $request->validate([
            'title'=> 'required|unique:mains|max:255',
            'description'=> 'required',

        ]);

        Main::create([
            'title' =>request('title'),
            'description' =>request('description'),
            'status' => 'unchecked',
            'taskResponse' => ''
        ]);
        return redirect('/');
    }
    public function updateTask(Main $task){
        return view('pages.update-task', compact('task'));
    }
    public function storeUpdate(Main $task, Request $request){
        $validated = $request->validate([
            'taskResponse'=> 'required|max:255',
            'status' => 'required',

        ]);
        Main::where('id', $task->id)->update($request->only(['status', 'taskResponse']));
        return redirect('/');
    }
    public function updateClientTask(Main $task){
        if(empty(Auth::user()->name)){
        return view('pages.update-client-task', compact('task'));
        }
        else return redirect('/');
    }
    public function storeClientUpdate(Main $task, Request $request){
        Main::where('id', $task->id)->update(['status' => 'done']);
        return redirect('/');
    }
    public function deleteTask(Main $task){
        if($task->status === 'done'){
            $task->delete();
            return redirect('/');
        }
        else {
            $tasks = Main::simplePaginate();
            $errors = 'Užklausa neužbaigta';
            return view('pages.home', compact('tasks','errors'));
        }


    }
}
