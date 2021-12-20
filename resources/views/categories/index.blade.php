@extends('layouts.app')
@section('page_title')
Categories
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Categories</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
            @endcan
        </div>
    </div>
</div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    
                      <tr>
                        
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    
                    
                      @foreach($datas as $data)
                      <tr>
                      
                        
                      
                        <td>{{$data->title}}</td>
                        <?php if($data->status == '1'){ ?>
                        <td><a href="{{route('categories.status.update',$data->id)}}" class="btn btn-primary" >Active</a></td>
                        <?php } else{ ?>
                            <td><a href="{{route('categories.status.update',$data->id)}}" class="btn btn-danger">Inactive</a></td>

                         <?php }?>
                        <td>
                            <a class="btn btn-primary" href="{{route('categories.edit', $data->id)}}">Edit</a>
                            <a class="btn btn-danger" type="button" href = "{{route('categories.destroy' , $data->id)}}">
                            
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                        </td>
                      </tr>
                      @endforeach
                    
                  </table>
                </div>
@endsection