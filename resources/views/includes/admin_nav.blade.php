<nav class="navbar navbar-default navbar-static-top" role="navigation" >
@include('includes.admin_nav_top')





    {{--<ul class="nav navbar-nav navbar-right">--}}
    {{--@if(auth()->guest())--}}
    {{--@if(!Request::is('auth/login'))--}}
    {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
    {{--@endif--}}
    {{--@if(!Request::is('auth/register'))--}}
    {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
    {{--@endif--}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>--}}
    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li><a href="{{ url('/auth/logout') }}">Logout</a></li>--}}

    {{--<li><a href="{{ url('/admin/profile') }}/{{auth()->user()->id}}">Profile</a></li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endif--}}
    {{--</ul>--}}





    @include('includes.admin_side_nav')
    </div>
    <!-- /.navbar-static-side -->
</nav>