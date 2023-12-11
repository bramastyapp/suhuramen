 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="{{ url('adm/user') }}" class="nav-link">
                 <div class="nav-profile-image">
                     @if (Auth::user()->foto)
                         <img src="{{ asset('storage') }}/{{ Auth::user()->foto }}" alt="profile"
                             style="object-fit: cover">
                     @else
                         <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg" alt="profile">
                     @endif
                     <span class="login-status online"></span>
                     <!--change to offline or busy as needed-->
                 </div>
                 <div class="nav-profile-text d-flex flex-column">
                     <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                     @foreach ($user_role as $role)
                         @if ($role->id == Auth::user()->user_role)
                             <span class="text-secondary text-small">{{ $role->nama_role }}</span>
                         @endif
                     @endforeach
                     @if (!Auth::user()->user_role)
                         <span class="text-secondary text-small">Belum Ada</span>
                     @endif
                 </div>
                 <i class="mdi mdi-arrow-right nav-profile-badge text-secondary"></i>
             </a>
         </li>
         @foreach ($menu as $m)
             @if (count($m->subMenu) !== 1)
                 <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="collapse"
                         href="#kelola-{{ strtolower(str_replace(' ', '-', $m->nama_menu)) }}" aria-expanded="false"
                         aria-controls="kelola-{{ strtolower(str_replace(' ', '-', $m->nama_menu)) }}">
                         <span class="menu-title">{{ $m->nama_menu }}</span>
                         <i class="menu-arrow"></i>
                         <i class=" mdi {{ $m->icon }} menu-icon"></i>
                     </a>
                     <div class="collapse" id="kelola-{{ strtolower(str_replace(' ', '-', $m->nama_menu)) }}">
                         <ul class="nav flex-column sub-menu">
                             @foreach ($m->subMenu as $sm)
                                 @if ($sm->is_active === 1)
                                     <li class="nav-item">
                                         <a class="nav-link" href='{{ url("adm/$sm->url") }}'>{{ $sm->nama_menu }}</a>
                                     </li>
                                 @endif
                             @endforeach
                         </ul>
                     </div>
                 </li>
             @else
                 @if ($m->subMenu[0]['is_active'] === 1)
                     <li class="nav-item">
                         <a class="nav-link" href="{{ $m->subMenu[0]['url'] }}">
                             <span class="menu-title">{{ $m->nama_menu }}</span>
                             <i class="mdi {{ $m->icon }} menu-icon"></i>
                         </a>
                     </li>
                 @endif
             @endif
         @endforeach
     </ul>
 </nav>
