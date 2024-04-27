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
                                                   href="{{ route('addSchool')}}">
                                                    <span class="sidebar-menu-text">Dashboard</span>
                                                </a>
                                                
                                            </li>
                                        
                                            <li class="sidebar-menu-item mt-">
                                                <a class="sidebar-menu-button"
                                                   href="{{ route('allSchool')}}"> 
                                                    <span class="sidebar-menu-text ">All School</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item mt-">
                                                <a class="sidebar-menu-button"
                                                   href="#"> 
                                                    <span class="sidebar-menu-text ">Find Student</span>
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
                                                   href="{{route ('adminLogout')}}">
                                                    <span class="sidebar-menu-text">Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>                         
                            </div>
                        </div>
                    </div> 