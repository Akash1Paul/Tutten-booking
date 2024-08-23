@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">

                            <form action=" {{ route('add_user') }}" method="POST">
                                @csrf
                                <div class="mt-4">

                                    <h2>Add User</h2>

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
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="roles">Roles</label>
                                            <select name="roles" id="roles" class="form-control">
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
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