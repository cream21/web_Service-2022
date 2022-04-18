<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

// controller blog tugas 3
class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::all();
        return view('blog/index', compact('data'));
    }
    public function create()
    {
        return view('blog/add');
    }
    public function ambilData(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric|unique:blog|min:4',
            'author' => 'required|min:5|max:10',
            'title' => 'required|min:8|max:50',
            'body' => 'required|min:8|max:255',
            'keyword' => 'required|min:8|max:255'

        ]);
        $data = Blog::create($request->all());
        // redirect
        return redirect('data-blog');
        // dd($request->all());
    }
    public function destroy(Blog $id)
    {
        $id->delete();
        return redirect(url('data-blog'));
    }
    public function edit($id)
    {
        $data = Blog::find($id);
      
        return view('blog/edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = Blog::find($id);
        
        $blogValid = [
            'author' => 'required|min:3',
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'keyword' => 'required|min:5'
        ];
        

        if ($request->id != $data->id) {
            $blogValid['id'] = 'required|unique:blog';
        }
        $validatedData = $request->validate($blogValid);
        
        $data->update($request->all());
        // redirect
        return redirect(url('data-blog'));
        // dd($request->all());
    }
}