@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                 <table class="table">
  <thead>
    <tr>
     <th>Sl no</th>
     <th>Name</th>
     <th>Email</th>
     <th>Account Created at</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($users as $user)
      <td>{{$loop->index+1}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <!-- <td>{{$user->created_at->format('d /m/ y H:i:s')}}</td> -->
      <!-- <td>{{$user->created_at->diffForHumans()}}
      {{$user->created_at->format('d /m/ y H:i:s')}}
      </td> -->
      <td> 
      
      @if( $user->created_at->diffForHumans()=='1 week ago') 
      {{ $user->created_at }}
      @else 
      {{ $user->created_at->diffForHumans() }}
      @endif
      </td>
     
    </tr>
   @endforeach
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
