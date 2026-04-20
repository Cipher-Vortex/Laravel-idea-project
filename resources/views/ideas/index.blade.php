<x-layout>


    {{-- <div user__defined useState => (openModal) x-data="{ modal: null }"  (@user_defined_name-initial state(openModal))@xyz-modal.window="modal = $event.detail"> --}}
    <div class="max-w-5xl mx-auto p-4" x-data="{ modal: null }" @xyz-modal.window="modal = $event.detail">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Ideas</h3>

            <!-- BUTTON (React: setState) -->
            {{-- <button useState => (setOpenModal) </button> @click="$dispatch('xyz-modal', 'create-idea')"> --}}
            {{-- <a class="btn btn-primary" href="/profile">
                Edit Profile
            </a> --}}
            <button class="btn btn-primary" @click="$dispatch('xyz-modal', 'create-idea')">
                + Create IdeaPolicy
            </button>
            @can('isAdmin')
                <a class="btn btn-primary" href="/profile">
                    Edit Profile
                </a>
            @endcan
        </div>

        <!-- TEST ALPINE -->
        {{-- <div x-data="{ open: false }">
            <button @click="open = !open">Toggle</button>

            <div x-show="open">
                Alpine Works 🎉
            </div>
        </div> --}}

        <!-- TAG TEST -->
        {{-- <x-tag is="button" class="mt-4 cursor-pointer" x-data @click="alert('clicked')">
            <p>hello</p>
        </x-tag> --}}

        <!-- FILTERS -->
        <div class="py-4">
            <a class="btn" href="/ideas">All</a>
        </div>

        <!-- IDEAS -->
        @if ($ideas->count())
            <ul class="grid md:grid-cols-2 gap-4">
                @foreach ($ideas as $idea)
                    <li>
                        <x-idea-card :idea="$idea" :showActions="false" />
                    </li>
                @endforeach
            </ul>
        @endif


        <!-- ===================== -->
        <!-- MODAL (NO COMPONENT) -->
        <!-- ===================== -->

        <div x-show="modal === 'create-idea'" x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">

            <!-- Modal box -->
            <div class="bg-gray-500 text-white p-6 rounded-lg w-96" @click.outside="modal = null" x-transition.scale.90>
                <h2 class="text-lg font-bold mb-4">
                    Create Idea
                </h2>

                <form x-data="{
                    status 'pending',
                
                }" action="/ideas/create" method="POST" enctype="multipart/form-data"
                    class="flex flex-col gap-3">
                    @csrf

                    <input name="title" type="text" class="input input-bordered" placeholder="Title" required />

                    <textarea name="description" class="textarea textarea-bordered" placeholder="Description" required></textarea>

                    <input name="image_path" accept="images/*" type="file" class="input input-bordered"
                        placeholder="Title" required />

                    <div class="mt-4 flex justify-end gap-5">
                        <button class="btn btn-danger" @click="modal = null">
                            Close
                        </button> <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                </form>
            </div>
        </div>

    </div>
    </div>

</x-layout>
