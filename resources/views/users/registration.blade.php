<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/registration.css">

</head>

<body class="bg-light">
@include('sweetalert::alert')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Registration</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control {{$errors->first('name') ? 'input-error' : ''}}"
                                    value="{{ old('name') }}">
                                <span class="error">
                                    @error('name') {{ $message }} @enderror
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control">
                                <span class="error">@error('email'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" class="{{$errors->first('password')?'input-error':''}}">
                                <span class="error">@error('password'){{$message}}@enderror</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hobbies</label><br>
                                <input type="checkbox" name="hobby[]" value="Reading"> Reading
                                <input type="checkbox" name="hobby[]" value="Traveling"> Traveling
                                <input type="checkbox" name="hobby[]" value="Music"> Music
                                <input type="checkbox" name="hobby[]" value="Sports"> Sports
                            </div>


                            

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                            <div class="text-center mt-3">
                                <p>Already have an account? <a href="login">Login here</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>