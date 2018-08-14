        <!-- ### $Topbar ### -->
        <div class="header navbar">
          <div class="header-container">
            <ul class="nav-left">
              <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                  <i class="ti-menu"></i>
                </a>
              </li>
              <li class="search-box">
                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                  <i class="search-icon ti-search pdd-right-10"></i>
                  <i class="search-icon-close ti-close pdd-right-10"></i>
                </a>
              </li>
              <li class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
              </li>
            </ul>
            <ul class="nav-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                  <div class="peer mR-10">
                    <img class="w-2r bdrs-50p" src="{{ Auth::user()->getFirstMediaUrl('avatar', 'thumb') }} " alt="">
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
                  </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                  <!-- <li>
                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-settings mR-10"></i>
                      <span>{{ __('Settings') }} </span>
                    </a>
                  </li> -->
                  <li>
                    <a href="{{ route('account.profile.edit') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-user mR-10"></i>
                      <span>{{ __('Account') }} </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('users.index') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-user mR-10"></i>
                      <span>{{ __('Users') }} </span>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="ti-power-off mR-10"></i>
                      <span>{{ __('Logout') }}</span>
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