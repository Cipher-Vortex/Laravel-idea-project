<x-layout>

  
 <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Register</legend>
    <form action="/register" method="POST">
@csrf
  <label class="label">Name</label>
  <input name="name" type="name" class="input" placeholder="name" />

  <label class="label">Email</label>
  <input name="email" type="email" class="input" placeholder="Email" />
 @error('email')
    <p  class="error text-sm text-red-500"> {{ $message }}</p>
  @enderror
  <label class="label">Password</label>
  <input name="password" type="password" class="input" placeholder="Password" />
 @error('password')
    <p class="error"> {{ $message }}</p>
  @enderror
  <button class="btn btn-neutral mt-4">Register</button>
  </form>
  <span class="siginrow">Don't have a account <a href="/login" class="text-blue-500" >Login</a></span>

</fieldset>
</x-layout>