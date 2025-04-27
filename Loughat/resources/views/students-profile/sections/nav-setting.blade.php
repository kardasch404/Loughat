<div class="tab-pane fade" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
    <div class="row">
        <div class="col-lg-9 order-2 order-lg-0">
            <div class="white-bg">
                <div class="students-info-form">
                    <h6 class="font-title--card">Your Information</h6>
                    <form action="{{ route('students-profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control"  name="firstname" id="firstname" value="{{ $user->firstname }}" />
                            </div>
                            <div class="col-lg-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control"  name="lastname" id="lastname" value="{{ $user->lastname }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"  value="{{ $user->email }}" />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control"  id="phone" name="phone" value="{{ $user->phone }}" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-lg-end justify-content-center mt-2">
                            <button class="button button-lg button--primary" type="submit" name="submit">Save Changes</button>
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
        {{-- <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
            <div class="white-bg">
                <div class="change-image-wizard">
                    <div class="image mx-auto">
                        <img src="{{ $user->photo }}" alt="User" />
                    </div>
                    <form action="{{ route('students-profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="button button--primary-outline">CHANGE iMAGE</button>
                        </div>
                    </form>
                    <p>Image size should be under 1MB image ratio 200px.</p>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
            <div class="white-bg">
                <div class="change-image-wizard">
                    <div class="image mx-auto">
                        <img src="{{ $user->photo }}" alt="User" id="preview-image" style="width: 200px; height: 200px; object-fit: cover;"/>
                    </div>
                    <form action="{{ route('students-profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-center">
                            <label for="photo" class="btn btn-primary">Choose Image</label>
                            <input type="file" name="photo" id="photo" style="display: none;" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="button button--primary-outline">CHANGE IMAGE</button>
                        </div>
                    </form>
                    <p>Image size should be under 1MB and image ratio 200px.</p>    
                </div>
            </div>
        </div>        
    </div>
</div>