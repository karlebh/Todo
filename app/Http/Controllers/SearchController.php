<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class SearchController extends Controller
{
   	public function search(Todo $todo, Request $request)
    {

        // $request->validate([
        //         'q' => 'string|min:3',
        //     ]);

        // $query = $request->q;

        // $result = Todo::whereName('like', '%$query%')->simplePaginate();

        return view('todo.search');
        // ->withResult(Todo::paginate());
    }
}
