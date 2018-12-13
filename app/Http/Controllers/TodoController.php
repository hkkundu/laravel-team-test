<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests\Todorequest as Todorequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return $this->_getrecord();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        if($r->term!=null)
        {
            $task['data'] = Article::where('title', 'like', '%'.$r->term.'%')->get();
            return request()->json(200, $task);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Todorequest $request)
    {
        // $article = Article::create($request->all());
        // if($article)
        // {
        //     $articles = Article::orderBy('id', 'desc')->paginate(5);
        //     return request()->json(200, $articles);
        // }
        // $validatedData = $request->validate([
        //     'title' => 'required|unique:articles|max:255',
        //     'body' => 'required',
        // ]);
        $at = new Article;
        $at->title= $request->title;
        $at->body= $request->body;
        if($at->save()){
            return $this->_getrecord();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::find($id);
        return request()->json(200, $articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        return request()->json(200, $articles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Todorequest $request, $id)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|unique:articles,title,'.$request->id
        //     'body' => 'required',
        // ]);
        $at =  Article::find($id);
        $at->title= $request->title;
        $at->body= $request->body;
        if($at->save()){
            return $this->_getrecord();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(Article::destroy($id))
       {
            return $this->_getrecord();
       }
       // else
       //   return response->json(425, ['delete'=>"error deleting record"]);
    }
    private function _getrecord()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return request()->json(200, $articles);
    }

}
