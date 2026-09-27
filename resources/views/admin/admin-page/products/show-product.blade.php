<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>product details</h1>
    <p><strong>ID:</strong>{{$product->id}}</p>
    <p><strong>Name:</strong>{{$product->name}}</p>
    <p><strong>Price:</strong>{{$product->price}}</p>
    <p><strong>Quantity:</strong>{{$product->quantity}}</p>
    <p><strong>Category:</strong>{{$product->category}}</p>
    <a href="{{route('home')}}"> Back to All Product List</a>
    
</body>
</html>