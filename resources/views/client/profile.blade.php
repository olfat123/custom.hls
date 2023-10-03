@extends('layouts.master')

@section('content')
   
<div class="page-header">
    <div class="page-title">
        <h3>User Profile</h3>
    </div>
</div>

<div class="row layout-spacing">
    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Info</h3>
                  
                </div>
                <div class="text-center user-info">
                    <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/profile-1506810-1278719.png" height="100" alt="avatar">
                    <p class="letter-orange"><?php echo Auth::getUser()->FIRST_NAME.' '.Auth::getUser()->SECOND_NAME; ?></p>
                </div>
       
                <div class="user-info-list">

                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            <!--li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
                                 <circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                             
                            </!--li-->
                                                            
                            <hr>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg> <?php echo Auth::getUser()->PHONE; ?>
                            </li>
                            <hr>
                            <li class="contacts-block__item">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                     <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6">
                                            </polyline>
                                        </svg><?php echo Auth::getUser()->email; ?></a>
                            </li>
                           
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

        <div class="bio layout-spacing ">
            <div class="skills layout-spacing ">
                <div class="widget-content widget-content-area">
                    <form method="post" action="{{url('/updatepassword')}}">
                        {{csrf_field()}} <div class="summary-errors alert alert-danger alert-dismissible" style="display: none;">
                              <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                <span aria-hidden="true">×</span>
                              </button>
                              <p>Errors list below: </p>
                              <ul></ul>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label">Enter your current password:</label>
                              <div class="col-md-9">                    
                                <input type="password" name="mypassword" class="form-control">               
                              <small class="text-danger" >{{$errors->first('mypassword')}}</small></div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label">Enter your new password</label>
                              <div class="col-md-9">
                              <input type="password" name="password" class="form-control">
                              <small class="text-danger" >{{$errors->first('password')}}</small></div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label">Confirm your new password</label>
                              <div class="col-md-9">
                              <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label"></label>
                             
                              <div class="col-md-9">       
                              <div class='text-success'>
                               {{Session::get('status')}} 
                             </div>         
                            </div>
                            </div>
                            
                            <div class="text-right">
                              <button type="submit" class="btn btn-primary" id="validateButton3">Submit</button>
                              
                            </div>
                            
                    </form>
                </div>
            </div>                     
        </div>
    </div>
</div>
@endsection