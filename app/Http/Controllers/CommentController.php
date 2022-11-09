<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentCreateRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogCommentCreateRequest $request)
    {
//        $request->validate([
//            'body'=>'required',
//        ]);


        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
      //  dd($input);
       // Comment::create($input);
        $input = (new Comment())->create($input);
        return back();
    }

    public function show($id){

    }

}
