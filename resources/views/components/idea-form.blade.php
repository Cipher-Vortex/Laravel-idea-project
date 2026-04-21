@props(['idea'])

<div class="card w-full max-w-2xl mx-auto bg-base-100 shadow-xl p-6">

    <h2 class="text-xl font-bold mb-4">Edit Idea</h2>

    <form method="POST" enctype="multipart/form-data" action="{{ route('ideas.update', $idea->id) }}"
        class="flex flex-col gap-4">

        @csrf
        @method('PATCH')

        {{-- Title --}}
        <div>
            <label class="label font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $idea->title) }}"
                class="input input-bordered w-full @error('title') input-error @enderror"
                placeholder="Enter idea title" />

            @error('title')
                <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label class="label font-semibold">Description</label>
            <textarea name="description"
                class="textarea textarea-bordered w-full h-80 @error('description') textarea-error @enderror"
                placeholder="Describe your idea...">{{ old('description', $idea->description) }}</textarea>

            @error('description')
                <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- Links --}}
        <div>
            <label class="label font-semibold">links</label>
            {{-- @dd($idea) --}}
            @foreach ($idea->links ?? [] as $index => $link)
                <input type="text" name="links[]" value="{{ $link }}"
                    class="w-full border border-dotted p-1.5 m-1 @error('links') textarea-error @enderror"
                    placeholder="Describe your idea..."></inpu      t>
            @endforeach

            @error('links')
                <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Upload --}}
        <div>
            <label class="label font-semibold">Upload New Image</label>
            <input type="file" name="image_path" accept="image/*"
                class="file-input file-input-bordered w-full @error('image_path') file-input-error @enderror" />

            @error('image_path')
                <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Existing Image --}}
        @if ($idea->image_path)
            <div>
                <label class="label font-semibold">Current Image</label>
                <img src="{{ asset('storage/' . $idea->image_path) }}"
                    class="rounded-lg shadow w-full max-h-64 object-cover" />
            </div>
        @endif

        {{-- Submit --}}
        <button class="btn btn-primary mt-4">
            Update Idea
        </button>

    </form>

</div>
