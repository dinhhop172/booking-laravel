@extends('layouts.admin.master')
@section('title', 'Users')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-5">Quản lý Booking</h1>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($permission_bookings as $key => $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <select id="permission_booking_room" class="form-control permission_booking_room" data-staff="{{ $staff->id }}" data-id="{{ $item->id}}">
                                            <option value="disable" {{ $staff->permissions->contains('id', $item->id) ? 'selected' : '' }}>Disable</option>
                                            <option value="enable" {{ $staff->permissions->contains('id', $item->id) ? 'selected' : '' }}>Enable</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center mb-5">Quản lý Rooms</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($permission_rooms as $key => $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <select id="permission_booking_room" class="form-control permission_booking_room" data-staff="{{ $staff->id }}" data-id="{{ $item->id}}">
                                        <option value="disable" {{ $staff->permissions->contains('id', $item->id) ? 'selected' : '' }}>Disable</option>
                                        <option value="enable" {{ $staff->permissions->contains('id', $item->id) ? 'selected' : '' }}>Enable</option>
                                    </select>
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
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.permission_booking_room').change(function(){
                var value_per = $(this).data('id');
                var staff_id = $(this).data('staff');
                $value_select = $(this).val();

                $route = "{{route('admin.permissions.store')}}";

                if($value_select == 'enable'){
                    $.ajax({
                        url: "{{route('admin.permissions.store')}}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            value_per: value_per,
                            staff_id: staff_id
                        },
                        success: function(data){
                            if(data == 'success'){
                                alert('success');
                            }
                            console.log(data);
                        },
                        error:  function(error){
                            if(error){
                                alert('Error');
                            }
                            console.log(error);
                        }
                    });
                    console.log('enable');
                }else{
                    $.ajax({
                        url: "{{route('admin.permissions.destroy')}}",
                        type: "GET",
                        data: {
                            _token: "{{ csrf_token() }}",
                            value_per: value_per,
                            staff_id: staff_id
                        },
                        success: function(data){
                            if(data == 'success'){
                                alert('success');
                            }
                        },
                        error:  function(error){
                            console.log(error);
                        }
                    });
                    console.log('disable');
                }

            });
        });
    </script>
@endsection