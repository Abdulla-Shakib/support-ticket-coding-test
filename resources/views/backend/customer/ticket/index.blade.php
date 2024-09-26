@extends('backend.layouts.index')
@section('title', 'Ticket')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ticket</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('customer-tickets.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-md-5 mr-auto">
                                <form method="GET" action="{{ route('customer-tickets.index') }}">
                                    <div class="input-group mb-3">
                                        <input type="search" name="search" class="form-control" placeholder="search">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a href="{{ request()->url() }}" class="btn btn-secondary">
                                            Clear
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $item)
                                    <tr>
                                        <td class="text-truncate">{{ serialNumber($tickets, $loop) }}</td>
                                        <td>{{ $item->subject }}</td>

                                        <td>{{ Str::limit($item->description, 20) }}</td>
                                        <td> {{ $item->created_at->format('d M Y, h:i A') }} </td>
                                        <td>
                                            <span
                                                class="
                                                @if (!$item->latestAdminTicket) badge bg-secondary  
                                                @elseif ($item->latestAdminTicket->status == 'open') 
                                                    badge bg-success 
                                                @elseif ($item->latestAdminTicket->status == 'in-progress') 
                                                    badge bg-warning 
                                                @else 
                                                    badge bg-danger @endif">
                                                {{ !$item->latestAdminTicket ? 'Pending' : ucfirst($item->latestAdminTicket->status) }}
                                            </span>
                                        </td>

                                        <td class="text-truncate">
                                            <a class="text-secondary"
                                                href="{{ route('customer-tickets.show', $item->id) }}">
                                                <i class="fadeIn animated bx bx-message-square-detail"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="9">
                                            <h5 class="font-weight-bold">No Data available</h5>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $tickets->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
