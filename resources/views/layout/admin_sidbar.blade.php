<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        @can('الرئيسية')
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{url('admin/dashboard')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">Home</span></a>
        </li>
        @endcan
        <li class="nav-item {{ Request::is('admin/levels') ? 'active' : '' }}">
            <a href="{{url('admin/levels')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">Levels</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/exams') ? 'active' : '' }}">
            <a href="{{url('admin/exams')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">GOETHE
                    Exams</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/telc-exams') ? 'active' : '' }}">
            <a href="{{url('admin/telc-exams')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">telc exams</span></a>
        </li>
        <li class=" nav-item ">
            <a href="{{url('admin/exercises')}}"><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">exercises</span>
                <!-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> -->
            </a>
            <ul class="menu-content">
                <li class="{{ Request::is('admin/exercises') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises')}}" data-i18n="nav.dash.ecommerce">exercises
                        listening</a>
                </li>
                <li class="{{ Request::is('admin/exercises-listening-image') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-listening-image')}}" data-i18n="nav.dash.crypto">exercises
                        listening image</a>
                </li>
                <li class="{{ Request::is('admin/exercises-read') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-read')}}" data-i18n="nav.dash.crypto">exercises
                        reading</a>
                </li>

                <li class="{{ Request::is('admin/exercises-image') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-image')}}" data-i18n="nav.dash.crypto">exercises
                        listening image</a>
                </li>
                <li class="{{ Request::is('admin/exercises-sub') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-sub')}}" data-i18n="nav.dash.crypto">exercises
                        listening image</a>
                </li>
            </ul>
        </li>
        <!-- <li class="nav-item ">
            <a href="{{url('admin/exercises')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">exercises listening</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/exercises-read') ? 'active' : '' }}">
            <a href="{{url('admin/exercises-read')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">exercises reading </span></a>
        </li> -->
        <li class="nav-item {{ Request::is('admin/quize-exams') ? 'active' : '' }}">
            <a href="{{url('admin/quize-exams')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">quize
                    exams</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/allexam') ? 'active' : '' }}">
            <a href="{{url('admin/allexam')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">Latest Exam</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/questions') ? 'active' : '' }}">
            <a href="{{url('admin/questions')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">Questions</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/questionsTelc') ? 'active' : '' }}">
            <a href="{{url('admin/questionsTelc')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">Questions telc</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a href="{{url('admin/users')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">users</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/sets') ? 'active' : '' }}">
            <a href="{{url('admin/sets')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">groups</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/quizes') ? 'active' : '' }}">
            <a href="{{url('admin/quizes')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">quizes</span></a>
        </li>
        @can('حسابي')
        <li class="nav-item {{ Request::is('admin/profile') ? 'active' : '' }}">
            <a href="{{url('admin/profile')}}"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">My
                    Profile</span></a>
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
            <a href="{{url('admin/settings')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">settings</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/meta-pages') ? 'active' : '' }}">
            <a href="{{url('admin/meta-pages')}}"><i class="la la-envelope"></i><span class="menu-title"
                    data-i18n="">meta of pages</span></a>
        </li>








        <!--<li class=" nav-item"><a href="add-on-block-ui.html"><i class="la la-terminal"></i><span class="menu-title"
                    data-i18n="nav.add_on_block_ui.main">Block UI</span></a>
            </li> -->

    </ul>
</div>


</div>