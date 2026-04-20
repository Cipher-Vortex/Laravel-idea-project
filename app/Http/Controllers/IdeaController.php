<?php

namespace App\Http\Controllers;

use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // TO get all ideas for the logged in specific user
        $ideas = Auth::user()->ideas;

        // TO get all ideas from the database
        // $ideas = Idea::all();
        // $ideas = Idea::query()
        // ->when($request->status ,fn($query , $status)=>
        // $query->where('status',$status)
        // )
        // ->get();
        // ->where('status','completed');

        // count for each status
        $statusCounts = Auth::user()->ideas()
        // $statusCounts = Idea::query()
            ->selectRaw('status,count(*) as count')
        // ->selectRaw('*')
            ->groupBy('status')
            ->get();

        collect(IdeaStatus::cases())
            ->mapWithKeys(fn ($status) => [
                $status->value => $statusCounts->get($status->value, 0),
            ]);

        // return $statusCounts;

        // To get ideas for a specific user
        // $ideas = Idea::query()
        // ->where("user_id",$user->id)
        // ->get();

        // return  (compact('ideas','statusCounts'));
        return view('ideas.index', compact('ideas', 'statusCounts'));
    }

    public function api(Idea $idea)
    {

        $ideas = Idea::all();

        return response($ideas);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd($request->all());
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image_path' => ['nullable', 'image'],
        ]);

        Idea::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image_path' => $data['image_path']->store('ideas', 'public'),
            // 'user_id' => auth()->id(),
            'user_id' => Auth::id(),

        ]);

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('workWith', $idea);

        return view('ideas.view', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {

        // @dd($request->all());
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image_path' => ['nullable', 'image'],

        ]);
        // $request->validate([
        //     'ideas' => 'required|min:3',
        // ]);

        // replacing the old image
        if ($request->hasFile('image_path')) {
            if ($idea->image_path) {
                Storage::disk('public')->delete($idea->image_path);
            }

            // store the new image
            $data['image_path'] = $request->file('image_path')->store('ideas', 'public');
        } else {
            unset($data['image_path']);
        }

        // $idea->save($data);
        $idea->update($data);

        return redirect('/ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
