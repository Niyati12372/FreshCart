<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-success mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars heading"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    
                    <div class="nav-item dropdown heading">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle d-inline me-lg-2" alt="" style="width: 40px; height:40px;" src="{{url('upload/admin_images/'.Auth::user()->profile_image)}}"> 
                            <span class="d-none d-lg-inline-flex heading">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 heading">
                            <a href="{{route('admin.profile.edit')}}" class="dropdown-item ">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <a href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item py-0">
                                                Log Out
                            </a>
                        </form>
                        </div>
                    </div>
                </div>
            </nav>