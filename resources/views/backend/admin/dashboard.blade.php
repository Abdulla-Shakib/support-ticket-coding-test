@extends('backend.layouts.index')
@section('title', 'Ticket')
@section('content')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-primary">
                                {{ $counts['pending'] + $counts['open'] + $counts['in-progress'] + $counts['done'] + $counts['closed'] }}
                            </h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-primary">Total</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-secondary">{{ $counts['pending'] }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Pending</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-info">{{ $counts['open'] }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-info">Open</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-warning">{{ $counts['in-progress'] }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-warning">In-Progress</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-success">{{ $counts['done'] }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-success">Done</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-danger">{{ $counts['closed'] }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-danger">Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
