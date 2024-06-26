@extends('layouts.admin.master')
@section('title', 'Bookings')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4>Data Table</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                <li class="breadcrumb-item active">Data Table</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">All users and staffs<a href="{{ route('admin.bookings.create') }}" class="float-right btn btn-primary">Add new user</a></h4> --}}
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account booking</th>
                                <th>Room booking</th>
                                <th>Total price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach (auth()->guard('account')->user()->permissions as $item)
                            <pre>{{ $item->name }}</pre>
                        @endforeach
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($bookings as $item)
                            <tr>                                                                            
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->account->username }}</td>
                                <td>{{ $item->room->name }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ ($item->status == 1) ? 'Not payment' : 'Paid' }}</td>
                                <td>
                                <a href="{{ route('admin.bookings.edit') }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{ route('admin.bookings.destroy') }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @empty
                            <h3>No data</h3>
                            @endforelse
                            
                        </tbody>                                                                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection