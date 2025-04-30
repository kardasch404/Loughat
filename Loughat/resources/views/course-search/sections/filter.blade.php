<div class="filter-sidebar">
    <div class="filter-sidebar__top">
        <button class="filter--cross">
            <svg width="20" height="19" viewBox="0 0 20 19" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.5967 4.59668L5.40429 13.7891" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M5.40332 4.59668L14.5957 13.7891" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>

    <form action="#">
        <div class="filter-sidebar__wrapper">
            <div class="accordion sidebar-filter" id="sidebarFilter">
                <!-- Category  -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="categoryAcc">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
                            category
                        </button>
                    </h2>
                    <div id="categoryCollapse" class="accordion-collapse collapse show" aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
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
                                        <label> Development </label>
                                    </div>
                                    <p class="check-details">
                                        45,770
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Level  -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="levelAcc">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#levelCollapse" aria-expanded="false" aria-controls="levelCollapse">
                            Level
                        </button>
                    </h2>
                    <div id="levelCollapse" class="accordion-collapse collapse" aria-labelledby="levelAcc" data-bs-parent="#sidebarFilter">
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
                                        <label> Beginner </label>
                                    </div>
                                    <p class="check-details">
                                        45,770
                                    </p>
                                </div>     
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <button class="button button-lg button--primary button--primary-filter w-100 d-lg-none" type="button">
        <span>
            <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
        Apply
    </button>
</div>