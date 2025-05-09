@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- Breadcrumb Starts Here -->
    <div class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html" class="fs-6 text-secondary">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="about.html" class="fs-6 text-secondary">About</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb Ends Here -->

    <!-- About Intro Starts Here -->
    <section class="about-intro section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 position-relative mt-4 mt-lg-0" style="z-index: 0;">
                    <div class="about-intro__img-wrapper">
                        <img src="{{ asset('assets/user/dist/images/about/intro.jpg') }}" alt="Intro Image"
                            class="img-fluid rounded-2 ms-lg-5 position-relative intro-image" />
                    </div>
                    <div class="intro-shape">
                        <img src="{{ asset('assets/user/dist/images/shape/rec04.png') }}" alt="Shape"
                            class="img-fluid shape-01" />
                        <img src="{{ asset('assets/user/dist/images/shape/dots/dots-img-09.png') }}" alt="Shape"
                            class="img-fluid shape-02" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-intro__textContent">
                        <h2 class="font-title--md mb-3">A Great Place to Grow.</h2>
                        <p class="mt-2 mt-lg-1 mb-2 mb-lg-4 text-secondary">
                            Vestibulum efficitur accumsan sapien ut lacinia. Sed euismod ullamcorper rhoncus. Phasellus
                            interdum rutrum nisi ut lacinia. Nulla et sapien at turpis viverra. Cras odio ex, posuere id est
                            et, viverra
                            condimentum felis
                        </p>
                        <p class="text-secondary">
                            congue quis non odio. Aliquam sem ligula, commodo quis ipsum mattis, lacinia cursus magna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Intro Ends Here -->

    <!-- About Feature Starts Here -->
    <section class="section aboutFeature pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-feature dark-feature">
                        <h5 class="text-white font-title--sm">Who We Are</h5>
                        <p class="text-lowblack">
                            Suspendisse potenti. Pellentesque augue ligula, dictum at pretium eu, fermentum sit amet risus.
                            Maecenas congue feugiat libero, sed euismod urna congue eleifend. Maecenas et gravida felis.
                            Vivamus iaculis
                            tellus sit amet egestas luctus. Phasellus urna eros.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="about-feature">
                        <h5 class="font-title--sm">Our Mission</h5>
                        <p class="text-secondary">
                            Maecenas consectetur ultrices tortor, eget efficitur tortor finibus at. Sed convallis efficitur
                            turpis, eget dapibus magna. Nam euismod lacus ac nulla vehicula aliquam.Curabitur efficitur
                            vehicula sagittis.
                            Cras convallis tellus ac quam efficitur viverra. Maecenas consectetur
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Feature Ends Here -->
    <section class="mt-4">

    </section>

@endsection
