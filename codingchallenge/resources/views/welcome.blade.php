<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Main Page</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <div class="container">

        <div class="row">

            <div class="welcome-title col-12 text-center">
            <h1>Welcome to My Coding Challenge </h1>
            </div>

            <div class="form col-6 text-center signin">
                <h2>Sign In</h2>

                <form action="/signin" method="post">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <input type="email" name="email" required class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{Request::old('email')}}">

                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <input type="password" name="password" required class="form-control" placeholder="Password">

                    </div>

                    <p>{{Session::get('message')}}</p>

                    <button type="submit" class="btn btn-primary">SIGN IN</button>

                </form>
            </div>

            <div class="form col-6 text-center signup">
                <h2>Sign Up</h2>
                <form action="/signup" method="post">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <input type="email" name="email" required class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{Request::old('email')}}">
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                <li>* {{$error}}</li>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                        <input type="password" name="password" required class="form-control" placeholder="Password" value="{{Request::old('password')}}">
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                                <li>* {{$error}}</li>
                            @endforeach
                        @endif
                    </div>

                    <p>{{Session::get('message_signup')}}</p>

                    <button type="submit" class="btn btn-primary">SIGN UP</button>


                </form>
            </div>

        </div>

        </div>
</body>
</html>
