<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Update;
use App\User;
use App\MComment;

use App\Events\UpdateCreated;
use App\Events\UserOnline;
use App\Events\CommentUser;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('updates');
    }

    public function create(Request $request)
    {
        $data = $request->validate(['text' => 'required|min:1|max:280|string']);

        $update = auth()->user()->updates()->save(new Update($data))->load('user');

        broadcast(new UpdateCreated($update))->toOthers();

        return response()->json($update);
    }
    public function createComment(Request $request)
    {
        //return response()->json($request->id_update);
        $data = $request->validate(['text' => 'required|min:1|max:280|string', 'id_update' => 'required|min:1|max:280|integer']);
        $comment = auth()->user()->comments()->save(new MComment($data))->load('user');

        broadcast(new CommentUser($comment))->toOthers();
        return response()->json($comment);

    }

    public function list()
    {
        return response()->json(Update::latest()->with('user')->limit(15)->get());
    }
    public function CommentList($update_id)
    {
        $comment    = MComment::with('user')
                    ->where('id_update', $update_id)
                    ->limit(15)
                    ->get();
        return response()->json($comment);
        //return response()->json(MComment::latest()->with('userUpdate')->limit(15)->get());
    }

    public function userSuggestions()
    {
        $user = auth()->user();

        return response()->json(
            User::where('id', '!=', $user->id)->inRandomOrder()->limit(5)->get()
        );
    }
}