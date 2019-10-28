@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-8">
    <form method="post" action="{{url('product/edit')}}">
     
        @csrf
        <div class="form-group">
          <label for=""></label>
          
          <input type="hidden" name="product_id" id="" class="form-control" placeholder="Product Name" value="{{$products->id}}">
          <input type="text" name="product_name" id="" class="form-control" placeholder="Product Name" value="{{$products->product_name}}">
          @error('product_name')
           <span class="text-danger">{{$message}}</span>
          @enderror
          
          
        </div>
       
        <div class="form-group">
          <label for=""></label>
          @error('product_price')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="product_price" id="" class="form-control" placeholder="Product Price" value="{{$products->product_price}}">
         
        </div>
        <div class="form-group">
          <label for=""></label>
          @error('product_quantity')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="product_quantity" id="" class="form-control" placeholder="Product Quantity"value="{{$products->product_quantity}}" >
          
        </div>
        <div class="form-group">
          <label for=""></label>
          @error('alert_quantity')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="alert_quantity" id="" class="form-control" placeholder="Alert Quantity"value="{{$products->alert_quantity}}" >
          
        </div>
        
        <button class="btn btn-primary">Update</button>
        </div>
        </div>
    </div>
    </div>
    </div>
    </form>

    </div>
    </div>
    </div>
</div>

@endsection