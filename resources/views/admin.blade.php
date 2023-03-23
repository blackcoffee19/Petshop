<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{asset('')}}">
    <title>Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <!-- font-family: 'Montserrat', sans-serif;
    font-family: 'Poppins', sans-serif; -->
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-size: 13px;
        }
        a{
            text-decoration: none;
        }
        body{
            background-color: #e7f2ff;
        }
        .collapse-setting{
            bottom:0; right:0;
            width: 100px;
        }
        .collapse-setting ul{
            list-style-type: none; 
            font-size:1.2rem;
        }
        .collapsing{
            transition: width .60s ease !important;
        }
        .active_cus{
            box-shadow: #cccccc 1px 2px 5px;
            border-radius: 6px;
            background-color: #3a51a4;
            padding-top: 5px;
        }
        .active_cus a{
            color: #fff !important;
            font-weight: bold;
        }
        .db-1{
            width: 25%;
        }
        .db-1 p{
            font-size: 12px;
            margin: 0;
        }
        .db-2 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .menu_list{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: space-around;
        }
        .menu_list a{
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <div class="container-fluid ">
        <div class="row position-relative">
            @include('backend.menu')
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    @yield('admin_script')
</body>
</html>
