<x-layout>
    <div class="max-w-5xl mx-auto p-4">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Ideas</h3>

            <a href="/create/new" class="btn btn-primary">
                + Create Idea
            </a>
        </div>

        @if ($ideas->count())
            <ul class="grid md:grid-cols-2 gap-4">
                @foreach ($ideas as $idea)
                    <li>
                        <x-idea-card :idea="$idea" :showActions="false" />
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-center py-20">
                <h2 class="text-xl font-semibold mb-4">
                    No ideas yet
                </h2>

                <a href="/create/new" class="btn btn-primary">
                    Create your first idea
                </a>
            </div>
        @endif

    </div>
</x-layout>
