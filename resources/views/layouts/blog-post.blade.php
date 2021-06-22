<!DOCTYPE html>
<html lang="en">

<head>
    
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog </title>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @auth
               @if ((Auth::user()->isAdmin()))
               <li>
                <a class="navbar-brand" href=" {{route('homeAdmin')}} ">Phantaminum</a>
               </li>
                  
                      
                @else
                <li>
                 <a class="navbar-brand" href="/">Phantaminum</a>
                <li>
                @endif 
               @guest
               <a class="navbar-brand" href="/">Phantaminum</a>
               @endguest
               
                   
               @endauth
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     
                @guest
                <li>
                    <a href=" {{url('/login')}} ">Login</a>
                </li>
                <li>
                    <a href=" {{url('/register')}} ">Register</a>
                </li>
                    
                @endguest
               @auth
               @if ((Auth::user()->isAdmin()))
               <li>
                   <a href=" {{route('admin')}} ">Manage</a>
               </li>
                   
               @endif
               <li   >
                <a  href="#" >
                    {{ Auth::user()->name }} 
                </a>
               
                <!-- /.dropdown-user -->
            </li>
                
                <li>
                    <a href=" {{route('logout')}} " onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                    
                @endauth
            </ul>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                @yield('content')
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
            
                        <ul class="list-unstyled">
                        @foreach ($categories as $category)
                        <li><a href="#"> {{$category->name}} </a>
                        </li>
                        @endforeach
                        
                        </ul>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Note From developper</h4>
                    <p>Thanks for your support <3 </p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; tifou 2021</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    
<script src="{{asset('js/libs.js')}}"></script>

</body>

</html>
