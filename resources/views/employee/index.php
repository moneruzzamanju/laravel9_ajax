<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Laravel9 Ajax</h1>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>Moneruzzaman</td>
                                    <td>Accountant</td>
                                    <td>DMCH</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary mr-2">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span id="addMenu" class="btn btn-primary">Add Employee</span>
                        <span id="updateMenu" class="btn btn-primary">Update Employee</span>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Employee Title</label>
                                <input type="text" class="form-control" id="title" aria-describedby="title">
                            </div>
                            <div class="mb-3">
                                <label for="organization" class="form-label">Employee organization</label>
                                <input type="text" class="form-control" id="organization" aria-describedby="organization">
                            </div>


                            <button type="submit" id="addButton" class="btn btn-primary">Add</button>
                            <button type="submit" id="updateButton" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $('#addMenu').show();
        $('#addButton').show();
        $('#updateMenu').hide();
        $('#updateButton').hide();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        function allData(){
            $.ajax({
            type:"GET",
            dataType: 'json',
            url: "employees/all",
            success:function(response){
                let data = "response"
                $.each(response, function(key, value){
                    data = data + "<tr>"
                    
                    data = data + "<td>"+value.id+"</td>"
                    data = data + "<td>"+value.name+"</td>"
                    data = data + "<td>"+value.title+"</td>"
                    data = data + "<td>"+value.organization+"</td>"
                    data = data + "<td>"
                    data = data + "<button class='btn btn-sm btn-primary mr-2'>Edit</button>"
                    data = data + "<button class='btn btn-sm btn-danger'>Delete</button>"
                    data = data + "</td>"

                    data = data + "</tr>"
                })
                $('tbody').html(data);
            }
            })
        }

        allData();
    </script>
</body>

</html>