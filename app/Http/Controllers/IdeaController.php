<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\IdeaStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // TO get all ideas for the logged in specific user
        // $ideas = Auth::user()->ideas;

        // TO get all ideas from the database
        $ideas = Idea::all();
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
        ->mapWithKeys(fn($status)=>[
            $status->value => $statusCounts->get($status->value,0),
        ]);

// return $statusCounts;

        // To get ideas for a specific user
        // $ideas = Idea::query()
        // ->where("user_id",$user->id)
        // ->get();
        
        // return  (compact('ideas','statusCounts'));
        return view('ideas.index',compact('ideas','statusCounts'));
    }

    public function api(Idea $idea){

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
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);

        Idea::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => auth()->id,

        ]);

        return redirect('/ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
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
        $data = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);
        // $request->validate([
        //     'ideas' => 'required|min:3',
        // ]);

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
