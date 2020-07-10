<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
 
    public function index()
    {
    	return view('index')->withTodo(Todo::paginate());
    }

  
    public function store(Request $request)
    {
    	$data = $request->validate([
    		'name' => 'required|string|min:3|max:300',
    		'mesage' => 'required|string|min:5|max:2000',
    		'details' => 'string|nullable',
    		'image' => 'image|nullable',
    		'date' => 'required|date',
    	]);

        //store picture in \public\images directory

    	if($request->image)
    	{
    		$imgPath = $request->image->store('images', 'public');

            //store image path for database insertion

    		$imgArray = ['image' => $imgPath];
    	}

        //remove empty array value

    	$all = array_filter(
    		array_merge(
    			$data, $imgArray ?? []
    		)
    	);

    	Todo::create($all);

    	return back()->withMessage('Todo created Successfully!');
    }

    public function update(Todo $todo, Request $request)
    {
    	$data = $request->validate([
    		'name' => 'required|string',
    		'mesage' => 'required|string|min:10|max:100',
    		'details' => 'string|nulable|max:100',
    		'image' => 'image|nullable',
    		'date' => 'required|date',
    	]);

        //store picture in \public\images directory
    	if($request->image)
    	{
    		$imgPath = $request->image->store('images', 'public');

            //store image path for database insertion

    		$imgArray = ['image' => $imgPath];
    	}

        //remove fields with empty value

    	$all = array_filter(
    		array_merge(
    			$data, $imgArray ?? []
    		)
    	);

    	$todo->update($all);

    	return back()->withTodo('Todo Updated Successfully!');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        return back();
    }

    public function search(Todo $todo, Request $request)
    {
        $request->validate([
                'q' => 'required|string|min:3',
            ]);

        $query = $request->q;

        $result = Todo::whereName('like', '%$query%')->paginate();

        return back()->withResult($result);
    }
}
