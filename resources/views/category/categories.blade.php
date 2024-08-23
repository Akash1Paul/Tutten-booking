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
                                    <h1>Categories</h1>
                                </div>
                                <div class="col">
                                    <a href="add_category" class="btn btn-primary">Add</a>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($categories as $category)

                                        <tr>
                                            <td>{{ $category['name'] }}</td>
                                            <td>
                                                <a href="edit_category/{{ $category['id'] }}" class="btn btn-warning">Edit</a>
                                                <a href="delete_category/{{ $category['id'] }}" class="btn btn-danger"  onclick="return confirm('Do you want to delete this category?')">Delete</a>
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
        </div>
    </div>

    @include('layouts.footer')

</html>