<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 page not found</title>
</head>
<body style="  background: url(../public/img/error.jpg) top center no-repeat;">

    <a href="{{route('home')}}"  id="eerrror" type="button" class="btn btn-primary">Back To Home</a>
    
</body>
</html>

<style>
#eerrror {
    font-family: "Raleway", sans-serif;
    background-color: red;
    padding: 15px  45px ;
    border-radius: 10px;
    margin-top: 550px;
    margin-left: 630px;
    color: white;
    font-weight: 700;
    font-size: 20px;
    max-width: 60%;
    height: auto;
    cursor: pointer;
    box-shadow: 8px 8px 10px rgba(0, 0, 0, 0.30);

}
#eerrror:hover{
    background-color: gray;
    color: white;
    box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.10);


}

</style>