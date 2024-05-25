<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSheetmusicRequest;
use App\Http\Resources\SheetmusicResource;
use App\Models\Sheetmusic;
use Illuminate\Http\Request;

class SheetmusicController extends Controller
{
    public function index()
    {
        return SheetmusicResource::collection(Sheetmusic::get());
    }

    public function show(string $slug)
    {
        return SheetmusicResource::make(Sheetmusic::where('slug', $slug)->first());
    }

    public function store(StoreSheetmusicRequest $request)
    {
        $sheetmusic = new Sheetmusic();
        $sheetmusic->fill($request->validated());
        $sheetmusic->slug = $this->generateSlug($request->title, new Sheetmusic());
        $sheetmusic->save();
        return SheetmusicResource::make($sheetmusic);
    }

    public function update(StoreSheetmusicRequest $request, string $slug)
    {
        $sheetmusic = Sheetmusic::where('slug', $slug)->first();
        $sheetmusic->fill($request->validated());
        $sheetmusic->slug = $this->generateSlug($request->title, new Sheetmusic());
        $sheetmusic->save();
        return SheetmusicResource::make($sheetmusic);
    }

    public function destroy(string $slug)
    {
        $sheetmusic = Sheetmusic::where('slug', $slug)->first();
        $sheetmusic->delete();
        return response()->json(['message' => 'Sheetmusic deleted'], 204);
    }
}
