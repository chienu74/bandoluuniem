 <ul class="app-menu list-unstyled accordion" id="menu-accordion">
    @foreach($menus as $menu)
    @if ($menu->ParentID ==0)
        <li class="nav-item has-submenu">
            <a class="nav-link submenu-toggle" href="{{ url("Admin/".$menu->Link)}}" data-bs-toggle="collapse" data-bs-target="#submenu-{{$menu->AdminMenuID}}" aria-expanded="false" aria-controls="submenu-1">
                <span class="nav-icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                        <path
                            d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                    </svg>
                </span>
                <span class="nav-link-text">{{$menu->AdminMenuName}}</span>
                <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                    </svg>
                </span><!--//submenu-arrow-->
            </a><!--//nav-link-->
            <div id="submenu-{{$menu->AdminMenuID}}" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
               <ul class="submenu-list list-unstyled">
                    @foreach($menus as $menuc)
                        @if ($menuc->ParentID == $menu->AdminMenuID)
                            <li class="submenu-item"><a class="submenu-link" href="{{ url("Admin/".$menuc->Link)}}">{{$menuc->AdminMenuName}}</a></li>                    
                        @endif
                    @endforeach
                </ul>
            </div>
        </li><!--//nav-item-->
     @endif
    @endforeach
</ul><!--//app-menu-->