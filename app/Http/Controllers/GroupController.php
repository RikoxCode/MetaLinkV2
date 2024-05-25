<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return GroupResource::collection(Group::get());
    }

    public function show(string $slug)
    {
        return GroupResource::make(Group::where('slug', $slug)->first());
    }

    public function store(StoreGroupRequest $request)
    {
        $group = new Group();
        $group->fill($request->validated());
        $group->slug = $this->generateSlug($request->name, new Group());
        $group->save();
        return GroupResource::make($group);
    }

    public function update(StoreGroupRequest $request, Group $group)
    {
        $group->fill($request->validated());
        $group->slug = $this->generateSlug($request->name, new Group());
        $group->save();
        return GroupResource::make($group);
    }

    public function destroy(string $slug)
    {
        $group = Group::where('slug', $slug)->first();
        $group->delete();
        return response()->json(['message' => 'Group deleted'], 204);
    }
}
