<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <title>Laravel Ajax</title>
  </head>
  <body>

    <!-- Button trigger modal -->


<!-- Add message Data Modal -->
<div class="modal fade" id="messageaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form id="addform">
        {{ csrf_field() }}
        <div class="modal-body">
          

          <input type="hidden" name="admin_id" id="admin_id" value="1"> <!-- Extra -->
          <div class="form-group">
            <label> Message Title </label>
            <input type="text" class="form-control" name="title" placeholder="Enter message title">
          </div>

          <div class="form-group">
            <label> Message </label>
            <input type="text" class="form-control" name="message" placeholder="Enter message">
          </div>

        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save message Data</button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End message Save Model -->


<!-- Edit message Data Modal -->
<div class="modal fade" id="messageeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form id="editformID">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="modal-body">
          
          
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="admin_id" id="admin_id" value="1">   <!-- Authintication ar id value boshate hobe -->

          <div class="form-group">
            <label> Message Title </label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter message title">
          </div>

          <div class="form-group">
            <label> Message </label>
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter message">
          </div>

          
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Message Data Updated</button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End edit modal -->



<!-- Delete message Data Modal -->
<div class="modal fade" id="messagedeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form id="deleteformID">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <div class="modal-body">
          
          
          <input type="hidden" name="id" id="delete_id">
          <p>Are You Sure !! You want to delete this data ?</p>
          

          
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Delete message Data </button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End delete modal -->

<!-- Dropdown message Data Modal -->
<<!-- div class="modal fade" id="messagedropdownmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Selected Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


     
        <div class="modal-body">
        	@foreach($messages as $message)
        	<div class="form-group">
            <label> Message Title </label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter message title">
          </div>
          
                   <div class="form-group">
            <label> Message </label>
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter message">
          </div> 
        		      		<a class="dropdown-item" href="#">{{ $message->title }}</a>
        		      		<a class="dropdown-item" href="#">{{ $message->message }}</a>
        		      		        	              <tr>
        		      		        	                
        		      		        	                <td>{{ $message->id }}</td>
        		      		        	                <td>{{ $message->admin_id }}</td>
        		      		        	                <td>{{ $message->title }}</td>
        		      		        	                <td>{{ $message->message }}</td>
        		      		        	                
        		      		        	              </tr>
        	              @endforeach


          
          <input type="hidden" name="id" id="id">
            <input type="hidden" name="admin_id" id="admin_id" value="1">  Authintication ar id value boshate hobe
          
           <div class="form-group">
            <label> Message Title </label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter message title">
          </div>
          
                   <div class="form-group">
            <label> Message </label>
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter message">
          </div>

          
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Message Data Updated</button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div> -->

<!-- End Dropdown modal -->




<div class="container">
  <div class="jumbotron">
    <!-- <div class="row"> -->
      <h1>Laravel Crud with Ajax</h1><br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageaddmodal">
        Message Add Data
      </button>
      

      <!-- Dropdown Start -->
      <!-- <br><br> -->
	      <!-- <div class="dropdown"> -->



	      	<?php
		      	$no_of_message=DB::table('messages')
		      	->count();
	      	?>

	      	<a class="btn btn-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	      		Messages <button class="btn btn-danger" style="height: 30px; width: 30px;">{{$no_of_message}}</button>
	      	</a>

	      	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
	      		@foreach($messages as $message)
	      		<a class="dropdown-item" style="color: blue;"  href="{{ URL::to('/selectedmessage/'.$message->id) }}">{{ $message->title }}<br><p style="size: 10px;">{{ $message->updated_at }}</p></a>
              
              @endforeach
	      		
	      	</div>
	      <!-- </div> -->
	      <!-- Dropdown End -->


<br><br>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Admin ID</th>
                <th scope="col">Message Title</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($messages as $message)
              <tr>
                
                <td>{{ $message->id }}</td>
                <td>{{ $message->admin_id }}</td>
                <td>{{ $message->title }}</td>
                <td>{{ $message->message }}</td>
                <td>
                  <a href="#" class="btn btn-success editbtn">EDIT</a>
                  <a href="#" class="btn btn-danger deletebtn">DELETE</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>




    <!-- </div> -->
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    


    <!-- ////////////////////////////////////////// FOR DATA DELETE START ////////////////////////////////////////////// -->
    <script type="text/javascript">
  
        $('.deletebtn').on('click', function(){
          $('#messagedeletemodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id').val(data[0]);
          
          
        });
        $('#deleteformID').on('submit', function(e){
          e.preventDefault();

          var id = $('#delete_id').val();

          $.ajax({
            type: "DELETE",
            url: "/messagedelete/"+id,
            data: $('#deleteformID').serialize(),
            success: function(response){
              console.log(response)
              $('#messagedeletemodal').modal('hide')
              alert("Data Deleted");
              location.reload();
            },
            error: function(error){
              console.log(error)
              alert("Data Not Updated");
            }
          });
        });
    </script>
    <!-- ////////////////////////////////////////// FOR DATA DELETTE END ////////////////////////////////////////////// -->


     <!-- ////////////////////////////////////////// FOR DATA DROPDOWN START ////////////////////////////////////////////// -->

     


   <!--  <script type="text/javascript">
     $(document).ready(function(){
       $('.dropdown-item').on('click', function(){
         $('#messagedropdownmodal').modal('show');
         
   
         // $tr = $(this).closest('tr');
   
         // var data = $tr.children("td").map(function(){
         //   return $(this).text();
         // }).get();
   
         // console.log(data);
         
         // $('#title').val(data[2]);
         // $('#message').val(data[3]);
         
         
       });
       /*$('#editformID').on('submit', function(e){
         e.preventDefault();
   
         var id = $('#id').val();
   
         $.ajax({
           type: "PUT",
           url: "/messageupdate/"+id,
           data: $('#editformID').serialize(),
           success: function(response){
             console.log(response)
             $('#messageeditmodal').modal('hide')
             alert("Data Updated");
             location.reload();
           },
           error: function(error){
             console.log(error)
             alert("Data Not Updated");
           }
         });
       });*/
     });
   </script> -->
    <!-- ////////////////////////////////////////// FOR DATA DROPDOWN END ////////////////////////////////////////////// -->



    <!-- ////////////////////////////////////////// FOR DATA EDIT START ////////////////////////////////////////////// -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.editbtn').on('click', function(){
          $('#messageeditmodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#id').val(data[0]);
          
          $('#title').val(data[2]);
          $('#message').val(data[3]);
          
          
        });
        $('#editformID').on('submit', function(e){
          e.preventDefault();

          var id = $('#id').val();

          $.ajax({
            type: "PUT",
            url: "/messageupdate/"+id,
            data: $('#editformID').serialize(),
            success: function(response){
              console.log(response)
              $('#messageeditmodal').modal('hide')
              alert("Data Updated");
              location.reload();
            },
            error: function(error){
              console.log(error)
              alert("Data Not Updated");
            }
          });
        });
      });
    </script>
    <!-- ////////////////////////////////////////// FOR DATA EDIT END ////////////////////////////////////////////// -->


    <!-- ////////////////////////////////////////// FOR DATA SAVE START ////////////////////////////////////////////// -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#addform').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            type: "POST",
            url: "/messageadd",
            data: $('#addform').serialize(),
            success: function(response){
              console.log(response)
              $('#messageaddmodal').modal('hide')
              alert("Data Saved");
              location.reload();
            },
            error: function(error){
              console.log(error)
              alert("Data Not Saved");
            }
          });
        });
      });
    </script>

    <!-- ////////////////////////////////////////// FOR DATA SAVE END ////////////////////////////////////////////// -->





  </body>
</html>