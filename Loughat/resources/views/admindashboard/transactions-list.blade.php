@extends('layouts.admin_dashboard')

@section('title', 'Transtaction')

@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Transactions</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
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
                                        <th>Commande ID</th>
                                        <th>STudent ID</th>
                                        <th>STudent Name</th>
                                        <th>Teacher Name</th>
                                        <th>Course Name</th>
                                        <th>Total Amount</th>
                                        <th>Created Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandes as $commande)
                                    <tr>
                                        <td><a href="">#{{$commande->id}}</td>
                                        <td>#{{$commande->user->id}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{$commande->user->photo}}" alt="User Image"></a>
                                                <a href="">{{$commande->user->firstname}} {{$commande->user->lastname}} </a>
                                            </h2>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{$commande->cours->teacher->photo}}" alt="User Image"></a>
                                                <a href="profile.html">{{$commande->cours->teacher->firstname}} {{$commande->cours->teacher->lastname}}</a>
                                            </h2>
                                        </td>
                                        <td class="w-25 text-wrap" style="word-break: break-word;">{{$commande->cours->title}}</td>
                                        <td class="">${{$commande->montant}}</td>
                                        <td class="">{{ $commande->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            @if ($commande->payment)
                                                <span class="badge badge-pill bg-success inv-badge">Paid</span>
                                            @else
                                                <span class="badge badge-pill bg-danger inv-badge">Not Paid</span>
                                            @endif
                                        </td>                                        
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-danger-light" data-toggle="modal"
                                                    href="#delete_modal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
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
