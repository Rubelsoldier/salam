<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Http\Enums\GroupUserStatus;
use App\Http\Resources\GroupResource;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $posts = Post::query()
            ->withCount('reactions')
            ->with([
                'comments' => function ($query) use ($userId) {
                    $query->withCount('reactions');
                },
                'reactions' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->latest()
            ->paginate(10);

            $posts = PostResource::collection($posts);
            if ($request->wantsJson()) {
                return $posts;
            }
        
        $groups = Group::query()
            ->select(['groups.*', 'gu.status', 'gu.role'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Home',[
            'posts' => $posts,
            'groups'=> GroupResource::collection($groups)
        ]);
    }
}
