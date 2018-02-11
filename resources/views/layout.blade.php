<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
	@include("utility")
    
    
   
</head>
<script type="text/javascript">
   $(document).ready(function(){
         $("select").select2({
            placeholder:"-Choose-",
             allowClear: true
         });
   });

</script>
<body>
   
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Area</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Welcome, {{Auth::user()->name}} &nbsp; <a href="{{URL::to('/logout')}}" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{asset('img/'.Fungsi::$logoWebsite)}}" class="user-image img-responsive"/>
					</li>
				                <li  >
                                    <a href="{{URL::to('/admin/')}}" ><i class="fa fa-bar-chart-o fa-3x"></i> Dashboard</a>
                                </li>
					
                                <li>
                                    <a href="#"><i class="fa fa-users fa-3x"></i> User Data<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{URL::to('/admin/employee')}}">View Admin</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('/admin/fisherman')}}">View Fisherman</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{URL::to('/admin/employee/add')}}">Add User</a>
                                        </li>
                                        
                                    </ul>
                                  </li>  
                                  <li>
                                    <a href="#"><i class="fa fa-list fa-3x"></i> Fish Data<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{URL::to('/admin/fish')}}">View Fish</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('/admin/fish/add')}}">Add Fish</a>
                                        </li>
                                        
                                    </ul>
                                  </li>  
                                  
                                  <li>
                                    <a href="#"><i class="fa fa-building-o fa-3x"></i>Market Data<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="{{URL::to('/admin/market/')}}">View Market</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('/admin/market/add')}}">Add Market</a>
                                        </li>
                                        
                                    </ul>
                                  </li>  
                                  
                                 <li  >
                                    <a href="{{URL::to('/admin/route')}}" ><i class="fa fa-map-marker fa-3x"></i> Route</a>
                                </li>
                                
                   
                   
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>@yield("title")</h2>   
                     <hr />
                        @yield("content")
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>
