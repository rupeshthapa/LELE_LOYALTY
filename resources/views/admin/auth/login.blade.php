<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>

<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>

<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css"
rel="stylesheet"
/>
    <title>Admin Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row w-100">
            <div class="card col-12 col-md-6 col-lg-4 mx-auto p-5">
                <h1 class="text-center mb-4">Admin Login</h1>
    
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
    
                <form action="{{ route('signin') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="loginName" class="form-label">Email or username</label>
                        <input type="email" id="loginName" class="form-control" name="email" required />
                    </div>
    

                    <div class="mb-4">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" id="loginPassword" class="form-control" name="password" required />
                    </div>
    
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                            </div>
                        </div>
    
                        <div class="col-md-6 d-flex justify-content-center">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                    <div class="text-center">
                        <p> <a href="/"> Redirect to Lele Loyalty</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>
