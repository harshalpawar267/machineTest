<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>


@extends('layouts.app')

@section('content')
@if (\Session::has('msg-success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg-success') !!}</li>
        </ul>
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Products</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
        @foreach($product_detail as $p)
            @foreach($p->ProductDetail as $pd)
            
        <tr>
                <td>{{$p->product_name}}</td>
                <td>{{$pd->size}}</td>
                <td>{{$pd->color}}</td>
                <td>{{$pd->price}}</td>
                <td>{{$pd->quantity}}</td>
                <td>
                <form class="form-horizontal" role="form" method="POST" action="">
                <input type="hidden" name="id" value="{{$pd->id}}"/>
                <input type="hidden" name="p_id" value="{{$pd->p_id}}"/>
                <input type="submit" name="action" class="btn btn-primary" value="View Details"/>
                </form>
                </td>
      </tr>
      
            @endforeach
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

@endsection
