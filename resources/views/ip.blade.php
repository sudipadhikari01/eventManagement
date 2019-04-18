<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        ////https://api.ipify.org

        var publicip;
        pip= $.ajax({
            url: "{{'https://api.ipify.org'}}",
            method: "GET",
        });
        pip.done(function(data){ 
          ip= $.ajax({
            url: "http://ip-api.com/json/"+data,
            method: "GET",
            });
            ip.done(function(data){ 
                console.log(data.country);
            });
        });

        
    
        </script>
    
</body>
</html>