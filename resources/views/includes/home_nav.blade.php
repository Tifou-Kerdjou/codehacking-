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
               @if ((Auth::user()->isAuthor()))
               <li>
                   <a href=" {{route('author.index')}} ">My Posts</a>
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
            
           
               
            
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>