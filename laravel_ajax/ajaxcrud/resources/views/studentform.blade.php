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


<!-- Add Student Data Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form id="addform">
        {{ csrf_field() }}
        <div class="modal-body">
          

          <div class="form-group">
            <label> First Name </label>
            <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label> Last Name </label>
            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
          </div>

          <div class="form-group">
            <label> Course </label>
            <input type="text" class="form-control" name="course" placeholder="Enter course">
          </div>

          <div class="form-group">
            <label> Section </label>
            <input type="text" class="form-control" name="section" placeholder="Enter section">
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Student Data</button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End Student Save Model -->


<!-- Edit Student Data Modal -->
<div class="modal fade" id="studenteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form id="editformID">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="modal-body">
          
          
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label> First Name </label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
          </div>

          <div class="form-group">
            <label> Last Name </label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
          </div>

          <div class="form-group">
            <label> Course </label>
            <input type="text" class="form-control" name="course" id="course" placeholder="Enter course">
          </div>

          <div class="form-group">
            <label> Section </label>
            <input type="text" class="form-control" name="section" id="section" placeholder="Enter section">
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Student Data Updated</button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End edit modal -->



<!-- Delete Student Data Modal -->
<div class="modal fade" id="studentdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
        <button type="submit" class="btn btn-primary"> Delete Student Data </button>
      </div>
        
      </form>
      
      
    </div>
  </div>
</div>

<!-- End delete modal -->




<div class="container">
  <div class="jumbotron">
    <!-- <div class="row"> -->
      <h1>Laravel Crud with Ajax</h1><br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
        Student Add Data
      </button>


<br><br>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Course</th>
                <th scope="col">Section</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                
                <td>{{ $student->id }}</td>
                <td>{{ $student->fname }}</td>
                <td>{{ $student->lname }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->section }}</td>
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
          $('#studentdeletemodal').modal('show');

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
            url: "/studentdelete/"+id,
            data: $('#deleteformID').serialize(),
            success: function(response){
              console.log(response)
              $('#studentdeletemodal').modal('hide')
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


    <!-- ////////////////////////////////////////// FOR DATA EDIT START ////////////////////////////////////////////// -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.editbtn').on('click', function(){
          $('#studenteditmodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#id').val(data[0]);
          $('#fname').val(data[1]);
          $('#lname').val(data[2]);
          $('#course').val(data[3]);
          $('#section').val(data[4]);
          
        });
        $('#editformID').on('submit', function(e){
          e.preventDefault();

          var id = $('#id').val();

          $.ajax({
            type: "PUT",
            url: "/studentupdate/"+id,
            data: $('#editformID').serialize(),
            success: function(response){
              console.log(response)
              $('#studenteditmodal').modal('hide')
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
            url: "/studentadd",
            data: $('#addform').serialize(),
            success: function(response){
              console.log(response)
              $('#studentaddmodal').modal('hide')
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