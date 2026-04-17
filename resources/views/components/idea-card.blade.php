@props(['idea', 'showActions' => true])
<a class=" cursor-pointer" href="{{ route('ideas.view', $idea->id) }}">
    <div class="card bg-gray-900 text-white w-96 shadow-lg">

        <div class="card-body">

            <div class="flex justify-between">
                <h2 class="card-title text-white">
                    {{ $idea->title }}
                </h2>

                <x-status-badge status="completed">
                    {{ optional($idea->status)->label() ?? 'pending' }}
                </x-status-badge>
            </div>
            <p class="text-gray-300">
                {{ $idea->description }}
            </p>

            <p class="text-gray-300">
                {{-- {{ optional($idea->links) }} --}}
                @dd([$idea->links]) </p>

            <div class="text-xs text-gray-400  flex justify-between">
                <p>{{ $idea->created_at->diffForHumans() }}</p>
                <p>User ID: {{ $idea->user_id }}</p>
            </div>

            {{-- status: "pending",
        user_id: 14,
        title: "Quo unde harum vel sapiente.",
        description: "Enim dolorem beatae commodi eligendi numquam. Facilis ut rerum maiores facilis excepturi non. Nisi autem dolores eum facere accusamus excepturi minima. Fuga eum rem sapiente neque impedit occaecati architecto.",
        links: "[\"http:\\/\\/schultz.com\\/quaerat-neque-culpa-blanditiis-dolorem-assumenda-dolorem-maxime\"]",
        updated_at: "2026-04-17 12:45:07",
        created_at: "2026-04-17 12:45:07",
        id: 10, --}}
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

                        <button class="btn btn-error btn-sm">
                            Delete
                        </button>
                    </form>

                </div>
            @endif

        </div>
    </div>
</a>
