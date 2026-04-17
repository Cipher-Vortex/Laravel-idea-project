<x-layout>
    <h1>Hi there</h1>

    @guest
        <h6>Please login to continue</h6>
    @endguest

    @auth
        <div class="flex col-auto">
            <h1>NO ideas yet<span> <a class="font-bold btn btn-primary" href="/create/new">Create Idea</a></span></h1>
        </div>

    @endauth
    {{-- <x-idea-card/> --}}
</x-layout>
