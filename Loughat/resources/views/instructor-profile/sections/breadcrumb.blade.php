 <!-- Breadcrumb Starts Here -->
 <div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="fs-6 text-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/course-search') }}" class="fs-6 text-secondary">Courses</a></li>
                <li class="breadcrumb-item d-none d-lg-inline-block"><a href="course-details" class="fs-6 text-secondary">Course Detail Teacher</a></li>
                <li class="breadcrumb-item d-none d-lg-inline-block"><a href="#" class="fs-6 text-secondary">{{ $teacher->firstname }} {{ $teacher->lastname }}</a></li>
            </ol>
        </nav>
    </div>
</div>