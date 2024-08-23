@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-md-10">
                                    <h1>Bookings</h1>
                                </div>
                                {{-- <div class="col">
                                    <a href="add_user" class="btn btn-primary">Add</a>
                                </div> --}}
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table">
                                    @if(count($booking) > 0)
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Check In</th>
                                            <th scope="col">Check Out</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach($booking as $book)

                                        <tr>
                                            <td>{{ $book['name'] }}</td>
                                            <td>{{ $book['description'] }}</td>
                                            <td>{{ date('d-m-Y',strtotime($book['checkin'] ))}}</td>
                                            <td>{{ date('d-m-Y',strtotime($book['checkout'])) }}</td>
                                            <td>
                                                <a href="edit_booking/{{ $book['id'] }}" class="btn btn-warning">Edit</a>
                                                <a href="delete_booking/{{ $book['id'] }}" class="btn btn-danger"  onclick="return confirm('Do you want to delete this Booking ?')">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    @else
                                        <div>
                                        <p class="text-danger text-center">No Data Found</p>
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.footer')

</html>