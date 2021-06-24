<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home </title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.24.0/ui/trumbowyg.min.css" integrity="sha512-baPsQggIoNC4ezJg68uPTtrEJ9OLY1SlnTnnDrYn+LgUBMbc1q5gSD9v5BN4+MWpfIG50AYhnCFmCDszbJaygw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
@include('includes.home_nav')

    <!-- Page Content -->
    @yield('content')

        <!-- Footer -->
        <footer>
            <div class="row " >
                <div class="col-lg-12 ">
                    <p class="">Copyright &copy; tifou 2021</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
    <script src="{{asset('js/libs.js')}}"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.24.0/trumbowyg.min.js" integrity="sha512-1grPXW6pB3WKyOH6zbXrYrYf+SHKeky6JTpUVtjDfz4NZ6uIu0HLRNSmXnv5rjn7iLJXrWLoVFR3XBAuaG3IRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.24.0/plugins/cleanpaste/trumbowyg.cleanpaste.min.js" integrity="sha512-ijlePSMXPNLcTGnRf4bMEbyPLasyvr14NPC+9PDVR/EVTypISJDLiIYQuW4uSk3Fi7nclUq4cQMcVccaI9zdMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.24.0/plugins/pasteimage/trumbowyg.pasteimage.min.js" integrity="sha512-x5CKtRHoS+9Zj+zXG5dMPmbzZzZFmaLhgqDxSYdqhge5rGCi9Yu+h6T3JXQCg67nPloMBIxW2JRpZXG9UpaY9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')

</body>

</html>
