@extends('layouts.app')

@section('title', 'Coming Soon')

@section('content')
    <!-- Coming Soon Area Starts Here -->
    <section class="comingsoon-area">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="comingsoon-area-start">
                        <h1 class="font-title--lg">Coming Soon</h1>
                        <p>Something cool is coming soon. Get notified when we launch.</p>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group d-flex align-items-center">
                                <input type="email" name="email" placeholder="Enter Your Email" class="form-control" required />
                                <button type="submit" class="button button-lg button--primary">Notify Me</button>
                            </div>
                        </form>
                        <div class="count-down mt-lg-5" id="countdown"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comingsoon-area-shape">
            <img src="{{ asset('assets/user/dist/images/comingsoon/01.png') }}" alt="Shape" class="img-fluid shape-01" />
            <img src="{{ asset('assets/user/dist/images/comingsoon/02.png') }}" alt="Shape" class="img-fluid shape-02" />
            <img src="{{ asset('assets/user/dist/images/comingsoon/03.png') }}" alt="Shape" class="img-fluid shape-03" />
            <img src="{{ asset('assets/user/dist/images/comingsoon/04.png') }}" alt="Shape" class="img-fluid shape-04" />
        </div>
    </section>
    <!-- Coming Soon Area Ends Here -->
    <script>
        $(document).ready(function () {
            $("#countdown").syotimer({
                year: 2026,
                month: 4,
                day: 1, 
                hour: 20,
                minute: 30,
            });
        });
    </script>
@endsection