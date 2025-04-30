<!-- courses Search Starts Here -->
<section class="section event-search">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="event-search-bar">
                    <form action="{{ route('course.search') }}" method="post">
                        @csrf

                        <div class="form-input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Course..." />
                            <button class="button button-lg button--primary" type="submit" name="submit"id="button-addon2">
                                Search
                            </button>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-search"
                            >
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-none d-lg-block">
                <div class="accordion sidebar-filter" id="sidebarFilter">
                    <!-- Category  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="categoryAcc">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#categoryCollapse" aria-expanded="true"
                                aria-controls="categoryCollapse">
                                category
                            </button>
                        </h2>
                        <div id="categoryCollapse" class="accordion-collapse collapse show"
                            aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="#">
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> All </label>
                                        </div>
                                        <p class="check-details">
                                            1,54,750
                                        </p>
                                    </div>
                                    @foreach ($categories as $categorie)
                                         <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> {{ $categorie->name}} </label>
                                        </div>
                                        <p class="check-details">
                                            45
                                        </p>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Level  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="levelAcc">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#levelCollapse" aria-expanded="false" aria-controls="levelCollapse">
                                Level
                            </button>
                        </h2>
                        <div id="levelCollapse" class="accordion-collapse collapse" aria-labelledby="levelAcc"
                            data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="#">
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> All </label>
                                        </div>
                                        <p class="check-details">
                                            1,54,750
                                        </p>
                                    </div>
                                    
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> A1 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> A2 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> B1 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> B2 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> C1 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" />
                                            <label> C2 </label>
                                        </div>
                                        <p class="check-details">
                                            000
                                        </p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="event-search-results">
                    <div class="event-search-results-heading">
                        <div class="" tabindex="0">
                        </div>
                        <p>1, 254 results found.</p>
                        <button class="button button-lg button--primary button--primary-filter d-lg-none"
                            id="filter">
                            <span>
                                <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            Filter
                        </button>
                    </div>
                </div>
                <div class="row event-search-content">
                    @if ($courses->isEmpty())
                        <div class="alert alert-info">
                            No courses found for 
                        </div>
                    @else
                        @foreach ($courses as $cours)
                            <div class="col-md-6 mb-4">
                                {{-- <form action="{{ route('cours', $cours->id) }}" method="GET">
                                @csrf
                                @method('POST') --}}
                                <div class="contentCard contentCard--course">
                                    <div class="contentCard-top">
                                        <a href="{{ route('cours', $cours->id) }}"><img
                                                src="{{ asset('storage/' . $cours->photo) }}" alt="images"
                                                class="img-fluid" /></a>
                                    </div>
                                    <div class="contentCard-bottom">
                                        <h5>
                                            <a href="{{ route('cours', $cours->id) }}"
                                                class="font-title--card">{{ $cours->title }}</a>
                                        </h5>
                                        <div
                                            class="contentCard-info d-flex align-items-center justify-content-between">
                                            <a href="instructor-profile.html"
                                                class="contentCard-user d-flex align-items-center">
                                                <img src="{{ $cours->teacher->photo }}" alt="client-image"
                                                    class="rounded-circle " style="width: 40px; height: 40px;" />
                                                <p class="font-para--md">{{ $cours->teacher->firstname }}
                                                    {{ $cours->teacher->lastname }}</p>
                                            </a>
                                            <div class="price">
                                                <span>{{ $cours->price }}</span>
                                                <del>$95</del>
                                            </div>
                                        </div>
                                        <div class="contentCard-more">
                                            <div class="d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="dist/images/icon/star.png" alt="star" />
                                                </div>
                                                <span>4.5</span>
                                            </div>
                                            <div class="eye d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="dist/images/icon/eye.png" alt="eye" />
                                                </div>
                                                <span>24,517</span>
                                            </div>
                                            <div class="book d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="dist/images/icon/book.png" alt="location" />
                                                </div>
                                                <span>37 Lesson</span>
                                            </div>
                                            <div class="clock d-flex align-items-center">
                                                <div class="icon">
                                                    <img src="dist/images/icon/Clock.png" alt="clock" />
                                                </div>
                                                <span>3 Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ $courses->links('vendor.pagination.custom') }}
                {{-- <div class="pagination-group mt-lg-5 mt-2">
                    <a href="#" class="p_prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </a>
                    <a href="#!1" class="cdp_i active">01</a>
                    <a href="#!2" class="cdp_i">02</a>
                    <a href="#!3" class="cdp_i">03</a>

                    <a href="#!+1" class="p_next">
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    

</section>
