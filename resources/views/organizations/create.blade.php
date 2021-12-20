@extends('layouts.app')

@section('page_title')
Add Organization
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Product</h4>
              </div>
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
            @endif
              <form action="{{ route('organizations.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="name" class="form-control" placeholder="name">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User</label>
                  <div class="col-sm-12 col-md-7">
                  <select id="user_id" name="user_id" class="from-control">
                      <option value="">Select User</option>
                      @foreach($data as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                  <div class="col-sm-12 col-md-7">
                  <select id="category_id" name="category_id" class="from-control">
                      <option value="">Select Category</option>
                      @foreach($datas as $data)
                      <option value="{{ $data->id }}">{{ $data->title }}</option>
                      @endforeach
                      
                  </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="number" name="amount" class="form-control" placeholder="amount">
                  </div>
                </div>
              
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expiry_Date</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="date" name="expiry_date" class="form-control" placeholder="Expiry">
                  </div>
                </div>
           
                
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Latitude</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="decimal" name="latitude" class="form-control" placeholder="lat">
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Longitude</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="decimal" name="longitude" class="form-control" placeholder="long">
                  </div>
                </div>
           
                
                
                
                <div class="form-group row mb-4">
                    
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                  <div class="col-sm-12 col-md-7">
                  <input type="file" name="image" class="form-control" placeholder="Image">
                  
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                  <div class="col-sm-12 col-md-7">
                  <textarea type="textarea" id="description" name="description" rows="4" cols="50"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection