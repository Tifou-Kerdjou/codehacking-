@extends('layouts.admin')



@section('content')
@if (Session::has('deleted_photo'))
<div class="alert alert-danger alert-dismissible  show" role="alert">
   {{session('deleted_photo')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div> 
@endif

<h1>Media</h1>


     
     @if ($photos)
     <form action="/delete/media" method="post" class="form-inline">
     {{ csrf_field() }}
      <select name="checkBoxArray" id="" class="form-control">
        <option value="">Delete</option>
      </select>
      <input type="submit" name="delete_all" class="btn btn-primary">
    
     <table class="table"> 
      <tr> 
        <th><input type="checkbox" id="options"></th>
      <th>ID</th> 
      <th>Photo</th> 
      <th>path</th> 
      <th>Created </th>
       </tr>
    
     @foreach ($photos as $photo) 
    
     <tr> 
       <td><input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes"></td>
        <td>{{$photo->id}}</td> 
        <td><img height="50" src="{{$photo->file}}" alt=""></td>
         <td>{{$photo->file}}</td> 
        
        <td>{{$photo->created_at->diffForHumans()}}</td> 
        <td>
          {{-- <input type="hidden" name="photo" value="{{$photo->id}}">

            <div class="form-group">
              <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
            </div> --}}
            

        </td>
        </tr> 
         
     @endforeach
    </table>
  </form>
         
     @endif
     

     <div class="row">
      <div class="col-sm-6 col-sm-offset-5">
        {{ $photos->render()   }}
      </div>
    </div>
    @section('footer')
    <script>

      $(document).ready(function(){

         $('#options').click(function(){

          
          if(this.checked){
            $('.checkBoxes').each(function(){
              this.checked =true;
            });
          }
          else{
            $('.checkBoxes').each(function(){
              this.checked =false;
            });
          }


         });
      });




    </script>
    @stop


@stop