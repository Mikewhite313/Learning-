@extends('layouts.app')

@section('page_title')
Organizations
@endsection

@section('content')

    
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>z
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Organization</a>
            @endcan
        </div>
    </div>
</div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Expiry_Date</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    
                    
                      <tr>
                      @foreach($datas as $data)
                      <td><img src="{{ asset('uploads/images/'. $data->image ) }}" width="50" ></td> 
                        <td>{{$data->name}}</td>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->category->title}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{$data->latitude}}</td>
                        <td>{{$data->longitude}}</td>
                        <td>{{$data->expiry_date}}</td>
                        <td>{{$data->description}}</td>
                        <?php if($data->status == '1'){ ?>
                        <td><a href="{{route('organizations.status.update1',$data->id)}}" class="btn btn-primary" >Active</a></td>
                        <?php } else{ ?>
                            <td><a href="{{route('organizations.status.update1',$data->id)}}" class="btn btn-danger">Inactive</a></td>

                         <?php }?>
                        <td>
                         
                            <a class="btn btn-primary" href="#">Edit</a>
                            <a class="btn btn-danger" type="button" href = "#">
                            
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                        </td>
                      </tr>
                      @endforeach
                    
                  </table>
                </div>
              

@endsection
