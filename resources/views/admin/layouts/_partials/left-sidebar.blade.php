@php
$user = Auth::user();
$role = $user->role;
$user_access = explode(',', $user->access_level);
@endphp
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex align-items-center">
            <div>
                {{-- <img src="{{ asset('/images/main/' . $dashboard_composer->logo) }}" class="rounded" width="45px" /> --}}
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <ul class="side-menu metismenu">

            <li class="heading">Menu</li>
            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Dashboard</span></a>
            </li>
            {{-- Dashboard --}}

            {{-- Site Settings --}}
            <li>
                <a href="{{ route('setting') }}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Site Settings</span></a>
            </li>
            {{-- Site Settings end --}}

            {{-- page --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Pages</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('pages.about')}}">
                            <span class="fa fa-circle-o"></span>
                            About
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{route('user.create')}}"> --}}
                            <a href="{{route('pages.contact')}}">
                                <span class="fa fa-circle-o"></span>
                            Contact
                        </a>
                    </li>
                </ul>
            </li>
            {{-- page end --}}

            {{-- Guests --}}
            <li>
                <a href="{{route('guest.index')}}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Guests</span></a>
            </li>
            {{-- Guests end --}}

            {{-- Series --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Series</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('series.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All lists
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{route('user.create')}}"> --}}
                            <a href="{{route('series.create')}}">
                            <span class="fa fa-plus"></span>
                            Add new
                        </a>
                    </li>

                </ul>
            </li>
            {{-- Series end --}}

            {{-- events --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Past Events</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('event.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All lists
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{route('user.create')}}"> --}}
                            <a href="{{route('event.create')}}">
                            <span class="fa fa-plus"></span>
                            Add new
                        </a>
                    </li>

                </ul>
            </li>
            {{-- events end --}}

            <li>
                <a href="{{ route('upcomingevent.index') }}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Upcoming Event</span></a>
            </li>

            {{-- Event Gallery --}}
            <li>
                <a href="{{ route('event.gallery') }}"><i class="sidebar-item-icon fa fa-globe"></i>
                    <span class="nav-label">Gallery</span></a>
            </li>
            {{-- Event Gallery end --}}

            {{-- blog --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Blog</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('blogs.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All lists
                        </a>
                    </li>
                </ul>
            </li>
            {{-- blog end --}}

            {{-- Users --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('users.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All lists
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{route('user.create')}}"> --}}
                            <a href="{{route('users.create')}}">
                            <span class="fa fa-plus"></span>
                            Add new
                        </a>
                    </li>

                </ul>
            </li>
            {{-- users end --}}

            {{-- Booking --}}
            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Booking</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('bookings.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All lists
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Booking end --}}

        </ul>
    </div>
</nav>
{{-- <li>
    <a href="javascript:;">
        <i class="sidebar-item-icon fa fa-sitemap"></i>
        <span class="nav-label">User Enquiry</span>
        <i class="fa fa-angle-left arrow"></i>
    </a>
    <ul class="nav-2-level collapse">
        <li>
            <a href="">
                <span class="fa fa-circle-o"></span>
                Enquiry List
            </a>
        </li>
        <li>
            <a href="">
                <span class="fa fa-circle-o"></span>
                Subscriber List
            </a>
        </li>

    </ul>
</li> --}}

{{-- @if ($role == 'super-admin' || ($role == 'admin' && in_array('datetime', $user_access)))
    <li>
        <a href="javascript:;">
            <i class="sidebar-item-icon fa fa-sitemap"></i>
            <span class="nav-label">Date Time</span>
            <i class="fa fa-angle-left arrow"></i>
        </a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{ route('datetime.index') }}">
                    <span class="fa fa-circle-o"></span>
                    All lists
                </a>
            </li>
            <li>
                <a href="{{ route('datetime.create') }}">
                    <span class="fa fa-plus"></span>
                    Add new
                </a>
            </li>

        </ul>
    </li>
@endif

@if ($role == 'super-admin' || ($role == 'admin' && in_array('scholarship', $user_access)))
    <li>
        <a href="javascript:;">
            <i class="sidebar-item-icon fa fa-sitemap"></i>
            <span class="nav-label">Scholarship/Institution</span>
            <i class="fa fa-angle-left arrow"></i>
        </a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{ route('scholarship.index') }}">
                    <span class="fa fa-circle-o"></span>
                    All lists
                </a>
            </li>
            <li>
                <a href="{{ route('scholarship.create') }}">
                    <span class="fa fa-plus"></span>
                    Add new
                </a>
            </li>

        </ul>
    </li>
@endif --}}

{{-- @if ($role == 'super-admin' || ($role == 'admin' && in_array('year', $user_access)))
    <li>
        <a href="javascript:;">
            <i class="sidebar-item-icon fa fa-sitemap"></i>
            <span class="nav-label">Passed Year</span>
            <i class="fa fa-angle-left arrow"></i>
        </a>
        <ul class="nav-2-level collapse">
            <li>
                <a href="{{ route('year.index') }}">
                    <span class="fa fa-circle-o"></span>
                    All lists
                </a>
            </li>
            <li>
                <a href="{{ route('year.create') }}">
                    <span class="fa fa-plus"></span>
                    Add new
                </a>
            </li>

        </ul>
    </li>
@endif --}}
