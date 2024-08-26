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
                    <tbody>
                        <tr>
                            <th width="10%" scope="row">1</th>
                            <td width="35%">Mark</td>
                            <td width="35%">Otto</td>
                            <td width="20%">
                                <button type="button" class="btn btn-primary" id="edit-btn">
                                    <i class="las la-pen-nib"></i>
                                </button>
                                <button type="button" class="btn btn-danger" id="delete-btn">
                                    <i class="las la-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('add-user-modal');
    @include('userJs');
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
