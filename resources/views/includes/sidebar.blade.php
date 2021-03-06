      <!-- #Left Sidebar ==================== -->
      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="/">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <div class="circle"><p class="text">demo<p></div>
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">{{ config('app.name', '') }}</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">

            <li class="nav-item mT-30">
              <a class="sidebar-link" href="{{ url('/dashboard') }}">
                <span class="icon-holder">
                  <i class="c-grey-900 material-icons">dashboard</i>
                </span>
                <span class="title">{{ __('Dashboard') }}</span>
              </a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-grey-900 material-icons">help</i>
                </span>
                <span class="title">{{__('Help')}}</span>
                <span class="arrow">
                  <i class="c-grey-900 material-icons">chevron_right</i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="/docs">{{__('Documentation')}}</a>
                </li>
                <li>
                  <a class='sidebar-link' href="/terms">{{__('Terms of service')}}</a>
                </li>
                <li>
                  <a class='sidebar-link' href="/privacy">{{__('Privacy policy')}}</a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
