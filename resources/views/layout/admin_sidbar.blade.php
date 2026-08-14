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
        <!-- start goethe -->
        <li class=" nav-item ">
            <a href="{{url('admin/goethe')}}"><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">goethe</span>
            </a>
            <ul class="menu-content">

                <li class="{{ Request::is('admin/questions') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/questions')}}">goethe listening</a>
                </li>
                <li class="{{ Request::is('admin/goethe-listening-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-listening-image')}}">goethe listening image</a>
                </li>
                <li class="{{ Request::is('admin/goethe-read') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-read')}}">goethe read</a>
                </li>
                <li class="{{ Request::is('admin/goethe-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-image')}}">goethe image</a>
                </li>
                <li class="{{ Request::is('admin/goethe-sub') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-sub')}}">goethe sub</a>
                </li>
                <li class="{{ Request::is('admin/goethe-writing') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-writing')}}">goethe writing</a>
                </li>
                <li class="{{ Request::is('admin/goethe-writing-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-writing-image')}}">goethe writing image</a>
                </li>
                <li class="{{ Request::is('admin/goethe-writing-question') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/goethe-writing-question')}}">goethe writing question</a>
                </li>
            </ul>
        </li>

        <!-- start telc -->
        <li class=" nav-item ">
            <a href="{{url('admin/telcs')}}"><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">telcs</span>
            </a>
            <ul class="menu-content">

                <li class="{{ Request::is('admin/telc-listening') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-listening')}}">telc listening</a>
                </li>
                <li class="{{ Request::is('admin/telc-listening-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-listening-image')}}">telc listening image</a>
                </li>
                <li class="{{ Request::is('admin/telc-read') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-read')}}">telc read</a>
                </li>
                <li class="{{ Request::is('admin/telc-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-image')}}">telc image</a>
                </li>
                <li class="{{ Request::is('admin/telc-sub') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-sub')}}">telc sub</a>
                </li>
                <li class="{{ Request::is('admin/telc-writing') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-writing')}}">telc writing</a>
                </li>
                <li class="{{ Request::is('admin/telc-writing-image') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-writing-image')}}">telc writing image</a>
                </li>
                <li class="{{ Request::is('admin/telc-writing-question') ? 'active' : '' }}">
                    <a class="menu-item" href="{{url('admin/telc-writing-question')}}">telc writing question</a>
                </li>
            </ul>
        </li>

        <!-- exercises -->
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
                        href="{{url('admin/exercises-read')}}" data-i18n="nav.dash.crypto">exercises Read</a>
                </li>

                <li class="{{ Request::is('admin/exercises-image') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-image')}}" data-i18n="nav.dash.crypto">exercises Image</a>
                </li>
                <li class="{{ Request::is('admin/exercises-sub') ? 'active' : '' }}"><a class="menu-item"
                        href="{{url('admin/exercises-sub')}}" data-i18n="nav.dash.crypto">exercises Sub</a>
                </li>
            </ul>
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