        <!-- ### $Topbar ### -->
        <div class="header navbar" id="header-navbar">
          <div class="header-container">
            <ul class="nav-left">
              <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                  <i class="c-grey-900 material-icons">menu</i>
                </a>
              </li>
              <!--
              <li class="search-box">
                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                  <i class="search-icon material-icons pdd-right-10">search</i>
                  <i class="search-icon-close material-icons pdd-right-10">close</i>
                </a>
              </li>
              <li class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
              </li>
              -->
            </ul>
            <ul class="nav-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                  <div class="peer mR-10">
                    <img class="w-2r bdrs-50p" src="{{ Auth::user()->getFirstMediaUrl('avatar', 'thumb') }} " alt="">
                  </div>
                  <div class="peer">
                    <span class="arrow">
                      <i id="user-dropdown-arrow" class="c-grey-900 material-icons">expand_more</i>
                    </span>
                  </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                  <li class="nav-li">
                    <a href="{{ route('account.profile.edit') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-900">
                      <div class="peer position-absolute">
                        <img class="w-2r bdrs-50p mt-1" src="{{ Auth::user()->getFirstMediaUrl('avatar', 'thumb') }} " alt="">
                      </div>
                      <div class="peer ml-5">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-email text-muted">{{ Auth::user()->email }}</span>
                    </div>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="{{ route('account.profile.edit') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-900">
                      <i class="material-icons mR-10">person</i>
                      <span>{{ __('ACCOUNT') }} </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('users.index') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-900">
                      <i class="material-icons mR-10">group</i>
                      <span>{{ __('USERS') }} </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-900"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="material-icons mR-10">exit_to_app</i>
                      <span>{{ __('LOGOUT') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
