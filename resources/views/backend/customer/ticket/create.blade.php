@extends('backend.layouts.index')
@section('title', 'Ticket')
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
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('customer-tickets.index') }}" class="btn btn-primary">List</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">

                        <form class="row g-3 mt-2" action="{{ route('customer-tickets.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <label for="inputFirstName" class="form-label">Subject <span class="text-danger">*</span>
                                    <span class="text-secondary"></span></label>
                                <input type="text" class="form-control" id="inputFirstName"
                                    placeholder="Name of the subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="inputAddress" placeholder="Description" name="description" rows="8"> {{ old('description') }} </textarea>
                                @error('description')
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
