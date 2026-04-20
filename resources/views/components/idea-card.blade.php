@props(['idea', 'showActions' => true])

<div class="card w-full bg-gray-900 text-white w-96 shadow-lg">
    <div class="card-body">

        <div class="rounded-lg overflow-hidden">
            @if (!empty($idea->image_path) ?? [])
                {{-- <img src="{{ asset('storage/' . $idea->image_path) }}" /> --}}
                <img src="{{ asset('storage/' . $idea->image_path) }}" class="w-full max-h-100 object-cover" />
            @endif
        </div>
        <div class="flex justify-between items-start">

            <h2 class="card-title text-white">
                <a href="{{ route('ideas.view', $idea->id) }}" class="hover:underline">
                    {{ $idea->title }}
                </a>
            </h2>

            <x-status-badge :status="$idea->status">
                {{ $idea->status }}
            </x-status-badge>
        </div>

        <p class="text-gray-300">
            {{ $idea->description }}
        </p>

        <p class="text-gray-300">
            {!! $idea->formattedDescription !!}
        </p>

        <div class="text-xs text-gray-400 flex justify-between mt-2 ">
            <p>{{ $idea->created_at->diffForHumans() }}</p>
            <p>User ID: {{ $idea->user_id }}</p>
        </div>

        {{-- Links --}}
        @if (!empty($idea->links))
            <ul class="mt-2 space-y-1 text-blue-400 bg-gray-800 p-1.5 rounded-2xl ">
                @foreach ($idea->links as $link)
                    <li>
                        <a href="{{ $link }}" target="_blank" class="hover:underline">
                            {{ $link }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if ($showActions)
            <div class="card-actions justify-end mt-4">

                <a href="{{ route('ideas.view', $idea->id) }}" class="btn btn-primary btn-sm">
                    View
                </a>

                <a href="{{ route('ideas.edit', $idea->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-error btn-sm">
                        Delete
                    </button>
                </form>

            </div>
        @endif

    </div>
</div>
