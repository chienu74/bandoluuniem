<div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav active ">
            @foreach($menus as $menu)
            <li class="nav-item ">
              <a class="nav-link" href="{{$menu->Link}}">{{$menu->MenuName}} <span class="sr-only">(current)</span></a>
            </li>
            @endforeach
          </ul>
          <div class="user_option">
            <a href="">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>