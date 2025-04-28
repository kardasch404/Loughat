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
                            <!-- Other tabs remain unchanged -->
                        </div>
                    </nav>
                    <div class="tab-content course-description-start-content-tabitem" id="nav-tabContent">
                        <!-- Your existing tab contents -->
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
