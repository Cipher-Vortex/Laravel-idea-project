<x-layout>

    {{-- <x-idea-card :idea="$idea"> --}}
    <x-idea-form :idea="$idea">
        {{--     
        <hr>
        
        <h3>Edit Your idea</h3>
        <form action="/ideas/edit/{{ $idea->id }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="text" name="title" required>{{ $idea->title }}</input>
            <textarea name="description" required>{{ $idea->description }}</textarea>
            <button type="submit">Submit</button>
        </form> --}}
        {{-- <textarea name="idea" >{{ $idea-> $ideas}}</textarea> --}}

        {{-- <ul>
            @foreach ($ideas as $idea)
            <li>
                {{ $idea}}
            </li>
            @endforeach
        </ul> --}}

        </x-idea-card>
</x-layout>
