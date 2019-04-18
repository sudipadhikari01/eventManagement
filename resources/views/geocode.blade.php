<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <title>Map</title>
</head>
<body>


    <div class="conatainer">
        <div class="" id="formatted-address">

        </div>
    </div>


    <script>
         geocode();
        function geocode(){

           
            var location='22 Main st Boston MA';

            axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
               params:{
                    address:location,
                    key:'AIzaSyDvL9AH7ygAwjOccMuT5vysAf6GQHNiZDg'
               }
            })
            .then(function(response){
                console.log(response);
               // var formattedAddress = response.data.results[0].formatted_address;
                 
               
            })

            .catch(function(error){
                console.log(error);

            });
        }
    </script>
</body>
</html>