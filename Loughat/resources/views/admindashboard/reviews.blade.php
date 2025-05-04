@extends('layouts.admin_dashboard')

@section('title', 'Reviews')

@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Reviews</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Teacher Name</th>
                                        <th>Ratings</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ $review->student->photo }}" alt="Student Image">
                                                    </a>
                                                    <a href="{{ $review->student_id }}">
                                                        {{ $review->student->firstname }}
                                                        {{ $review->student->lastname }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ $review->teacher_id }}" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ $review->teacher->photo }}" alt="Teacher Image">
                                                    </a>
                                                    <a href="{{ $review->teacher_id }}">
                                                        {{ $review->teacher->firstname }}
                                                        {{ $review->teacher->lastname }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fe fe-star text-warning"></i>
                                                    @else
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td>
                                                {{ $review->message }}
                                            </td>
                                            <td>
                                                {{ $review->created_at->format('d M Y') }}<br>
                                                <small>{{ $review->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td class="text-right">
                                                <div class="actions">

                                                    <form action="{{ route('review.delete', $review->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm bg-danger-light"
                                                            onclick="return confirm('Are you sure ?')">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->

    </div>
@endsection
