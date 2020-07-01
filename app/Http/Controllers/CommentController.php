<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\LectureList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // return $user->comments;

        //return Comment::with('user')->get();
        return Comment::with(['user', 'lecture_list'])->get();
        // $comments = Comment::with('user')->get();
       // return response()->json($comments,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // // Comment::create($request->all());
        //  $user_id = Auth::id();
        //  $rating = $request->rating;
        //  $comment = $request->comment;
        //  $com = new Comment;
   
        //  $com->user_id = $user_id;
        //  $com->lecture_list_id = $lecture_list_id;
        //  $com->rating = $rating;
        //  $com->comment = $comment;
        //  $com->save();
        //  return response()->json([
        //         'code'   => 200,
        //         'status' => true,
        //         'message'=> "comment store Success",
           // ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lecture_list_id)
    {
       // Comment::create($request->all());
        
        $com = new Comment;
        $com->user_id = Auth::id();
        $com->lecture_list_id = $lecture_list_id;
        $com->rating = $request->rating;
        $com->comment = $request->comment;
         
   
        //$com->user_id = $user_id;
        //$com->lecture_list_id = $lecture_list_id;

         // $com->rating = $rating;
         // $com->comment = $comment;
         $com->save();

         return response()->json([
                'code'   => 200,
                'status' => true,
                'message'=> "Comment Successfully Store",
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment, $lecture_list_id)
    {
        return Comment::with('user')
        ->where('lecture_list_id', $lecture_list_id)
        ->get();   

       // $comments = LectureList::find(1)->comments;
        // $comments = LectureList::find($lecture_list_id)->comments()->where('lecture_list_id', '=', $lecture_list_id);
        
        // return $comment->comment;
        // ->get(['star', 'comment', 'user.name']);  
        //return Comment::findOrFail($lecture_list_id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment, $id)
    {
        return Comment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->rating = request('rating');
        $comment->comment = request('comment');
        $comment->save();

         return response()->json([
                'code'   => 200,
                'status' => true,
                'message'=> "Comment Successfully Updated",
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id)
    {
        $res = Comment::destroy($id);
        if ($res) {
            return response()->json([
                'status' => '1',
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => '0',
                'msg' => 'fail'
            ]);
        }
    }
}
