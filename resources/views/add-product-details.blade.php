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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action=""  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="user_type" class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-6">
                                <select id="product_name" type="text" class="form-control" name="product_name" required>
                                @foreach($product_data as $p)
                                    <option value={{$p->id}}>{{$p->product_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_size" class="col-md-4 control-label">Product size</label>
                            <div class="col-md-6">
                                <select id="product_size" type="text" class="form-control" name="product_size" required>
                                    <option value="s">Small</option>
                                    <option value="m">Medius</option>
                                    <option value="l">Large</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Product Price</label>
                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Product Color</label>
                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control" name="color" value="{{ old('color') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Product quantity</label>
                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('file_upload') ? ' has-error' : '' }}">
                            <label for="file_upload" class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-6">
                                <input id="file_upload" type="file" name="file_upload"  class="form-control" onchange="validateImage(this.value);"   required />
                            @if ($errors->has('file_upload'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file_upload') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function validateImage(e)
{
    var file_ext = e.split('.');
    if(file_ext[1]=='jpg' || file_ext[1]=='svg' || file_ext[1]=='png' || file_ext[1]=='jpeg')
    {
        return true;
    }else{
        alert("Please select valid image!");
        $("#file_upload").val('');
        return false;
    }
}
</script>