@props(['label' ,'name','type'=> 'text'])

<x-layout class="flex justify-center align-center">

  <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
    <legend class="fieldset-legend">Login</legend>
    <form action="/login" method="POST">
 @csrf
  <label class="label">Email</label>
  <input name="email" type="email" class="input" placeholder="Email" />

  @error('email')
    <p class="error"> {{ $message }}</p>
  @enderror
  
  <label class="label">Password</label>
  <input name="password" type="password" class="input" placeholder="Password" />
  @error('password')
    <p class="error"> {{ $message }}</p>
  @enderror

  <button class="btn btn-neutral mt-4">Login</button>
  </form>
  <span class="siginrow">Don't have a account <a href="/register" class="text-blue-500">Register</a></span>

</fieldset>
</x-layout>