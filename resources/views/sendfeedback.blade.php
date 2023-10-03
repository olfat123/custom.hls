@extends('layouts.master')

@section('content')
               
    <div class="page-header">
        <div class="page-title">
            <h3>Contact Us</h3>
        </div>
    </div>
    <div class="row layout-spacing">
        <!-- Content -->
        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <!--div class="d-flex justify-content-between">
                        <h3 class="">Contact Information</h3>
                    </div-->
    
                    <div class="user-info-list">
                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <br/>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                    stroke-linejoin="round" class="feather feather-map-pin">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle></svg>New York, USA
                                </li>
                                <br/>
                                <li class="contacts-block__item">
                                    <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                    stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>Jimmy@gmail.com</a>
                                </li>
                                <br/>
                                <li class="contacts-block__item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> 1-877-465-2526
                                </li>
                                <br/>
                                <li class="contacts-block__item">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                 class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                 </path></svg>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                            </div>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="social-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                 class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                 </path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>
                                                 <a href="www.google.com" target="_blank"><a/>
                                                 </svg>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>                                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

            <div class="container">
                <div class="widget-content widget-content-area">
                    <!--h3 class="col-md-12 col-md-offset-2">
                        Complete the form and we will be in contact with you
                    </h3-->
           
                    <form class="form-horizontal" id="form-feedback">
                    @csrf
                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">Contact Name</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Contact Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-lg-3 control-label">Telephone Number</label>
                            <div class="col-lg-10">
                            <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organization" class="col-lg-3 control-label">Organization Name</label>
                            <div class="col-lg-10">
                            <input type="text" name="organization" class="form-control" id="organization" placeholder="Organization Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-lg-3 control-label">Message:</label>
                            <div class="col-lg-10">
                                <textarea class="form-control col-lg-12"  name="message"  id="message" rows="4" cols="50" required>
                                
                                </textarea>
                            </div>
                        </div>
                        <div>
                            <div class="col-lg-offset-2 col-lg-3">
                              <button id="submit" type="submit" class="btn btn-lg btn-block btn-outline-primary"> Send Feedback </button>
                            </div>
                        </div>
                    </form>
                    
                </div>                                
            </div>
        </div>
    </div>


@endsection