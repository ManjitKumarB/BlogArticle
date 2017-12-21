<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/margin.css">
    <link rel="stylesheet" href="/css/awesome-font/css/font-awesome.min.css">
</head>

<body>

    <!-- NAVIGATION BAR -->
    @include ('partials.nav')

    <div class="container">
        @include('flash::message') @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#flash-overlay-modal').modal();
        //    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

    <script>
        $('#tags').select2({
            placeholder: 'choose a tag',
            tags: true
        });
    </script>

    <!--    confirm delete -->
    <script>
        function ConfirmDelete(){
            return confirm("Do you want to delete this article?");
        }
    </script>


    @yield('footer')

</body>

</html>