<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="wrapper clearfix" style="color: #1c7430;">
    <header id="navbar-spy" class="header header-transparent header-fixed">
        <nav id="primary-menu" class="navbar navbar-fixed-top navbar-dark">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo dropdown-toggle menu-item" style="font-size: 24px;" href="{{ url('/') }}">

                        <img class="logo-light" src="{{asset('images/logo.png')}}" width="150px" height="150px" alt="Whole logo">
                        <img class="logo-dark" src="{{asset('images/logo.png')}}" width="150px" height="150px" alt="Whole logo">
                        {{--<img class="logo-dark" src="{{asset('images/logo/logo-dark.png')}}" alt="Whole logo">--}}
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1" style="color: black;">
                    <ul class="nav navbar-nav nav-pos-right navbar-right">

                        <!-- Home Menu -->
                        @auth
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                    مرحبا {{Auth::user()->name}}
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل خروج
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @if(Auth::user()->status == 1)
                                <li class="has-dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                        @if(Auth::user()->unreadNotifications->count() > 0)
                                            لديك
                                            <span class="badge"> {{Auth::user()->unreadNotifications->count()}}  </span>
                                            إشعار

                                        @else
                                            <span class="badge">  لا يوجد إشعارات جديدة </span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a data-toggle="dropdown" class="dropdown-toggle">
                                                شكاوي و مقترحات
                                            </a>
                                            <ul class="dropdown-menu">
                                                @forelse($suggesstions as $notification)
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item"
                                                           href="{{ url('notificationSuggestion/'.$notification->id) }}">
                                                            أرسل
                                                            {{$notification->data["data"]["name"]}}

                                                            {{$notification->data["type"]["name"]}}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="dropdown-submenu">
                                                        <a data-toggle="dropdown" class="dropdown-toggle">
                                                            لا يوجد إشعارت جديده
                                                        </a>
                                                    </li>
                                                @endforelse
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" style="font-size: 14px;"
                                                           href="{{ url('notificationSuggestion')}}">
                                                            عرض كل الشكاوي و المقترحات
                                                        </a>
                                                    </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a  data-toggle="dropdown" class="dropdown-toggle">
                                                تقييم المساجد
                                            </a>
                                            <ul class="dropdown-menu">
                                                @forelse($compliments as $notification)
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item"
                                                           href="{{ url('notification/'.$notification->id) }}">
                                                            أرسل
                                                            {{$notification->data["name"]}}
                                                            تقييم ل
                                                            {{$notification->data["mosque"]["name"]}}
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="dropdown-submenu">
                                                        <a data-toggle="dropdown" class="dropdown-toggle">
                                                            لا يوجد إشعارت جديده
                                                        </a>
                                                    </li>
                                                @endforelse
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" style="font-size: 14px;"
                                                       href="{{ url('notification')}}">
                                                        عرض كل تقاييم المساجد
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        {{--<li class="dropdown-submenu">--}}
                                            {{--<a class="dropdown-submenu text-center" href="{{url('notification')}}">--}}
                                                {{--عرض كل الإشعارات--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        <li class="dropdown-submenu">
                                            <a  data-toggle="dropdown" class="dropdown-toggle">
                                                الأنشطه
                                            </a>
                                            <ul class="dropdown-menu">
                                                @forelse($activites as $activity)
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item"
                                                           href="{{ url('notificationActivity/'.$activity->id) }}">

                                                            @if($activity->data["request_name"])
                                                                أرسل
                                                                {{$activity->data["request_name"]}}
                                                                طلب منشط
                                                                {{--{{$activity->data["mosque"]["name"]}}--}}
                                                                @else
                                                                أضاف
                                                                {{$activity->data["imam"]["name"]}}
                                                                منشط
                                                            @endif

                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="dropdown-submenu">
                                                        <a data-toggle="dropdown" class="dropdown-toggle">
                                                            لا يوجد إشعارت جديده
                                                        </a>
                                                    </li>
                                                @endforelse
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" style="font-size: 14px;"
                                                       href="{{ url('notification')}}">
                                                        عرض كل إشعارات المناشط
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                        المساجد
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="{{ url('location/all')}}">
                                                الجهات
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="{{ url('city/all')}}">
                                                المدن
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="{{ url('neighborhood/all')}}">
                                                الأحياء
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" href="{{ url('mosque/all')}}">
                                                المساجد
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    @if(Auth::user()->group->name == "مدير")
                                    <a href="{{ url('week') }}" class="dropdown-toggle menu-item">
                                        معاينه النشاطات
                                    </a>
                                    @elseif(Auth::user()->group->name == "داعيه")
                                        <a href="{{ url('activity') }}" class="dropdown-toggle menu-item">
                                            نشاطاتك
                                        </a>
                                    @endif

                                </li>
                                <li>

                                    <a href="{{ url('news') }}" class="dropdown-toggle menu-item">
                                        الأخبار
                                    </a>

                                </li>
                                <li>

                                    <a href="{{ url('addSermon') }}" class="dropdown-toggle menu-item">
                                        إضافة خطبة
                                    </a>

                                </li>
                                @if(Auth::user()->group->name == "مدير")
                                    <li>

                                        <a href="{{ url('admin/users') }}" class="dropdown-toggle menu-item">
                                            معلومات المستخدمين
                                        </a>

                                    </li>
                                @endif


                            @endif
                        @else

                            <li>

                                <a href="{{ route('login') }}" class="dropdown-toggle menu-item">تسجيل
                                    دخول</a>

                            </li>
                            <li>
                                <a href="{{ url('/register') }}" class="dropdown-toggle menu-item">التسجيل</a>
                            </li>
                        @endauth


                        @if(isset($welcome))

                            <li>

                                <a href="#blog" class="dropdown-toggle menu-item">تسجيل
                                    الأخبار</a>

                            </li>
                            <li>
                                <a href="#slider" class="dropdown-toggle menu-item">الخطب</a>
                            </li>

                            <li>
                                <a href="#complement" class="dropdown-toggle menu-item">تقييم مسجد</a>
                            </li>
                        @else
                            <li>

                                <a href="{{url("/welcome")}}#blog" class="dropdown-toggle menu-item">تسجيل
                                    الأخبار</a>

                            </li>
                            <li>
                                <a href="{{url("/welcome")}}?id=slider" class="dropdown-toggle menu-item">الخطب</a>
                            </li>

                            <li>
                                <a href="{{url("/welcome")}}?id=complement" class="dropdown-toggle menu-item">تقييم
                                    مسجد</a>
                            </li>
                        @endif

                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

    </header>
</div>

