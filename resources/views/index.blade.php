<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AjaxCrud</title>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="#" method="post" enctype="multipart/form-data" id="store-form">
                    @csrf
                    <div>
                        <label for="name" class="">Name:</label>
                        <input type="text" name="name" id="name" class="form-input">
                    </div>
                    <div>
                        <label for="email" class="">Email:</label>
                        <input type="email" name="email" id="email" class="form-input">
                    </div>
                    <div>
                        <label for="phone" class="">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-input">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="#" method="post" enctype="multipart/form-data" id="edit-form">
                    @method('PATCH')
                    @csrf
                    <div>
                        <label for="name" class="">Name:</label>
                        <input type="text" name="name" id="name" class="form-input">
                    </div>
                    <div>
                        <label for="email" class="">Email:</label>
                        <input type="email" name="email" id="email" class="form-input">
                    </div>
                    <div>
                        <label for="phone" class="">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-input">
                    </div>
                    <div>
                        <label for="photo" class="">Photo:</label>
                        <input type="file" name="photo" id="photo" class="form-input">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
