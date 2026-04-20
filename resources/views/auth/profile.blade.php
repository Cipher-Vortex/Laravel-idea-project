<x-layout>


    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
        <legend class="fieldset-legend">Edit Profile</legend>
        {{-- @dd($user); --}}
        <form action="/profile/edit" method="POST">
            @method('PATCH')
            @csrf
            <label class="label">Name</label>
            <input name="name" value="{{ $user->name }}" type="name" class="input" placeholder="name" />

            <label class="label">Email</label>
            <input name="email" value="{{ $user->email }}" type="email" class="input" placeholder="Email" />
            @error('email')
                <p class="error text-sm text-red-500"> {{ $message }}</p>
            @enderror
            <label class="label">Created_at</label>
            <label class="label">{{ $user->created_at }}</label><br />
            {{-- <label class="label">Password</label>
            <input name="password" value="" type="password" class="input" placeholder="Password" />
            @error('password')
                <p class="error"> {{ $message }}</p>
            @enderror --}}
            <button class="btn btn-neutral mt-4">Update</button>
        </form>

    </fieldset>
</x-layout>
