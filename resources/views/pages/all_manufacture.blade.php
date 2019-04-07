<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<table id="table_id" class="display">

    <?php
    $data = DB::table('manufactures')->get();

    ?>


    <p class="alert-success">
        <?php
            
            $message = Session::get('message', null);
        if($message){
            echo $message;
            Session::put('message', null);
        }
            
            ?>
        <thead>
            <tr>
                <th>Name </th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                

                @foreach ($data as $item)

                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                @if($item->status == 1)
                <td><a href="#" class="btn btn-success">Published</a></td>
                @else
                <td><a href="#" class="btn btn btn-danger">UnPublished</a></td>

                @endif

                @if($item->status == 1)
                <td><a class="btn btn-success" href="{{ URL::to('/unactive_manufacture', $item->id)}}"> <i class="fa fa-thumbs-up"></i></td>
                    @else
                <td><a class="btn btn-danger" href="{{ URL::to('/active_manufacture', $item->id)}}"> <i class="fa fa-thumbs-down"></i></td>
                        @endif
            <td>
            <form action="{{ URL::to('/manufacture/delete', $item->id)}}" method="post">
                  @csrf
                  
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>

                    
            </tr>
                    
                @endforeach
                
          
           
        </tbody>
    </table>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script>

$(document).ready( function () {
    $('#table_id').DataTable();
} );

 </script>
@endsection