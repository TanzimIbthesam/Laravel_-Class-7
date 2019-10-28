
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <div class="card">
     
            <div class="card-header">
           
             <h1>Products List</h1>
            </div>
         

          <div class="card-body">
          @if (session('deletestatus'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('deletestatus')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  @endif
          <table class="table" id='example'>
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Photo Location</th>

      <th scope="col">Alert Quantity</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      @forelse($products as $product)
    
      <td>{{$loop->index+1}}</td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_price}}</td>
      <td>{{$product->product_quantity}}</td>
      <td>
      <img src="{{asset('uploads/product_photos')}}/{{$product->product_photo_location}}" class="img-fluid" alt="">
      
      
      
      </td>
      <td>{{$product->alert_quantity}}</td>
      <td><div class="btn-group" role="group" aria-label="">
     
     <a class="btn btn-warning btn-sm" href="{{ url ('product/edit')}}/{{$product->id}}">Edit</a>
     <a class="btn btn-danger btn-sm" href="{{ url ('product/delete')}}/{{$product->id}}">Delete</button>
      </div></td>
    </tr>
    @empty
    <td colspan="5"class="text-center text-danger"> No products available</td>
    @endforelse
  </tbody>
</table>

          </div>
                
            </div>
          

  
        </div>
        

        <div class="col-md-4">
        <div class="card">
        <div class="card-header">
        <h1>Add Products</h1>
            </div>
       <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
  
        
    
     
      <!-- @if ($errors->all())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
      @endif -->
       
      
        <form method="POST" action="{{url('product/insert')}}"enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for=""></label>
          @error('product_name')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="product_name" id="" class="form-control" placeholder="Product Name" value="{{ old('product_name') }}" >
          
        </div>
        <div class="form-group">
          <label for=""></label>
          @error('product_price')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="product_price" id="" class="form-control" placeholder="Product Price"value="{{ old('product_price') }}" >
         
        </div>
        <div class="form-group">
          <label for=""></label>
          @error('product_quantity')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="product_quantity" id="" class="form-control" placeholder="Product Quantity"value="{{ old('product_quantity') }}" >
          
        </div>
        <div class="form-group">
          <label for=""></label>
          @error('alert_quantity')
           <span class="text-danger">{{$message}}</span>
          @enderror
          <input type="text" name="alert_quantity" id="" class="form-control"placeholder="Alert quantity"  value="{{ old('alert_quantity') }}" >
          
        </div>
        <div class="form-group"> 
        <input type="file"class="form-control" name="product_photo"placeholder="">
        </div>
        <button class="btn btn-primary">Add Product</button>
        </div>
        </div>
    </div>
    </div>
    </div>
    </form>
    </div>
    
   
    <div class="container">
    <div class="row">
    <div class="col-md-8">
     <div class="card bg">
     <div class="card-header bg-danger">
     <h1>Deleted Products</h1>
     </div>
     <div class="card-body">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      
      <th scope="col">Alert Quantity</th>
      <th scope="col">Deleted At</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      @forelse($delete_products as $product)
      <td>{{$loop->index+1}}</td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_price}}</td>
      <td>{{$product->product_quantity}}</td>
     
      <td>{{$product->alert_quantity}}</td>
      <td>{{$product->deleted_at}}</td>
      <td><div class="btn-group" role="group" aria-label="">
     
     
     <a class="btn btn-danger btn-sm" href="{{ url ('product/restore')}}/{{$product->id}}">Restore</a>
     <a type="button" class="btn btn-warning btn-sm" href="{{ url ('product/force')}}/{{$product->id}}">Force</a>
      </div></td>
    </tr>
    @empty
    <td colspan="5"class="text-center text-danger"> No products available</td>
    @endforelse
  </tbody>
</table>

          </div>
                
            </div>
        </div>
     </div>
     </div>
    </div>
    </div>
    </div>
@endsection

