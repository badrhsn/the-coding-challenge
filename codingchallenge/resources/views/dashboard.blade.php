@include('includes.header')

<div class="body-container">


    <div class="">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">Nearby Shops</a>
        </li>
        <li class="nav-item">
            <a class="nav-link not-visited" href="{{route('myfavorite')}}">My preferred Shops</a>
        </li>
        <li class="nav-item">
            <a class="nav-link not-visited" href="{{route('logout')}}">Logout</a>
        </li>
        </ul>
    </div>

    <div class="container justify-content-center">

        <div class="row">
            @foreach($shops as $shop)
            <div class="shop" data-shopid="{{$shop->id}}" id="{{$shop->id}}">
                <div class="shop-title">
                    {{$shop->name}}
                </div>
                <div class="shop-image">
                    <img src="{{asset($shop->image)}}"/>
                </div>
                <div class="shop-buttons">
                    <a href="#" class="like btn btn-primary btn-left">Dislike</a>
                    <a href="#" class="like btn btn-primary btn-right">Like</a>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </div>
            </div>
            @endforeach
        </div>

    </div>



    <script>
        var userId = '{{Auth::user()->id}}';
        var token ='{{Session::token()}}';
        var urlLike = '{{ route('like') }}';
    </script>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}" type="text/javascript"></script>

    </div>
</body>
</html>