@extends('backend.layouts.index')
@section('title', 'Ticket-Edit')
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
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

                        <form class="row g-3 mt-2" action="{{ route('admin-tickets.update', $customer_ticket->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf @method('put')

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
                                <label for="inputAddress" class="form-label">Add review <span
                                        class="text-secondary">[Optional]</span></label>
                                <textarea class="form-control" id="inputAddress" placeholder="Description" name="review" rows="4"> {{ old('review') }} </textarea>
                                @error('review')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="inputStatus" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select id="inputState" class="form-select" name="status" required>
                                    <option selected="" value="" disabled>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                    <option value="in-progress">In-progress</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 text-center mt-5 mb-4">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection
