<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>


                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ route('dashboard-index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{ route('employee.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Employe
                            </a>

                            <a class="nav-link" href="{{ route('dependent.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Dependent
                            </a>

                            <a class="nav-link" href="{{ route('deplocation.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Dept Locations
                            </a>
                            <a class="nav-link" href="{{ route('department.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Departemen
                            </a>
                            <a class="nav-link" href="{{ route('project.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Project
                            </a>
                            <a class="nav-link" href="{{ route('workson.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Works
                            </a>
                            @php
                                $notifs = \App\Notification::count();
                            @endphp
                            @if($notifs)
                                 </a>
                                @php
                                    $notif = \App\Notification::get();
                                @endphp
                                 <a style="color: #DC143C"  class="nav-link" href="{{ route('notif-index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Notification {{ $notif->count() }}
                                </a>
                            @else
                                 <a   class="nav-link" href="{{ route('notif-index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                               Notification
                            </a>
                            @endif

                        </div>
                    </div>

                </nav>
            </div>
