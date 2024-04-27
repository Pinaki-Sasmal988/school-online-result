<div class="mdk-drawer  js-mdk-drawer" id="default-drawer"data-align="start">
                        <div class="mdk-drawer__content">
                            <div class="sidebar sidebar-light sidebar-left sidebar-p-t"
                                 data-perfect-scrollbar>
                                <div class="sidebar-heading">Menu</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item active open">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#dashboards_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                                            <span class="sidebar-menu-text">Menu</span>
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse show "
                                            id="dashboards_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('dashboard')}}">
                                                    <span class="sidebar-menu-text">Dashboard</span>
                                                </a>
                                                
                                            </li>
                                        
                                            <li class="sidebar-menu-item mt-">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('classes')}}"> 
                                                    <span class="sidebar-menu-text ">Classes</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item mt-">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('subject')}}"> 
                                                    <span class="sidebar-menu-text ">Subjects</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item mt-">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('addStudent')}}">
                                                    <span class="sidebar-menu-text">Add Student</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('addMark')}}">
                                                    <span class="sidebar-menu-text">Add Mark</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('allStudent')}}">
                                                    <span class="sidebar-menu-text">All Students</span>
                                                </a>
                                            </li>
                                            <!-- <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="/updateProfile">
                                                    <span class="sidebar-menu-text">Update Profile</span>
                                                </a>
                                            </li> -->
                                           
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="{{route('schoolLogout')}}">
                                                    <span class="sidebar-menu-text">Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>                         
                            </div>
                        </div>
                    </div> 