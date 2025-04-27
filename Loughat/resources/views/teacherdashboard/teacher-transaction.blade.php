@extends('layouts.teacher_dashboard')

@section('title', 'Transaction')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card card-table">
            <div class="card-body">

                <!-- Invoice Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Command ID</th>
                                <th>Students</th>
                                <th>Cours Name</th>
                                <th>Amount</th>
                                <th class="text-center">Status</th>
                                <th>Paid On</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>
                                <td>
                                    <a href="">#{{$commande->id}}</a>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="{{$commande->user->photo}}"
                                                alt="User Image">
                                        </a>
                                        <a href="patient-profile.html">{{$commande->user->firstname}} {{$commande->user->lastname}} <span>#{{$commande->user->id}}</span></a>
                                    </h2>
                                </td>
                                <td>{{$commande->cours->title}}</td>
                                <td>${{$commande->montant}}</td>
                                <td class="text-center">
                                    @if ($commande->payment)
                                        <span class="badge badge-pill bg-success inv-badge">Paid</span>
                                    @else
                                        <span class="badge badge-pill bg-danger inv-badge">Not Paid</span>
                                    @endif
                                </td> 
                                <td>{{ $commande->created_at->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /Invoice Table -->

            </div>
        </div>
    </div>
@endsection
