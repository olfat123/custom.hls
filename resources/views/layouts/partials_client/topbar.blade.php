<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a href="index.html">
                    <!-- <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo"> -->
                    <img src="cork/library/logos/LogoHLS.png" class="navbar-logo" alt="logo" 
                    style="max-width: 100px; min-width: 100px; height: auto !important;">
                </a>
            </li>
        </ul>
        @if(Auth::check())
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3" y2="6"></line>
                    <line x1="3" y1="12" x2="3" y2="12"></line>
                    <line x1="3" y1="18" x2="3" y2="18"></line>
                </svg>
            </a>
            <div class="col col-md-3 text-right" > <h5 style="color: #33449c"><strong>HLS EDUCATIONAL GLOSSARY</strong></h5></div>


        @endif
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (auth()->user()->free_trial_days_left > 0)
                         <li class="nav-item">
                            FREE TRIAL WILL END IN  {{ auth()->user()->free_trial_days_left }} DAYS.
                                <a class="btn btn-primary" href="/suscription"> UPGRADE NOW</a>
                            </p>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret">
                                    @if(Auth::user()->USERID_F)
                                        @php
                                        $parent = App\User::firstWhere('USERID',Auth::user()->USERID_F)
                                        @endphp
                                    @endif
                                {{ isset($parent)?$parent->FIRST_NAME:Auth::user()->FIRST_NAME }}
                                </span>                              
                            </a>
                        </li>
                  
                    @endguest
                </ul>

                    
                <ul class="navbar-item flex-row navbar-dropdown">
                   
                    @if(Auth::check())
                        <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="cork/assets/img/90x90.jpg" alt="admin-profile" class="img-fluid">
                            </a>
                            <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                                <div class="user-profile-section">
                                    <div class="media mx-auto">
                                        <img src="cork/assets/img/90x90.jpg" class="img-fluid mr-2" alt="avatar">
                                        <div class="media-body">
                                        
                                           <h6>{{ Auth::user()->FIRST_NAME }}</h6>
                                           <h6>{{ Auth::user()->SECOND_NAME }}</h6>
                                            <!--p>Administrator</p-->
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="dropdown-item">
                                    <a href="{{route('profile')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span>My Profile</span>
                                    </a>
                                </div>

                                <div class="dropdown-item">
                                     <a 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form1').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </header>
    
    @if (auth()->check() && auth()->user()->free_trial_days_left < 0)
    <!-- Modal -->
    <div class="modal NO-fade"
         tabindex="-1" role="dialog" style="display: block">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Upgrade Plan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background:">
                    <div class="row">
                        <div class="col col-md-9 col-sm-12">
                            <div class="alert alert-danger">
                                Your Free Trial is over. Please choose plan to continue.
                            </div>
							
							
		<h3 style="font-size: 21px;">Select your plan</h3>				



 <!-- PAQUETES -->	

 <div class="productos" style="display: grid;grid-template-columns: 2fr 2fr;grid-column-gap: 10px;grid-row-gap: 1em;">
 @foreach($products as $product)
                        

                            @if($product->KINDOFPRODUCTID == 1)
                                <div class="col-mdp-3">
                                    <div class="card-deck mb-3 text-center">
                                        <div class="card mb-4 box-shadow">
                                            <div class="card-header">
                                                <h4 class="my-0 font-weight-normal"> {{ $product->name }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="card-title pricing-card-title" style="font-size:20px;">
                                                    ${{number_format($product->price,2,'.',',') }}

                                                </h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                    <li>{{ $product->QuantityUser }} {{ $product->DescProduct }} </li> <!--li>users included</li-->
                                                    <!--li>{{ $product->DescProduct }} </li-->
                                            
                                                </ul>
                                            
                                                @if(Auth::check())
                                                    <a href="{{ route('add', [ $product->getRouteKey() ]) }}">
                                                        <!-- The button for adding the product to the cart -->
                                                        <button class="btn btn-lg btn-block btn-outline-primary">{{ $product->TextButton }}</button>
                                                    </a>
                                                @endif

                                                @if(Auth::guest())
                                                <button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                                    Buy Suscription
                                                </button>

                                                @endif
                                            

                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            @endif


                            @if(Auth::check())
                                @if(Auth::getUser()->USERID == $product->USERID && $product->KINDOFPRODUCTID == 2)
                                    <div class="col-mdp-3">
                                        <div class="card-deck mb-3 text-center">
                                            <div class="card mb-4 box-shadow">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-normal"> {{ $product->name }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title" style="font-size:20px;">
                                                        ${{number_format($product->price,2,'.','') }}

                                                    </h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>{{ $product->QuantityUser }} user included</li>
                                                        <li>{{ $product->DescProduct }} </li>
                                                
                                                    </ul>
                                                
                                                    @if(Auth::check())
                                                        <a href="{{ route('add', [ $product->getRouteKey() ]) }}">
                                                        <!-- The button for adding the product to the cart -->
                                                            <button class="btn btn-lg btn-block btn-outline-primary">{{ $product->TextButton }}</button>
                                                        </a>
                                                    @endif

                                                    @if(Auth::guest())
                                                        <button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                                            Buy Suscription
                                                        </button>

                                                    @endif
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                @endif
                            @endif
                    
                        
                    @endforeach

 </div>

<!-- END PAQUETES -->	
								
					 <!-- TABLA DE PRECIOS -->		
							<table class="table table-bordered">
							<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
								@foreach(Cart::content() as $cartItem)
								<tr>
									<td>
										<!-- Remove product button -->
										<a href="{{ route('remove', [ $cartItem->rowId ]) }}">x</a>
									</td>
									<td>{{ $cartItem->name }}</td>
									<td>{{ $cartItem->qty }}</td>
									<td>{{ $cartItem->price }} USD</td>
									<td>{{Cart::subtotal()}} USD</td>
                                
								</tr>
								@endforeach
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- Total price of whole cart -->
									<td class="uk-text-bold">Total: {{Cart::subtotal()}} USD</td>
                
							</tr>
							</tbody>
							</table>
							
					 <!-- END PRECIOS -->					 
							
							  <div class="modal-footer">
								<!-- Clear shopping cart button -->
								<a href="{{ route('empty') }}" class="btn btn-danger">Empty</a>
								<!-- Proceed to checkout button -->
								<a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
							  </div>
							
							
							
							
							
							
							
                        
                        </div>
						
						<!-- Shopping cart button -->
                        <div class="col col-md-3 col-sm-12">
                            <!-- Shopping cart button 
                            
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#shoppingCartModal">
                                    Go Shopping Cart
                                </button>
                           -->
                        </div>
                    </div>
                   
                    
                    <div class="row">

                        @foreach($errors as $product)
                    
                           @if($product->KINDOFPRODUCTID == 1)
                                @if(Auth::getUser()->USERGROUPID == 3)
                                    <div class="col-md-6">
                                        <div class="card-deck mb-3 text-center">
                                            <div class="card mb-4 box-shadow">
                                                <div class="card-header">
                                                    <h4 class="my-0 font-weight-normal"> {{ $product->name }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h1 class="card-title pricing-card-title">
                                                        ${{number_format($product->price,2,'.',',') }}

                                                    </h1>
                                                    <ul class="list-unstyled mt-3 mb-4">
                                                        <li>{{ $product->QuantityUser }} user included</li>
                                                        <li>{{ $product->DescProduct }} </li>
                                                
                                                    </ul>
                                                
                                                    <a href="{{ route('add', [ $product->getRouteKey() ]) }}">
                                                        <!-- The button for adding the product to the cart -->
                                                        <button class="btn btn-lg btn-block btn-outline-primary">{{ $product->TextButton }}</button>
                                                    </a>
        
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                @elseif(Auth::getUser()->USERGROUPID == 4)
                                    <div class="col-md-6">
                                            <div class="card-deck mb-3 text-center">
                                                <div class="card mb-4 box-shadow">
                                                    <div class="card-header">
                                                        <h4 class="my-0 font-weight-normal"> {{ $product->name }}</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <h1 class="card-title pricing-card-title">
                                                            ${{number_format($product->price,2,'.',',') }}

                                                        </h1>
                                                        <ul class="list-unstyled mt-3 mb-4">
                                                            <li>{{ $product->QuantityUser }} user included</li>
                                                            <li>{{ $product->DescProduct }} </li>
                                                    
                                                        </ul>
                                                    
                                                        <a href="{{ route('add', [ $product->getRouteKey() ]) }}">
                                                            <!-- The button for adding the product to the cart -->
                                                            <button class="btn btn-lg btn-block btn-outline-primary">{{ $product->TextButton }}</button>
                                                        </a>

                                                        
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                @endif
                            @endif

                        @endforeach
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Shopping cart modal -->
<div class="modal fade" id="shoppingCartModal" tabindex="-1" role="dialog"
        aria-labelledby="shoppingCartModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shoppingCartModalTitle">Shopping cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $cartItem)
                            <tr>
                                <td>
                                    <!-- Remove product button -->
                                    <a href="{{ route('remove', [ $cartItem->rowId ]) }}">x</a>
                                </td>
                                <td>{{ $cartItem->name }}</td>
                                <td>{{ $cartItem->qty }}</td>
                                <td>{{ $cartItem->price }} USD</td>
                                <td>{{ number_format($cartItem->total, 2) }} USD</td>
                                
                            </tr>
                        @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!-- Total price of whole cart -->
                        <td class="uk-text-bold">Total: {{Cart::subtotal()}} USD</td>
                
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- Clear shopping cart button -->
                <a href="{{ route('empty') }}" class="btn btn-danger">Empty</a>
                <!-- Proceed to checkout button -->
                <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</div>