<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class SearchController extends Controller
{
   	public function search(Todo $todo, Request $request)
    {
        $query = $request->todo;

        $result = Todo::where('name', 'like', "%$query%")->simplePaginate();
    
        return view('todo.search', compact('result', 'query'));
    }
}
