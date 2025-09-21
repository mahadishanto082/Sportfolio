<div class="br-header d-print-none">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down">
            <a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up">
            <a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a>
        </div>
    </div>

    <div class="br-header-right">
        <nav class="nav">

            <div class="dropdown">
                <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-android-send tx-24"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-header">
                    <div class="dropdown-menu-label">
                        <label>New Orders</label>
                    </div>
                    <div class="media-list">
                        <!-- Order items will go here -->
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="icon ion-ios-bell-outline tx-24"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-header">
                    <div class="dropdown-menu-label">
                        <label>Withdraw Request</label>
                    </div>
                    <div class="media-list">
                        <!-- Withdraw request items will go here -->
                    </div>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down">Admin Name</span>
                    <img style="width: 30px; height: 30px" src="assets/admin/img/img1.jpg" class="wd-32 rounded-circle" alt="">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-250">
                    <div class="tx-center">
                        <a href="#">
                            <img style="width: 80px; height: 80px" src="assets/admin/img/img1.jpg" class="rounded-circle" alt="">
                        </a>
                        <h6 class="logged-fullname">Admin Name</h6>
                        <p>admin@example.com</p>
                    </div>
                    <hr>
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="#"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                        <li><a href="#"><i class="icon ion-ios-gear"></i> Settings</a></li>
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i> Sign Out
                            </a>
                        </li>
                        </ul>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </ul>
                    </div><!-- dropdown-menu -->
                </div>
            </div>

        </nav>
    </div>
</div>
