<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{url('admin\dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/esd_favicon.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/ESD_logo.png') }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{url('admin\dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/esd_favicon.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/ESD_logo.png') }}" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\dashboard')}}">
                        <i class="ri-home-3-line"></i> <span>@lang('translation.dashboard')</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\partners')}}">
                        <i class="ri-user-heart-line"></i> <span>Partners</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\serviceIndex')}}">
                        <i class="ri-equalizer-line"></i> <span>Services</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\collaborate_portfolio')}}">
                        <i class="ri-layout-masonry-line"></i> <span>Portfolio</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\communicate_message')}}">
                        <i class="ri-message-line"></i> <span>Communicate</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button">
                        <i class="ri-article-line"></i> <span>Content</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin\content\converge')}}" class="nav-link">Converge</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin\content\collaborate')}}" class="nav-link">Collaborate</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin\heading\cache')}}" class="nav-link">Cache</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin\content\cogitate')}}" class="nav-link">Cogitate</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('admin\heading\communicate')}}" class="nav-link">Communicate</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin\converge')}}">
                        <i class="ri-focus-3-line"></i> <span>Converge</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps1" data-bs-toggle="collapse" role="button">
                        <i class="ri-profile-line"></i> <span>Collaborate</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin\collaborate_heading')}}" class="nav-link">Heading</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps2">
                        <i class="ri-service-line"></i></i> <span>Cogitate</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin\cogitate_heading')}}" class="nav-link">Heading</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps3" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps3">
                        <i class="ri-feedback-line"></i> <span>Communicate</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('admin\communicate_heading')}}" class="nav-link">Heading</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>