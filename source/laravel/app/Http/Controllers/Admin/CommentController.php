<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentFormRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;    
        $this->user = $user;    
    }

    public function index(Request $request, $userId)
    {
        if(!$user = $this->user->find($userId)){
            return redirect()->route('users.index');
        }

        $comments = $user->comments(
            search: $request->search ?? '' //Passando usando recurso de Parametro nomeado do PHP8
        )->get();

        //dd($comments);

        return view('users/comments/index', compact('user', 'comments'));
    }

    public function create($userId)
    {
        if(!$user = $this->user->find($userId)){
            return redirect()->route('users.index');
        }

        return view('users/comments/create', compact('user'));
    }

    public function store(StoreUpdateCommentFormRequest $request, $userId)
    {
        if(!$user = $this->user->find($userId)){
            return redirect()->route('users.index');
        }

        $user->comments()->create([
            "body" => $request->body,
            "visible" => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id)
    {
        if(!$comment = $this->comment->find($id)){
            return redirect()->route('users.index');
        }

        //Metodo que busca por relacionamento Many to One criado na Model
        $user = $comment->user;

        return view('users/comments/edit', compact('user', 'comment'));
    }

    public function update(StoreUpdateCommentFormRequest $request, $userId, $id)
    {
        if(!$comment = $this->comment->find($id)){
            return redirect()->route('users.index');
        }

        $comment->update([
            "body" => $request->body,
            "visible" => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }
}
