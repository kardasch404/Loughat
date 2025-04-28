 <!-- Header Starts Here -->
 <header class="bg-transparent">
     <div class="container-fluid">
         <div class="coursedescription-header">
             <div class="coursedescription-header-start">
                 <a class="logo-image" href="index.html">
                     <img src="dist/images/logo/logo.png" alt="Logo" />
                 </a>
                 <div class="topic-info">
                     <div class="topic-info-arrow">
                         <a href="#">
                             <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path d="M15.5 19.5L8.5 12.5L15.5 5.5" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                         </a>
                     </div>
                     <div class="topic-info-text">
                         <h6 class="font-title--xs"><a href="#">{{$cours->title}}</a></h6>
                         <div class="lesson-hours">
                             <div class="book-lesson">
                                 <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z"
                                         stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                     <path
                                         d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z"
                                         stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                 </svg>
                                 <span>93 Lesson</span>
                             </div>
                             <div class="totoal-hours">
                                 <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M9 17C13.1421 17 16.5 13.6421 16.5 9.5C16.5 5.35786 13.1421 2 9 2C4.85786 2 1.5 5.35786 1.5 9.5C1.5 13.6421 4.85786 17 9 17Z"
                                         stroke="#FF7A1A" stroke-width="1.8" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                     <path d="M9 5V9.5L12 11" stroke="#FF7A1A" stroke-width="1.8" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                 </svg>
                                 <span>11.5 Hours</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="coursedescription-header-end">
                 <!-- <a href="#" class="rating-link" data-bs-toggle="modal" data-bs-target="#ratingModal">Leave a Rating</a> -->
                 <a href="#" class="button button--text" data-bs-toggle="modal"
                     data-bs-target="#ratingModal">Leave a Rating</a>

                 <!-- <a href="#" class="btn btn-primary regular-fill-btn">Next Lession</a> -->
                 <button class="button button--primary">Next Lession</button>
             </div>
         </div>
     </div>
 </header>
 <!-- Header Ends Here -->
