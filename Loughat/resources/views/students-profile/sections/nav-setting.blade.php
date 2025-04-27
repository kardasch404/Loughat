<div class="tab-pane fade" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
    <div class="row">
        <div class="col-lg-9 order-2 order-lg-0">
            <div class="white-bg">
                <div class="students-info-form">
                    <h6 class="font-title--card">Your Information</h6>
                    <form action="#">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" placeholder="Phillip" id="fname" />
                            </div>
                            <div class="col-lg-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" placeholder="Bergson" id="lname" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="phillip.bergson@gmail.com" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="do">What Do You Do</label>
                                <input type="text" id="do" class="form-control" placeholder="UI/UX Designer" />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="pnumber">Phone Number</label>
                                <input type="text" class="form-control" placeholder="+8801236-858966" id="pnumber" />
                            </div>
                            <div class="col-lg-6">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" placeholder="Bangladesh" id="nationality" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-lg-end justify-content-center mt-2">
                            <button class="button button-lg button--primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="white-bg mt-4">
                <div class="students-info-form">
                    <h6 class="font-title--card">Change Password</h6>
                    <form action="#">
                        <div class="row">
                            <div class="col-12">
                                <label for="cpass">Current Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="cpass" class="form-control" placeholder="Enter Password" />
                                    <div class="input-icon" onclick="showPassword('cpass',this)">
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
                                            class="feather feather-eye"
                                        >
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="npass">New Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="npass" class="form-control" placeholder="Enter Password" />
                                    <div class="input-icon" onclick="showPassword('npass',this)">
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
                                            class="feather feather-eye"
                                        >
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="cnpass">Confirm New Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="cnpass" class="form-control" placeholder="Enter Password" />
                                    <div class="input-icon" onclick="showPassword('cnpass',this)">
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
                                            class="feather feather-eye"
                                        >
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-lg-end justify-content-center mt-2">
                            <button class="button button-lg button--primary" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
            <div class="white-bg">
                <div class="change-image-wizard">
                    <div class="image mx-auto">
                        <img src="dist/images/user/user-img-01.jpg" alt="User" />
                    </div>
                    <form action="#">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button button--primary-outline">CHANGE iMAGE</button>
                        </div>
                    </form>
                    <p>Image size should be under 1MB image ratio 200px.</p>
                </div>
            </div>
        </div>
    </div>
</div>