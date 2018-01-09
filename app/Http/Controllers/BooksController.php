<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return view('books.index');
    }
    public function create()
    {
        return view('books.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->logo->store('logos');
        // $request->save();

        // return redirect()->route('books.index')->with(['message' => 'Success']);
    }
}
