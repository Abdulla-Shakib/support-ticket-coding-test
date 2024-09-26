@extends('backend.layouts.index')
@section('title', 'Ticket-Show')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Ticket
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('admin-tickets.index') }}" class="btn btn-primary">List</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">

                        <div class="col-md-12">
                            <label for="inputFirstName" class="form-label">Subject <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputFirstName" placeholder="Subject"
                                name="subject" value="{{ $customer_ticket->subject }}" readonly>

                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="inputAddress" placeholder="Description" name="description" rows="8" readonly> {{ $customer_ticket->description }} </textarea>

                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Review <span
                                    class="text-secondary">[Optional]</span></label>
                            <textarea class="form-control" id="inputAddress" placeholder="Description" name="review" rows="4" readonly> {{ old('review') }} </textarea>
                            @error('review')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inputStatus" class="form-label">Status <span class="text-danger">*</span></label>
                            <select id="inputState" class="form-select" name="status" disabled>
                                <option selected="" value="" disabled>Select Status</option>
                                <option value="pending" {{ !$latestAdminTicket ? 'selected' : '' }}>Pending</option>
                                <option value="open"
                                    {{ $latestAdminTicket && $latestAdminTicket->status === 'open' ? 'selected' : '' }}>Open
                                </option>
                                <option value="closed"
                                    {{ $latestAdminTicket && $latestAdminTicket->status === 'closed' ? 'selected' : '' }}>
                                    Closed</option>
                                <option value="in-progress"
                                    {{ $latestAdminTicket && $latestAdminTicket->status === 'in-progress' ? 'selected' : '' }}>
                                    In-progress</option>
                                <option value="in-progress"
                                    {{ $latestAdminTicket && $latestAdminTicket->status === 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="in-progress"
                                    {{ $latestAdminTicket && $latestAdminTicket->status === 'done' ? 'selected' : '' }}>
                                    Done</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
