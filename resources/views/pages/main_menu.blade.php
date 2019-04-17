<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->

  <div class='panel panel-default'>
    <div class='panel-heading'>Add Menu Form</div>
    <div class='panel-body'>
    <form method='post' action='{{ URL::to('add/main/menu') }}'>
        {{ csrf_field() }}
        <div class='form-group'>
          <label > Menu Name</label>
          <input class="col-md-8" type='text' name='name' required class='form-control'/>
        </div>
        <br>
        <div class='form-group'>
                <label > URL</label>
                <input class="col-md-8" type='text' name='url' required class='form-control'/>
              </div>
        <br><br>
      
      
        </div>
     

        <!-- Material unchecked -->
<div class="form-check">
  <input type="checkbox" name="status" value="1" class="form-check-input" id="materialUnchecked">
  <label class="form-check-label" for="materialUnchecked">Publish Menu</label> --
  <input type="checkbox" name="status" value="0" class="form-check-input" id="materialUnchecked">
  <label class="form-check-label" for="materialUnchecked">UnPublish Menu</label>
</div>
         
        
        <!-- etc .... -->
        <div class='panel-footer'>
            <input type='submit' class='btn btn-primary' value='Save changes'/>
          </div>
      </form>
    </div>
   
  </div>

@endsection