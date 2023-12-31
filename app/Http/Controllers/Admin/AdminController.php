<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $users = User::whereDoesntHave('roles', function ($query) {
                            $query->where('name', 'admin');
                        })->whereNull('deleted_at')->get();
            return view('Admin.users.index', compact('users'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * getComment a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getComment(Request $request)
    {
        $comments = Comment::where('user_id', $request->userid)->get();
        try{
            $html = '';

            foreach ($comments as $key => $comment) {
                $html .= '<div class="comment"><p id="reviewDate">'. $comment->created_at .' 
                            <i class="fas fa-trash-alt deleteComment" style="color:red; float:right; cursor:pointer" data-comment-id="'. $comment->id .'"></i></p>
                            <p id="commentText">'. $comment->comment .'</p><hr style="border-top: 3px solid rgb(0 0 0 / 98%)!important;"></div>';
            }

            return $html;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteComment(Request $request)
    {
        try{
            $comments = Comment::where('id', $request->commentid)->delete();
            return true;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}