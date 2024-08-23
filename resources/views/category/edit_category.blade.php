@include('layouts.header')

    <div class="container-scroller">

        @include('navbar')

        <div class="container-fluid page-body-wrapper">

            @include('sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">

                            <form action=" {{ route('edit_category', $category[0]['id']) }}" method="POST">
                                @csrf
                                <div class="mt-4">

                                    <h2>Edit Category</h2>

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
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $category[0]['name'] }}">
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control">{{ $category[0]['description'] }}</textarea>
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