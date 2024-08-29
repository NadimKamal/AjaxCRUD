<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <title>{{ __('Ajax-CRUD') }}</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="text-center">
                <h3>{{ __('Ajax CRUD') }}</h3>
            </div>
            <div class="w-75 m-auto">
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#addUserModal">{{ __('Add User') }}</button>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">{{ __('#') }}</th>
                            <th width="35%" scope="col">{{ __('Name') }}</th>
                            <th width="35%" scope="col">{{ __('Email') }}</th>
                            <th width="20%" scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('edit-user-modal');
    @include('add-user-modal');
    @include('ajaxSetup');
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            let tableBody = $('#tableBody');
            getData();

            function getData() {
                $.ajax({
                    url: "{{ route('ajax.data') }}",
                    method: 'get',
                    data: {},
                    success: function(response) {
                        // console.log(response.users);
                        if ((response.users).length > 0) {
                            (response.users).forEach((item, index) => {
                                // console.log(item.uuid);
                                tableBody.append(
                                    `<tr>
                            <th width="10%" scope="row">${++index}</th>
                            <td width="35%">${item.name}</td>
                            <td width="35%">${item.email}</td>
                            <td width="20%">
                                <a data-uuid="${item.uuid}" data-name="${item.name}" data-email="${item.email}" class="btn btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                    <i class="las la-pen-nib"></i>
                                </a>
                                <button type="submit" delete-uuid="${item.uuid}" class="btn btn-danger delete-btn">
                                    <i class="las la-trash-alt"></i>
                                </button>
                            </td>
                        </tr>`
                                );
                            });
                        } else {
                            tableBody.append(`<tr>
                            <td colspan='4' class='text-danger text-center'>
                                <b>No Data Found.</b>
                            </td>
                            </tr>`);
                        }
                        // if ((response.users).length > 0) {
                        //     $.each(response.users, function(){
                        //         tableBody.append(
                        //             `<tr>
                    //                 <td>nadim</td>
                    //                 <td>nadim</td>
                    //                 <td>nadim</td>
                    //                 <td>nadim</td>
                    //                 </tr>`;
                        //         );
                        //     });
                        // } else {

                        // }
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            }

            $(document).on('click', '#save-btn', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                // console.log(name);
                // console.log(email);

                $.ajax({
                    url: "{{ route('user.store') }}",
                    method: 'post',
                    data: {
                        name: name,
                        email: email
                    },
                    success: function(response) {
                        $('#name').val('');
                        $('#email').val('');
                        tableBody.html('');
                        getData();
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('#error-msg').append('<span class="text-danger m-2">' +
                                value +
                                '</span>' + '</br>');
                        });
                    }
                });
            });

            $(document).on('click','.edit-btn',function(){
                let editUuid = $('#edit-uuid');
                let editName = $('#edit-name');
                let editEmail = $('#edit-email');

                let uuid = $(this).attr('data-uuid');
                let name = $(this).attr('data-name');
                let email = $(this).attr('data-email');

                editName.val(name);
                editEmail.val(email);
                editUuid.val(uuid);
            });


            let updateUrlTemplate = "{{route('user.update',':uuid')}}";

            $(document).on('click','#update-btn',function(){
                let uuid = $('#edit-uuid').val();
                let name = $('#edit-name').val();
                let email = $('#edit-email').val();
                let updateUrl = updateUrlTemplate.replace(':uuid',uuid);

                $.ajax({
                    url: updateUrl,
                    method:'patch',
                    data:{
                        name:name,
                        email:email
                    },
                    success: function(response){
                        tableBody.html('');
                        getData();
                    },
                })
            });

            let deleteUrlTemplate = "{{route('user.delete',':uuid')}}";
            $(document).on('click','.delete-btn' ,function(){
                let deleteUuid = $(this).attr('delete-uuid');
                let deleteUrl = deleteUrlTemplate.replace(':uuid',deleteUuid);

                $.ajax({
                    url: deleteUrl,
                    method: 'delete',
                    data:{},

                    success: function(response){
                        tableBody.html('');
                        getData();
                    },
                });

                
            });
        });
    </script>
</body>

</html>
