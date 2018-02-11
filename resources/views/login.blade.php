<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      
    
    <title>Employee Login | {{Fungsi::$namaWebsite}} </title>
	
    	@include("utility")
	
   
</head>
<body>
        <div class="container">    
        	<Center>
        	  <img src="{{asset('img/'.Fungsi::$logoWebsite)}}" width="250" height="250">
        	</Center>
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Employee Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><!--<a href="#">Forgot password?</a>--></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                           
                        <form method="post" action="{{URL::to('/login')}}" class="form-horizontal" id="loginform" role="form">
                                 {{csrf_field()}}  
                                 <?php 
                                  Fungsi::alert(Session::get("error"));
                                 ?> 
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="txt_user" value="" placeholder="Username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="txt_pass" placeholder="Password">
                                    </div>
                                    
                                    
                                
                            


                          <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button class="btn btn-success" type="submit">Login  </button>
                                      
                                      

                            </div>
                                </div>


                         </form>           
                      



                        </div>                     
                    </div>  
        </div>
         
</div>
    
    
   
</body>
</html>
