<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {

        $todos = Todo::all();

        return view ('todos')->with('todos', $todos);
    }

    //Define store method from web.php
    public function store(Request $request) {
        //Use to retrieve the data that was pass in inside the form
        // dd($request -> all());

        //Store data in db
        $todo = new Todo;
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success', 'Your todo was Successfully created.');

        //Direct user to a particular route
        return redirect()->back();
    }

    // Define a delete method
    public function delete($id) {
        // dd($id);
        // Find a particular todo and delete from db
        $todo = Todo::find($id);
        $todo->delete();

        Session::flash('success', 'Your todo was Successfully deleted.');

        return redirect()->back();
    }

    // Define a update method
    public function update($id) {
        $todo = Todo::find($id);

        // Return a view to update the data
        return view('update')->with('todo', $todo);
    }

    // Define the save method
    public function save(Request $request, $id) {
        // dd($request->all());
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success', 'Your todo was Successfully updated.');

        return redirect()->route('todos');
    }

    // Define the completed method
    public function completed($id) {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();

        Session::flash('success', 'Your todo was marked as completed.');

        return redirect()->back();
    }
}
