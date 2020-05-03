<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/gif" sizes="16x16" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-reboot.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    @section('header')
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-light bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Just an image -->
            <nav class="navbar">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('image/logo.png') }}" width="200" height="40" alt="">
                </a>
            </nav>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('agent/details') }}">All Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="/search" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="Search Here !" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </section>

    @show @yield('content') @section('footer')
    <section>
        <footer style="background-color: #23262e">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 text-center text-md-left ">
                        <div class="py-0">
                            <h3 class="my-4 text-white">
                                About<span class="mx-2 font-italic text-warning ">Maa Sharde Instvetment</span>
                            </h3>

                            <p class="footer-links font-weight-bold">
                                <a class="text-white" href="{{ url('/') }}">Home</a> |
                                <a class="text-white" href="#">Blog</a> |
                                <a class="text-white" href="#">About</a> |
                                <a class="text-white" target="_blank" href="https://github.com/suraj00000/AHMEDABAD_GREETINGS">Github</a>
                            </p>
                            <p class="text-light py-4 mb-4">
                                &copy;2019 Ahmedabad Greetings Ltd.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 text-white text-center text-md-left ">
                        <div class="py-2 my-4">
                            <div>
                                <p class="text-white">
                                    <i class="fa fa-map-marker mx-2 "> 10, Sarita Park,
                                        Shopping Center,
                                        Vinzol Road,
                                        Vatva, Ahemdabad - 382440</i>
                                </p>
                            </div>

                            <div>
                                <p>
                                    <i class="fa fa-phone  mx-2 "></i> +91 94275XXXXX
                                </p>
                            </div>
                            <div>
                                <p>
                                    <i class="fa fa-envelope  mx-2"></i><a href="mailto:manojkushwaha11004@gmail.com">manojkushwaha11004@gmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-white my-4 text-center text-md-left ">
                        <span class=" font-weight-bold ">About
                            <a href="http://surajkushwaha.live/">surajkushwaha.live</a></span>
                        <p class="text-warning my-2">
                            Event management is the application of the management practice of project management to the
                            creation and development of festivals, events, and conferences.
                        </p>
                        <div class="py-2">
                            <a href="#"><i class="fab fa-facebook fa-2x text-primary mx-3"></i></a>
                            <a href="#"><i class="fab fa-google-plus fa-2x text-danger mx-3"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x text-info mx-3"></i></a>
                            <a href="#"><i class="fab fa-youtube fa-2x text-danger mx-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    @show

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom jsQuery -->
    <script>
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var name = button.data('myname')
            var phone = button.data('myphone')
            var address = button.data('myaddress')
            var policy_id = button.data('myid')

            var modal = $(this)
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #address').val(address);
            modal.find('.modal-body #policy_id').val(policy_id);
        })

        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var policy_id = button.data('myid')

            var modal = $(this)
            modal.find('.modal-body #policy_id').val(policy_id);
        })

        $(document).on('click', '.show-modal', function() {
            var button = $(event.relatedTarget)
            $('#id').text($(this).data('myid'));
            $('#name').text($(this).data('myname'));
            $('#policy').text($(this).data('mypolicy'));
            $('#premium').text($(this).data('mypremium'));
            $('#duedate').text($(this).data('myduedate'));
            $('#riskdate').text($(this).data('myriskdate'));
            $('#mode').text($(this).data('mymode'));
            $('#sumassured').text($(this).data('mysumassured'));
            $('#planterm').text($(this).data('myplanterm'));
            $('#phoneno').text($(this).data('myphoneno'));
            $('#address').text($(this).data('myaddress'));

            $('myshow').modal('show');
        });
    </script>
</body>

</body>

</html>