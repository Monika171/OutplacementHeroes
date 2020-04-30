@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Create a Job Post</div>
                <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control">
                            
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                <textarea name="description" id="summernote" class="form-control" ></textarea>
                
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                <textarea name="roles"  class="form-control" ></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" class="form-control">
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Location:</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="1">live</option>
                        <option value="0">draft</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lastdate">Last date:</label>
                    <input type="date" name="last_date" class="form-control">

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
               
              
            </div>
                
        </div>
    </div>
</div>
@endsection
