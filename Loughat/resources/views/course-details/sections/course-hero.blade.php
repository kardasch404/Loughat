   <!-- Breadcrumb Starts Here -->
        <section class="section event-sub-section" id="course-details">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="fs-6 text-secondary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="fs-6 text-secondary">Course</a>
                        </li>
                        <li class="breadcrumb-item fs-6 text-secondary d-none d-lg-inline-block" aria-current="page">
                            {{$cours->title}}
                        </li>
                    </ol>
                </nav>
                <div class="row event-sub-section-main">
                    <div class="col-lg-8">
                        <h3 class="font-title--sm">
                            {{$cours->title}}
                        </h3>
                        <div class="created-by d-flex align-items-center">
                            <div class="created-by-image me-3">
                                <img src="{{ $cours->teacher->photo }}" alt="" />
                            </div>
                            <div class="created-by-text">
                                <p>Created by</p>
                                <h6><a href="{{$cours->teacher->photo}}">{{$cours->teacher->firstname}} {{$cours->teacher->lastname}}</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-with-date d-flex align-items-lg-center">
                            <div class="icon-with-date-start d-flex align-items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M9.94438 2.34287L11.7457 5.96656C11.8359 6.14934 12.0102 6.2769 12.2124 6.30645L16.2452 6.88901C16.4085 6.91079 16.5555 6.99635 16.6559 7.12701C16.8441 7.37201 16.8153 7.71891 16.5898 7.92969L13.6668 10.7561C13.5183 10.8961 13.4522 11.1015 13.4911 11.3014L14.1911 15.2898C14.2401 15.6204 14.0145 15.93 13.684 15.9836C13.5471 16.0046 13.4071 15.9829 13.2826 15.9214L9.69082 14.0384C9.51037 13.9404 9.29415 13.9404 9.1137 14.0384L5.49546 15.9315C5.1929 16.0855 4.82267 15.9712 4.65778 15.6748C4.59478 15.5551 4.57301 15.419 4.59478 15.286L5.29479 11.2975C5.32979 11.0984 5.26368 10.8938 5.11901 10.753L2.18055 7.92735C1.94099 7.68935 1.93943 7.30201 2.17821 7.06246C2.17899 7.06168 2.17977 7.06012 2.18055 7.05935C2.27932 6.9699 2.40066 6.91001 2.5321 6.88668L6.56569 6.30412C6.76713 6.27223 6.94058 6.14623 7.03236 5.96345L8.83215 2.34287C8.90448 2.19587 9.03281 2.08309 9.18837 2.03176C9.3447 1.97965 9.51582 1.99209 9.66282 2.06598C9.78337 2.12587 9.88215 2.22309 9.94438 2.34287Z"
                                        stroke="#FF7A1A"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                                <p class="font-para--md">5.0 Star <span>(2,54,879)</span></p>
                            </div>
                            <div class="icon-with-date-end d-flex align-items-center">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 16.5C13.1421 16.5 16.5 13.1421 16.5 9C16.5 4.85786 13.1421 1.5 9 1.5C4.85786 1.5 1.5 4.85786 1.5 9C1.5 13.1421 4.85786 16.5 9 16.5Z"
                                        stroke="#FFC91B"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path d="M9 4.5V9L12 10.5" stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="font-para--md">3 Hours</p>
                            </div>
                        </div>
                        <div class="icon-with-date d-flex align-items-lg-cente mb-0">
                            <div class="icon-with-date-start d-flex align-items-center">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9C1 9 4 3 9.25 3C14.5 3 17.5 9 17.5 9C17.5 9 14.5 15 9.25 15C4 15 1 9 1 9Z" stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M9.25 11.25C10.4926 11.25 11.5 10.2426 11.5 9C11.5 7.75736 10.4926 6.75 9.25 6.75C8.00736 6.75 7 7.75736 7 9C7 10.2426 8.00736 11.25 9.25 11.25Z"
                                        stroke="#1089FF"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                                <p class="font-para--md">19,97,2547 Enrolled</p>
                            </div>
                            <div class="icon-with-date-end d-flex align-items-center">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                        stroke="#00AF91"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                        stroke="#00AF91"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                                <p class="font-para--md">35 Lesson</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Ends Here -->