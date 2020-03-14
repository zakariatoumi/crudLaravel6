<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 6 CRUD</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .container{
            padding: 0.5%;
        }
    </style>
    <div class="container">
        <h2 class="alert alert-success">Laravel 6.0 CRUD</h2>


    <div class="row">
        <!-- Button trigger modal -->
        <a href="" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Add New Student</a>
        <div class="col-md-12">

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                 <p>{{ $message }}</p>
            </div>
        @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>LastName</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $students)
                    <tr>
                        <td>{{$students->id}}</td>
                        <td>{{$students->firstname}}</td>
                        <td>{{$students->lastname}}</td>
                        <td>{{$students->gender}}</td>
                        <td>{{$students->country}}</td>
                        <td>{{$students->city}}</td>
                        <td>{{$students->address}}</td>
                        <td>
                                <a type="button" class="btn btn-primary btn-sm" data-student_id="{{$students->id}}" data-firstname="{{$students->firstname}}"
                                data-lastname="{{$students->lastname}}" data-gender="{{$students->gender}}" data-country="{{$students->country}}"
                                data-city="{{$students->city}}" data-address="{{$students->address}}" data-toggle="modal" data-target="#exampleModal-edit">Update</a>

                                <a type="button" class="btn btn-primary btn-sm" data-student_id="{{$students->id}}" data-firstname="{{$students->firstname}}"
                                data-lastname="{{$students->lastname}}" data-gender="{{$students->gender}}" data-country="{{$students->country}}"
                                data-city="{{$students->city}}" data-address="{{$students->address}}" data-toggle="modal" data-target="#exampleModal-show">Show</a>

                                <a class="btn btn-danger btn-sm" type="button" data-student_id="{{$students->id}}" data-toggle="modal" data-target="#exampleModal-delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

<!-- -------------------------------- ADD NEW STUDENT ----------------------------- -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('Student.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="formGroupExampleInput" placeholder="Furstname">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="formGroupExampleInput2" placeholder="Lastname">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Country</label>
            <input type="text" class="form-control" name="country" id="formGroupExampleInput2" placeholder="Country">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">City</label>
            <input type="text" class="form-control" name="city" id="formGroupExampleInput2" placeholder="City">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Address</label>
            <textarea type="text" class="form-control" name="address" id="formGroupExampleInput2" placeholder="Address"></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Gender</label>
            <input type="text" class="form-control" name="gender" id="formGroupExampleInput2" placeholder="Gender">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Student</button>
      </div>
       </form>
    </div>
  </div>
</div>

<!-- -------------------------------- EDIT STUDENT ----------------------------- -->



<!-- Modal -->
<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('Student.update','student_id')}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="student_id" name="student_id">
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Furstname">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Address"></textarea>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student</button>
      </div>
       </form>
    </div>
  </div>
</div>


<!-- -------------------------------- DELETE STUDENT ----------------------------- -->



<!-- Modal -->
<div class="modal fade left" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('Student.destroy','student_id')}}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" id="student_id" name="student_id">
        <p class="text-center">Are you sure Want to delete this student ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">DELETE Student</button>
      </div>
       </form>
    </div>
  </div>
</div>


<!-- -------------------------------- SHOW STUDENT ----------------------------- -->



<!-- Modal -->
<div class="modal fade left" id="exampleModal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('Student.update','student_id')}}" method="post">
        @csrf
        <!-- @method('PUT') -->
        <input type="hidden" id="student_id" name="student_id">
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Furstname" readonly>
        </div>
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname"readonly>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" readonly>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City" readonly>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Address" readonly></textarea>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student</button>
      </div>
       </form>
    </div>
  </div>
</div>

        </div>
    </div>
    </div>

    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
<script>
    $('#exampleModal-edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var firstname = button.data('firstname')
        var lastname = button.data('lastname')
        var country = button.data('country')
        var city = button.data('city')
        var address = button.data('address')
        var gender = button.data('gender')
        var student_id = button.data('student_id')

        var modal = $(this)
        modal.find('.modal-title').text('EDIT STUDENT INFORMATION');
        modal.find('.modal-body #firstname').val(firstname);
        modal.find('.modal-body #lastname').val(lastname);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #student_id').val(student_id);

    });


    $('#exampleModal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)

        var student_id = button.data('student_id')

        var modal = $(this)
        modal.find('.modal-title').text('DELETE STUDENT');
        modal.find('.modal-body #student_id').val(student_id);

    });


    $('#exampleModal-show').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var firstname = button.data('firstname')
        var lastname = button.data('lastname')
        var country = button.data('country')
        var city = button.data('city')
        var address = button.data('address')
        var gender = button.data('gender')
        var student_id = button.data('student_id')

        var modal = $(this)
        modal.find('.modal-title').text('SHOW STUDENT INFORMATION');
        modal.find('.modal-body #firstname').val(firstname);
        modal.find('.modal-body #lastname').val(lastname);
        modal.find('.modal-body #country').val(country);
        modal.find('.modal-body #city').val(city);
        modal.find('.modal-body #address').val(address);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #student_id').val(student_id);

    });
</script>
</body>
</html>
