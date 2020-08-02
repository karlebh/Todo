<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Todo;

class TodoController extends Controller
{
 
    public function index()
    {
    	return view('todo.index')->withTodos(
            Todo::orderBy('created_at', 'desc')->simplePaginate()
        );
    }

    public function create()
    {
    	return view('todo.create');
    }

  
    public function store(Request $request)
    {
    	$data = $request->validate([
    		'name' => 'required|string|min:4|max:300',
    		'message' => 'required|string|min:5|max:2000',
    		'details' => 'string|nullable',
    		'image' => 'image|nullable',
    	]);

        //store picture in \public\images directory

    	if($request->image)
    	{
    		$imgPath = $request->image->store('images', 'public');

            //store image path for database insertion

    		$imgArray = ['image' => $imgPath];
    	}

        //sake the slug

        $slugArray = ['slug' => Str::limit(Str::slug($data['name']), 100, "")];

        //remove empty array value

    	$all = array_filter(
    		array_merge(
    			$data, 
                $imgArray ?? [],
                $slugArray,
    		)
    	);


    	Todo::create($all);

    	return redirect()->route('todo.index')->withMessage('Todo created Successfully!');
    }

    public function update(Todo $todo, Request $request)
    {
    	 $data = $request->validate([
    		'name' => 'required|string|min:4|max:300',
    		'message' => 'required|string|min:5|max:2000',
    		'details' => 'string|nullable',
    		'image' => 'image|nullable',
    	]);


        //store picture in \public\images directory
    	if($request->image)
    	{
    		$imgPath = $request->image->store('images', 'public');

            //store image path for database insertion

    		$imgArray = ['image' => $imgPath];
    	}

        //slug array

        $slugArray = ['slug' => Str::limit(Str::slug($data['name']), 100, "")];

        //remove empty array value

        $all = array_filter(
            array_merge(
                $data, 
                $imgArray ?? [],
                $slugArray,
            )
        );

    	$todo->update($all);

    	return redirect()->route('todo.index')->with('message', 'Todo Updated Successfully!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        return back();
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }


    public function destroy(Todo $todo)
    {
        if($todo){
            $todo->delete();
        }

        return redirect()->route('todo.index')->withMessage('Todo Deleted Successfully');
    }
}
