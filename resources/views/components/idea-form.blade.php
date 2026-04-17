@props(['idea'])

<div class="card bg-base-100 shadow-md p-6 w-96">

    <form method="POST" action="{{ route('ideas.update', $idea->id) }}" class="flex flex-col gap-4">

        @csrf
        @method('PATCH')

        <input type="text" name="title" value="{{ old('title', $idea->title) }}" class="input input-bordered"
            placeholder="Title" />

        <textarea name="description" class="textarea textarea-bordered" placeholder="Description">{{ old('description', $idea->description) }}</textarea>

        <button class="btn btn-primary">
            Update Idea
        </button>

    </form>

</div>
