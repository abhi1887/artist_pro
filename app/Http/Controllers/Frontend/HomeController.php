<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $users = User::with('comments')->whereDoesntHave('roles', function ($query) {
                            $query->where('name', 'admin');
                        })->get();
            return view('Frontend.home', compact('users'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function saveComment(Request $request)
    {
        try {
            $comment = new Comment;
            $comment->user_id = $request->userid;
            $comment->comment = $request->comment;
            $comment->save();

            $newCommentID = $comment->id;
            $date = date('d/m/Y', strtotime($comment->created_at));

            $html = '<p> Review Date  '.$date.'</p>
                    <p>'.$comment->comment.'</p>';

            return $html;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}