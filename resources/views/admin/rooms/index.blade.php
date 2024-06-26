@extends('layouts.admin.master')
@section('title', 'Rooms')
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
                <h4 class="card-title">All rooms<a href="{{ route('admin.rooms.create') }}" class="float-right btn btn-primary">Add new room</a></h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($rooms as $item)
                            <tr>                                                                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ ($item->status == 1) ? 'Empty room' : 'Room booked' }}</td>
                                <td>
                                <a href="{{ route('admin.rooms.edit') }}" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{ route('admin.rooms.destroy') }}" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>                                                                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection