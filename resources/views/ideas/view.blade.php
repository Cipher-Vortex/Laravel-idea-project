<x-layout>
    <h3 class="p-4">Viewing Idea: {{ $idea->id }}</h3>
    <x-idea-card :idea="$idea" />

    {{-- @dd($idea) --}}
    {{-- <p>{{ $idea->id }}</p>
    <p>{{ $idea->title }}</p>
    <p>{{ $idea->description }}</p>
    <p>{{ $idea->created_at }}</p>
    <p>{{ $idea->updated_at }}</p>
    <a href="{{ route('ideas.edit',$idea->id) }}" type="submit">Edit</a>
    --}}
</x-layout>
