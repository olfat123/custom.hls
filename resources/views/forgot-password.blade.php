<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>HL Glossary -Password Recovery</title>
    <link rel="icon" type="image/x-icon" href="cork/assets//img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="cork/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="cork/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="cork/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="cork/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="cork/assets/css/forms/switches.css">
</head>
<body class="form no-image-content">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Enter your email and instructions will sent to you!</p>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                
                            <div class="form-group">
                    
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-group">
                    
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                </div>
                                <a class="btn btn-link waves-effect waves-classic" href="home">
                                                            Login
                                                            </a>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="cork/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="cork/bootstrap/js/popper.min.js"></script>
    <script src="cork/bootstrap/js/cork/bootstrap/.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="cork/assets/js/authentication/form-2.js"></script>

</body>
</html>