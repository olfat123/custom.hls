
@extends('layouts.master')

@section('content')
<?php
  use App\Http\Controllers\PayConfirmation;
?>
<h1>..</h1>
    <div id="app2">

        @if(Auth::check())

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" style="color: #33449c" href="#">
                     {{ config('app.cart', 'PLAN') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" 
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>
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
                            <!-- Shopping cart button -->
                                <li class="nav-item dropdown">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#shoppingCartModal">
                                        Shopping Cart
                                    </button>
                                </li>
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
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="py-4">

    
            <!--div class="container">
                <div class="center-block">
                    <div-- class="row">
                        <h1 class="text-center"> <small>Below are the four available packages</small> </h1>
                        
                    <div>
                </div>
            </div-->
            
            <div class="container">
                @if(Session::has('success'))
                
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        
                        @php 
                            $x = new PayConfirmation();
                            $x->confirmSuscritpionToDeleteDemo(Auth::getUser()->USERID);
                            
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-warning" uk-alert>
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif
            
                <div class="row">

                    @if(Auth::guest())
                        <div class="col-md-3">

                            <div class="card-deck mb-3 text-center">
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h4 class="my-0 font-weight-normal"> Demo</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title" style="font-size:20px;">
                                                $0
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>1 user included</li>
                                                <li>Glossaries, Word Search </li>
                                                
                                            </ul>
                                        
                                            <button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal" 
                                                    data-target="#exampleModalCenter">
                                                Sign up free
                                            </button>

                                        </div>
                                    </div>   
                            </div>

                        </div>
                    
                    @endif
                    
                    @foreach($products as $product)
                        

                            @if($product->KINDOFPRODUCTID == 1)
                                <div class="col-md-3">
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
                                    <div class="col-md-3">
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

                    @if(Auth::guest())
                        <div class="col-md-3">

                            <div class="card-deck mb-3 text-center">
                                    <div class="card mb-4 box-shadow">
                                        <div class="card-header">
                                            <h4 class="my-0 font-weight-normal"> Enterprise</h4>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="card-title pricing-card-title" style="font-size:20px;">
                                                $0
                                            </h1>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>+ 10 users included</li>
                                                <li>Glossaries, Word Search </li>
                                                
                                            </ul>
                                        
                                            <a href="sendfeedback" type="button" class="btn btn-lg btn-block btn-outline-primary"> Call Us</a>

                                        </div>
                                    </div>   
                            </div>

                        </div>
                    
                    @endif
                </div>
            </div>
        </main>

        <!-- Modal Demo 30 days -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Demo for 30 days</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You need to create an account for your 30-day demo to start.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="register"  class="btn btn-outline-primary">New Account</a>
                    <!--button type="button" class="btn btn-primary">Save changes</button-->
                </div>
                </div>
            </div>
        </div>


        <!-- Modal PARA INFORMAR QUE DEBEN DE TENER UNA CUENTA PARA COMPRAR UN PLAN -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create An Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                To buy one of our plans you must create an account
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="register"  class="btn btn-outline-primary">New Account</a>
                    <!--button type="button" class="btn btn-primary">Save changes</!--button-->
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
