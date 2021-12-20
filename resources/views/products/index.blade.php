@extends('layouts.app')

@section('page_title')
	Manage Products
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            @endcan
        </div>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-bordered">
                    
                      <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Action</th>
                      </tr>
                    
                    
                      <tr>
                      @foreach($products as $product)
                        <td>{{$product->name}}</td>
                        <td>{{$product->detail}}</td>
                       
                        <td>
                            <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Edit</a>
                            <a class="btn btn-danger" type="button" href = "{{route('products.destroy' , $product->id)}}">
                            
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                        </td>
                        
                      </tr>
                      @endforeach
                    
  </table>
</div>

@endsection