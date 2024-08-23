<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    @include('layouts.header')
</head>

<body>

    <div class="container">
        <form action=" {{ route('login') }}" method="POST">
            @csrf
            <div class="offset-lg-4" style="margin-top: 10%;">
                <h1>Login</h1>

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
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('email') is-invalid @enderror">
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

    @include('layouts.footer')

</body>

</html>