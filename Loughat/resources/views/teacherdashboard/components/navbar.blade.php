<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
    <!-- Profile Sidebar -->
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ session('user_photo') }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ session('user_firstname') }} {{ session('user_lastname') }}</h3>
                    
                    <div class="patient-details">
                        <h5 class="mb-0">deutsch</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li>
                        <a href="/teacher_dashboard">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/my-students">
                            <i class="fas fa-user-injured"></i>
                            <span>My students</span>
                        </a>
                    </li>
                    <li>
                        <a href="/courses">
                            <i class="fas fa-user-injured"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="/create-cours">
                            <i class="fas fa-user-injured"></i>
                            <span>create-cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="/create-cours-section">
                            <i class="fas fa-user-injured"></i>
                            <span>create-cours-section</span>
                        </a>
                    </li>
                    <li>
                        <a href="/create-cours-lessons">
                            <i class="fas fa-user-injured"></i>
                            <span>create-cours-lessons</span>
                        </a>
                    </li>
                    <li >
                        <a href="/student_course">
                            <i class="fas fa-file-invoice"></i>
                            <span>student course</span>
                        </a>
                    </li>
                    <li>
                        <a href="/teacher-reviews">
                            <i class="fas fa-star"></i>
                            <span>Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="/teacher-transaction">
                            <i class="fas fa-star"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="/comming_soon">
                            <i class="fas fa-comments"></i>
                            <span>Message</span>
                            <small class="unread-msg">23</small>
                        </a>
                    </li>
                    <li>
                        <a href="/teacher-profile">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="/teacher-password">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 7px 20px;">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>
    <!-- /Profile Sidebar -->
    
</div>