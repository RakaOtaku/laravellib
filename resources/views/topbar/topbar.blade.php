 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
         <a class="navbar-brand">Library</a>
         @guest
         @else
             <li class="nav-item dropdown" style="text-decoration: none">
                 <a id="navbarDropdown" class="nav-link dropdown-toggle text-decoration-none" href="#" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     {{ Auth::user()->name }}
                 </a>

                 <div class="dropdown-menu dropdown-menu-end text-decoration-none" aria-labelledby="navbarDropdown" >
                     <a class="dropdown-item text-decoration-none" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>  
         @endguest
     </div>
     </div>
 </nav>
