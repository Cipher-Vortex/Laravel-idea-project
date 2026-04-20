<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <a href="/" class="btn text-xl">Idea Project</a>
  </div>
  {{-- <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a>Item 1</a></li>
      <li>
        <details>
          <summary>Parent</summary>
          <ul class="p-2 bg-base-100 w-40 z-1">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </details>
      </li>
      <li><a>Item 3</a></li>
    </ul>
  </div> --}}
  <div class="navbar-end gap-5">
    @guest
    <a href="/login" class="rounded-xl btn btn-primary">Login</a>
    <a href="/register" class="rounded-xl btn btn-secondary">Register</a>
    @endguest
    
    @auth
    <form action="/logout" method="POST">
        <button type="submit" href="/logout" class="rounded-xl btn btn-danger">Log out</button>
    </form>
        
    @endauth
  </div>
</div>