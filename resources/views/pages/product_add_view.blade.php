<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
 @php
     $category = DB::table('categories')->get();
     $manufacture = DB::table('manufactures')->get();
 @endphp

  <div class="container col-md-12">
  <div class='panel panel-default'>
    <div class='panel-heading'>Add Form</div>
    <div class='panel-body'>
      <form method='post' action='{{ URL::to('add/new/products')}}' enctype="multipart/form-data">
@csrf
        <div class="form-group">
            <label for="name" class="bmd-label-floating">Product Name</label>
            <input type="text"name="name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="category" class="bmd-label-floating">Category</label>
            <select name="category" class=" form-control">Select Catergory
            @foreach ($category as $cat)
                
        <option value="{{ $cat->id }}">{{ $cat->name }}
                @endforeach
        </option>
    </select>
       
        </div>
        
        <div class="form-group">
                <label for="manufacture" class="bmd-label-floating">Manufacture </label>
                <select name="manufacture" class=" form-control">Select Manufacture
                    @foreach ($manufacture as $item)
                        
                    
                <option value="{{ $item->id }}">{{ $item->name }}
                        @endforeach
                </option>

            </select>
            </div>
            
       
        <div class="form-group">
            <label for="exampleTextarea" class="bmd-label-floating">Short Description</label>
            <textarea name="short_description" class="form-control"  rows="2"></textarea>
        </div>
        <br>
       
        <div class="form-group">
            <label for="exampleTextarea" class="bmd-label-floating">Long Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
                <label for="name" class="bmd-label-floating">Product Price </label>
                <input type="text"  name="price" class="form-control" >
            </div>
        <div class="form-group">
                <label for="name" class="bmd-label-floating">Product Color</label>
                <input type="text" name="color" class="form-control" >
            </div>
        <div class="form-group">
                <label for="name" class="bmd-label-floating">Product Size</label>
                <input type="text" name="size" class="form-control" >
            </div>
        <div class="form-group">
            <label for="exampleInputFile" class="bmd-label-floating">File input</label>
            <input type="file" class="form-control-file" name="images">
        </div>
        <br>
        <div class="checkbox">
            <label>
            <input type="checkbox" name="status"  value="1"> Publish Product
            </label>
        </div>
        <br>
        <button class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary btn-raised">Submit</button>
        </form>
</div>

      </div>
  </div>
@endsection