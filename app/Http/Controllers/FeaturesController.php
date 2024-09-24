<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\GroupResource;

class FeaturesController extends Controller
{
    public function plan() {
        
        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/Plan',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);

        // return inertia('Features/Productivity');
    }

    public function productivity() {
        
        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/Productivity',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);

        // return inertia('Features/Productivity');
    }

    public function starflix() {
        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/StarFlix',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);
    }

    public function network() {
        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/Network',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);
    }
    
    public function ecommerce() {
        return inertia('Features/Ecommerce');
    }
    
    public function mentalHealth() {

        // $user = User();

        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/MentalHealth',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);
    }
    
    public function zakat() {
        return inertia('Features/Zakat');
    }
    
    public function ijma() {

        // $user = User();

        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/Ijma',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);
    }
    
    public function boycott() {

        // $user = User();

        $groups = Group::query()
            ->with('currentUserGroup')
            ->select(['groups.*'])
            ->join('group_users AS gu', 'gu.group_id', 'groups.id')
            ->where('gu.user_id', Auth::id())
            ->orderBy('gu.role')
            ->orderBy('name', 'desc')
            ->get();

        return Inertia::render('Features/Boycott',[
            'groups'=> GroupResource::collection($groups),
            // 'followings' => UserResource::collection($user->followings),
        ]);
    }




}

