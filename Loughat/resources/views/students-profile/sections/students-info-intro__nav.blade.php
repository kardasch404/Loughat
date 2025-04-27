      <!-- Nav  -->
      <nav class="students-info-intro__nav">
        <div class="nav" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">My Profile</button>

            <button class="nav-link" id="nav-coursesall-tab" data-bs-toggle="tab" data-bs-target="#nav-coursesall" type="button" role="tab" aria-controls="nav-coursesall" aria-selected="false">All Courses</button>

            <button class="nav-link" id="nav-activecourses-tab" data-bs-toggle="tab" data-bs-target="#nav-activecourses" type="button" role="tab" aria-controls="nav-activecourses" aria-selected="false">
                Active Courses
            </button>

            <button class="nav-link" id="nav-completedcourses-tab" data-bs-toggle="tab" data-bs-target="#nav-completedcourses" type="button" role="tab" aria-controls="nav-completedcourses" aria-selected="false">
                Completed Courses
            </button>

            <button class="nav-link" id="nav-purchase-tab" data-bs-toggle="tab" data-bs-target="#nav-purchase" type="button" role="tab" aria-controls="nav-purchase" aria-selected="false">Purchase History</button>

            <button class="nav-link" id="nav-setting-tab" data-bs-toggle="tab" data-bs-target="#nav-setting" type="button" role="tab" aria-controls="nav-setting" aria-selected="false">Setting</button>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link" id="nav-logout-tab">
                    Logout
                </button>
            </form>
            
        </div>
    </nav>