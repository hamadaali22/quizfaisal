<div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        @can('الرئيسية')
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{url('admin/dashboard')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Home</span></a>
        </li>
        @endcan
        <li class="nav-item {{ Request::is('admin/levels') ? 'active' : '' }}">
            <a href="{{url('admin/levels')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Levels</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/exams') ? 'active' : '' }}">
            <a href="{{url('admin/exams')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">GOETHE Exams</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/telc-exams') ? 'active' : '' }}">
            <a href="{{url('admin/telc-exams')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">telc exams</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/allexam') ? 'active' : '' }}">
            <a href="{{url('admin/allexam')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Latest Exam</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/questions') ? 'active' : '' }}">
            <a href="{{url('admin/questions')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Questions</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/questionsTelc') ? 'active' : '' }}">
            <a href="{{url('admin/questionsTelc')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Questions telc</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a href="{{url('admin/users')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">users</span></a>
        </li>
         @can('حسابي')
            <li class="nav-item {{ Request::is('admin/profile') ? 'active' : '' }}">
                <a href="{{url('admin/profile')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">My Profile</span></a>
            </li>
        @endcan
        <!-- @can('ارسال اشعارات لمدرب')
        <li   class="{{ Request::is('admin/instructor-notifaction') ? 'active' : '' }}">
            <a href="{{url('admin/instructor-notifaction')}}"><i class="la la-envelope"></i> <span class="menu-title">ارسال اشعارات لمدرب</span></a>
        </li>
        @endcan
        @can('ارسال اشعارات لطالب')
        <li   class="{{ Request::is('admin/student-notifaction') ? 'active' : '' }}">
            <a href="{{url('admin/student-notifaction')}}"><i class="la la-envelope"></i> <span class="menu-title">ارسال اشعارات لطالب</span></a>
        </li>
        @endcan -->
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a href="{{url('admin/settings')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">settings</span></a>
        </li>





       <!--  <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce">eCommerce</a>
            </li>
            <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Crypto</a>
            </li>
            <li class=""><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Sales</a>
            </li>
          </ul>
        </li>

        <li class=" nav-item"><a href="add-on-block-ui.html"><i class="la la-terminal"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Block UI</span></a>
        </li> -->

      </ul>
    </div>


  </div>
