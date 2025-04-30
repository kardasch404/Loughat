<!-- Course Description Starts Here -->
<div class="container-fluid">
    <div class="row course-description">

        <div class="col-lg-8">
            <div class="course-description-start">
                <div class="video-area">
                    <video controls id="main-video-player" class="video-js w-100" poster="dist/images/courses/vthumb.jpg"
                        data-setup="{}">
                        @if ($currentLesson && $currentLesson->type == 'video')
                            <source src="{{ $currentLesson->file_path }}" class="w-100" />
                        @endif
                    </video>
                    <div id="file-display-container" class="file-display"
                        style="{{ $currentLesson && $currentLesson->type == 'file' ? '' : 'display: none;' }}">
                        <h3 id="file-title">{{ $currentLesson->title ?? 'File Resource' }}</h3>
                        <p>File: <a id="file-download-link"
                                href="{{ $currentLesson && $currentLesson->type == 'file' ? $currentLesson->file_path : '#' }}"
                                target="_blank" download>Download</a></p>
                        <div id="file-preview-area"></div>
                    </div>
                </div>
                <div class="course-description-start-content">
                    <h5 class="font-title--sm" id="lesson-title">{{ $currentLesson->title ?? 'Course Lesson' }}</h5>
                    <nav class="course-description-start-content-tab">
                        <!-- Your existing tabs -->
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-ldescrip-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-ldescrip" type="button" role="tab"
                                aria-controls="nav-ldescrip" aria-selected="true">
                                Lesson Description
                            </button>

                            <button class="nav-link" id="nav-lcomments-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-lcomments" type="button" role="tab"
                                aria-controls="nav-lcomments" aria-selected="false">Comments</button>
                            <button class="nav-link" id="nav-linstruc-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-linstruc" type="button" role="tab"
                                aria-controls="nav-linstruc" aria-selected="false">Teacher</button>
                        </div>
                    </nav>
                    <div class="tab-content course-description-start-content-tabitem" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ldescrip" role="tabpanel"
                            aria-labelledby="nav-ldescrip-tab">
                            <div class="lesson-description">
                                <p>
                                    Donec imperdiet erat tortor, nec consectetur odio fermentum et. Mauris vehicula
                                    faucibus viverra. Vestibulum varius ante enim. eu posuere ligula eleifend non.
                                    Praesent sapien nisi, luctus a tellus
                                    a, porta dapibus massa. Cras non mattis mauris. Etiam convallis purus a ante mattis,
                                    id tincidunt sapien hendrerit. Sed laoreet Check out my portfolio: <a
                                        href="#">https://bit.ly/2OZkYCo</a>
                                </p>
                            </div>
                            <!-- Lesson Description Ends Here -->
                        </div>

                        <div class="tab-pane fade" id="nav-lcomments" role="tabpanel"
                            aria-labelledby="nav-lcomments-tab">
                            <!-- Lesson Comments Starts Here -->
                            <div class="lesson-comments">
                                <div class="feedback-comment pt-0 ps-0 pe-0">
                                    <h6 class="font-title--card">Add a Public Comment</h6>
                                    <form action="#">
                                        <label for="comment">Comment</label>
                                        <textarea class="form-control" id="comment" placeholder="Add a Public Comment"></textarea>
                                        <button type="submit" class="button button-md button--primary float-end">Post
                                            Comment</button>
                                    </form>
                                </div>
                                <div class="students-feedback pt-0 ps-0 pe-0 pb-0 mb-0">
                                    <div class="students-feedback-heading">
                                        <h5 class="font-title--card">Comments <span>(57,685)</span></h5>
                                    </div>
                                    <div class="students-feedback-item">
                                        <div class="feedback-rating">
                                            <div class="feedback-rating-start">
                                                <div class="image">
                                                    <img src="dist/images/ellipse/user.jpg" alt="Image" />
                                                </div>
                                                <div class="text">
                                                    <h6><a href="#">Harry Pinsky</a></h6>
                                                    <p>1 hour ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            Aliquam eget leo quis neque molestie dictum. Etiam ut tortor tempor,
                                            vestibulum ante non, vulputate nibh. Cras non molestie diam. Great Course
                                            for Beginner 😀
                                        </p>
                                    </div>
                                    <div class="students-feedback-item">
                                        <div class="feedback-rating">
                                            <div class="feedback-rating-start">
                                                <div class="image">
                                                    <img src="dist/images/ellipse/1.png" alt="Image" />
                                                </div>
                                                <div class="text">
                                                    <h6><a href="#">Harry Pinsky</a></h6>
                                                    <p>2 hour ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            Aliquam eget leo quis neque molestie dictum. Etiam ut tortor tempor,
                                            vestibulum ante non, vulputate nibh.
                                        </p>
                                    </div>
                                    <div class="students-feedback-item">
                                        <div class="feedback-rating">
                                            <div class="feedback-rating-start">
                                                <div class="image">
                                                    <img src="dist/images/ellipse/2.png" alt="Image" />
                                                </div>
                                                <div class="text">
                                                    <h6><a href="#">Watcraz Eggsy</a></h6>
                                                    <p>1 day ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            Aenean vulputate nisi ligula. Quisque in tempus sapien. Quisque vestibulum
                                            massa eget consequat scelerisque. Phasellus varius risus nec maximus auctor.
                                        </p>
                                    </div>
                                    <div class="students-feedback-item border-0">
                                        <div class="feedback-rating">
                                            <div class="feedback-rating-start">
                                                <div class="image">
                                                    <img src="dist/images/ellipse/3.png" alt="Image" />
                                                </div>
                                                <div class="text">
                                                    <h6><a href="#">Watcraz Eggsy</a></h6>
                                                    <p>1 day ago</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            Cras non molestie diam. Aenean vulputate nisi ligula. Quisque in tempus
                                            sapien. Quisque vestibulum massa eget consequat scelerisque.
                                        </p>
                                    </div>
                                    <button class="button button-md button--primary-outline">Load More</button>
                                </div>
                            </div>
                            <!-- Lesson Comments Ends Here -->
                        </div>
                        <div class="tab-pane fade" id="nav-loverview" role="tabpanel"
                            aria-labelledby="nav-loverview-tab">
                            <!-- Course Overview Starts Here -->
                            <div class="row course-overview-main">
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Description</h6>
                                    <p class="mb-3 font-para--lg">
                                        Duis placerat eleifend leo nec mattis. Phasellus scelerisque arcu quis feugiat
                                        efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                        laoreet est eget est sagittis, et
                                        scelerisque quam convallis. Praesent at tortor facilisis, tempus ex quis, tempor
                                        arcu. Duis id velit mattis diam fermentum tincidunt. Sed et vehicula lectus.
                                    </p>
                                    <p class="font-para--lg">
                                        Sed ut tincidunt velit, eu bibendum turpis. Fusce in posuere felis, sed lobortis
                                        elit. Integer mollis sodales congue
                                    </p>
                                </div>
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Requirments</h6>
                                    <p class="mb-2 font-para--lg">
                                        Donec tristique ligula id tellus porta, dapibus imperdiet mi ullamcorper.
                                        Vivamus suscipit, nisi eu tincidunt interdum.
                                    </p>
                                    <ul class="course-overview__point">
                                        <li>
                                            <p>
                                                Mauris ut libero ut mauris sagittis consectetur quis eget elit.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Mauris ut libero ut mauris sagittis consectetur quis eget elit.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Mauris ut libero ut mauris sagittis consectetur quis eget elit.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Mauris ut libero ut mauris sagittis consectetur quis eget elit.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Mauris ut libero ut mauris sagittis consectetur quis eget elit.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Who This Course is For</h6>
                                    <p class="mb-2 font-para--lg">
                                        Sed arcu odio, ornare ac porttitor at, placerat nec dui. Nulla nec euismod
                                        tellus. Donec facilisis condimentum commodo. Pellentesque ultricies dolor ut
                                        magna aliquet, vitae sodales massa
                                        euismod.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5L13 5" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 0.999999L13 5L9 9" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        This Course for Complete Beginner Students who want learn UI/UX.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5L13 5" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 0.999999L13 5L9 9" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Nunc a ex sodales sem accumsan tristique.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5L13 5" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9 0.999999L13 5L9 9" stroke="#202029" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Suspendisse eget eros eget leo pellentesque ullamcorper ac non augue.
                                    </p>
                                </div>
                                <div class="course-overview-main-item mb-0">
                                    <h6 class="font-title--card">What You Will be Learn</h6>
                                    <p class="mb-2 font-para--lg">
                                        Sed arcu odio, ornare ac porttitor at, placerat nec dui. Nulla nec euismod
                                        tellus. Donec facilisis condimentum commodo. Pellentesque ultricies dolor ut
                                        magna aliquet, vitae sodales massa
                                        euismod.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4.5L6.75 13.5L3 9.40909" stroke="#00AF91" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        This Course for Complete Beginner Students who want learn UI/UX.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4.5L6.75 13.5L3 9.40909" stroke="#00AF91" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        Nunc a ex sodales sem accumsan tristique.
                                    </p>
                                    <p class="bullets-line">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4.5L6.75 13.5L3 9.40909" stroke="#00AF91" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Suspendisse eget eros eget leo pellentesque ullamcorper ac non augue.
                                    </p>
                                    <p class="bullets-line mb-0">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4.5L6.75 13.5L3 9.40909" stroke="#00AF91" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Suspendisse eget eros eget leo pellentesque ullamcorper ac non augue.
                                    </p>
                                </div>
                            </div>
                            <!-- Course Overview Ends Here -->
                        </div>
                        <div class="tab-pane fade" id="nav-linstruc" role="tabpanel"
                            aria-labelledby="nav-linstruc-tab">
                            <!-- course details instructor  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="course-instructor mw-100">
                                        <div class="course-instructor-info">
                                            <div class="instructor-image">
                                                <img src="dist/images/courses/courseinstructor.png"
                                                    alt="Instructor" />
                                            </div>
                                            <div class="instructor-text">
                                                <h6 class="font-title--xs"><a href="instructorreviews.html">Gartin
                                                        Bator</a></h6>
                                                <p>Senior Teacher</p>
                                                <div class="d-flex align-items-center instructor-text-bottom">
                                                    <div class="d-flex align-items-center ratings-icon">
                                                        <svg width="20" height="20" viewBox="0 0 20 20"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.94438 2.34287L11.7457 5.96656C11.8359 6.14934 12.0102 6.2769 12.2124 6.30645L16.2452 6.88901C16.4085 6.91079 16.5555 6.99635 16.6559 7.12701C16.8441 7.37201 16.8153 7.71891 16.5898 7.92969L13.6668 10.7561C13.5183 10.8961 13.4522 11.1015 13.4911 11.3014L14.1911 15.2898C14.2401 15.6204 14.0145 15.93 13.684 15.9836C13.5471 16.0046 13.4071 15.9829 13.2826 15.9214L9.69082 14.0384C9.51037 13.9404 9.29415 13.9404 9.1137 14.0384L5.49546 15.9315C5.1929 16.0855 4.82267 15.9712 4.65778 15.6748C4.59478 15.5551 4.57301 15.419 4.59478 15.286L5.29479 11.2975C5.32979 11.0984 5.26368 10.8938 5.11901 10.753L2.18055 7.92735C1.94099 7.68935 1.93943 7.30201 2.17821 7.06246C2.17899 7.06168 2.17977 7.06012 2.18055 7.05935C2.27932 6.9699 2.40066 6.91001 2.5321 6.88668L6.56569 6.30412C6.76713 6.27223 6.94058 6.14623 7.03236 5.96345L8.83215 2.34287C8.90448 2.19587 9.03281 2.08309 9.18837 2.03176C9.3447 1.97965 9.51582 1.99209 9.66282 2.06598C9.78337 2.12587 9.88215 2.22309 9.94438 2.34287Z"
                                                                stroke="#FF7A1A" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        <p>4.9 Star Rating</p>
                                                    </div>
                                                    <div class="d-flex align-items-center ratings-icon">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>

                                                        <p>5 Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="lead-p">Adobe Certified Instructor &amp; Adobe Certified Expert.</p>
                                        <p class="course-instructor-description">
                                            Joe has been preaching and practicing the gospel of User Experience (UX) to
                                            Fortune 100, 500 and Government organizations for nearly three decades. That
                                            work includes commercial industry
                                            leaders like Google Ventures, Kroll/Duff + Phelps, Broadridge, Conde Nast,
                                            Johns Hopkins, Mettler-Toledo, PHH Arval, SC Johnson and Wolters Kluwer, as
                                            well as government agencies like the
                                            National Science Foundation, National Institutes of Health and the Dept. of
                                            Homeland Security.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="videolist-area">
                <div class="videolist-area-heading">
                    <h6>Course Contents</h6>
                    <p>5% Completed</p>
                </div>
                <div class="videolist-area-bar">
                    <span class="videolist-area-bar--progress"></span>
                </div>
                <div class="videolist-area-bar__wrapper">
                    @foreach ($sectionsWithLessons as $sectionData)
                        <div class="videolist-area-wizard">
                            <div class="wizard-heading">
                                <h6 class="">{{ $sectionData['section']->title }}</h6>
                            </div>

                            @foreach ($sectionData['lessons'] as $lesson)
                                <div class="main-wizard">
                                    @if ($lesson->type == 'video')
                                        <div class="main-wizard__wrapper {{ $currentLesson && $currentLesson->id == $lesson->id ? 'active' : '' }}"
                                            data-lesson-id="{{ $lesson->id }}" data-lesson-type="video"
                                            data-video-url="{{ $lesson->file_path }}"
                                            data-lesson-title="{{ $lesson->title }}">
                                            <a href="javascript:void(0)" class="main-wizard-start lesson-link">
                                                <div class="main-wizard-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-play-circle">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                                    </svg>
                                                </div>
                                                <div class="main-wizard-title">
                                                    <p>{{ $lesson->order }}. {{ $lesson->title }}</p>
                                                </div>
                                            </a>
                                            <div class="main-wizard-end d-flex align-items-center">
                                                <span>{{ $lesson->duration }}</span>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        style="border-radius: 0px; margin-left: 5px;" />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="main-wizard__wrapper download-wizard {{ $currentLesson && $currentLesson->id == $lesson->id ? 'active' : '' }}"
                                            data-lesson-id="{{ $lesson->id }}" data-lesson-type="file"
                                            data-file-url="{{ $lesson->file_path }}"
                                            data-lesson-title="{{ $lesson->title }}">
                                            <a href="javascript:void(0)" class="main-wizard-start lesson-link">
                                                <div class="main-wizard-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-file">
                                                        <path
                                                            d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z">
                                                        </path>
                                                        <polyline points="13 2 13 9 20 9"></polyline>
                                                    </svg>
                                                </div>
                                                <div class="main-wizard-title">
                                                    <p>{{ $lesson->order }}. {{ $lesson->title }}</p>
                                                </div>
                                            </a>
                                            <div class="main-wizard-end">
                                                <span>{{ $lesson->file_size ?? '2.5 MB' }}</span>
                                                <small>Download</small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
