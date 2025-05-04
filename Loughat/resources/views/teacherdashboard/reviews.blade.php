@extends('layouts.teacher_dashboard')

@section('title', 'Reviews')

@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="doc-review review-listing">

        <!-- Review Listing -->
        <ul class="comments-list">

            <!-- Comment List -->
            @foreach ($reviews as $review)
            <li>
                <div class="comment">
                    <img class="avatar rounded-circle" alt="User Image" src="{{ $review->student->photo }} ">
                    <div class="comment-body">
                        <div class="meta-data row d-flex align-items-center">
                            <div class="col">
                                <span class="comment-author">{{ $review->student->firstname }} {{ $review->student->lastname }}</span>
                                <span class="comment-date d-block">Reviewed {{ $review->created_at->diffForHumans() }}</span>
                            </div>
                        
                            <div class="review-count rating col-auto text-end">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star filled"></i>
                                    @else
                                        <i class="fas fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <p class="comment-content">
                            {{ $review->message }}
                        </p>
                    </div>
                </div>
            
            </li>
            @endforeach
            <!-- /Comment List -->
        </ul>
        <!-- /Comment List -->

    </div>
</div>
@endsection

