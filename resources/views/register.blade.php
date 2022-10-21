<!doctype html>
<html lang="en">

<head>
    <title>POS Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">

            </div>

            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url({{ asset('projectimg/pos.jpg') }});">
                        </div>

                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">POS Register</h3>

                                </div>
                                <div class="w-100">

                                </div>
                            </div>
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                            @endforeach
                            @endif
                            <p class="text-danger">{{ session()->get('success') }}</p>
                            <form action="{{ route('customregister') }}" method="post" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Nmae</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <!-- <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                    <a href="/" class="text-primary">I already have a membership</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>