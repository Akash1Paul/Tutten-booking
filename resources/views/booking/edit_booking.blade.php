{{-- @php

$name = explode(' ', $user[0]['name']);
$first_name = $name[0];
$last_name = $name[1];

@endphp --}}

@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">

                            <form action=" {{ url('update_booking/'. $booking['id']) }}" method="POST">
                                @csrf
                                <div class="mt-4">

                                    <h2>Edit Booking</h2>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            @if ($errors->any())
                                            <div class="alert alert-danger mt-0">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="checkin">Check In</label>
                                            <input type="date" name="checkin" id="checkin" class="form-control" value="{{ $booking['checkin'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="checkout">Check Out</label>
                                            <input type="date" name="checkout" id="checkout" class="form-control" value="{{ $booking['checkout'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="first_name" class="form-control" value="{{ $booking['name'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="description">Description</label>
                                           <textarea name="description" class="form-control"  id="description" cols="30" rows="10">{{ $booking['description'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @include('layouts.footer')
        
</html>