<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>

    <div class="container">
            @if(count($errors) >0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <ul>
                        @foreach($errors->all as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="row">
                    <form action="">
                        <div class="form-group">
                            
                        </div>
                    </form>
                </div>
            @endif
                  
    </div>
    
</body>
</html>