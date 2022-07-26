<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rosie's Collection|Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    
    <div class="fixed-background d-flex justify-content-center align-items-center">
        <div class="col-7 bg-white card row" style="height: 70vh">
            <div class="col-7 bg-primary h-100"></div>
            <div class="col-5 h-100 p-3">
                <h1 class="my-4 py-3">Rosssssie's Collection</h1>
                <h4 class="my-2">Login</h4>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" id="" class="form-control" placeholder="email" autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="" class="form-control" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>