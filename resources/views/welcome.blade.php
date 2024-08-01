<x-sg-master>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="#" method="post" enctype="multipart/form-data">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Store Information</legend>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" for="name">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Enter your name..." id="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter your email..." id="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" for="phone">Phone</label>
                            <div class="col-lg-10">
                                <input type="tel" class="form-control" name="phone"
                                    placeholder="Enter your phone no..." id="phone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Photo</label>
                            <div class="col-lg-10">
                                <input type="file" class="" name="photo" id="photo" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="edit-form col-md-6" style="display: none;">
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Edit Information</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2" for="edit_name">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="edit_name" placeholder="Enter your name..."
                                id="edit_name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2" for="edit_email">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="edit_email"
                                placeholder="Enter your email..." id="edit_email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2" for="edit_phone">Phone</label>
                        <div class="col-lg-10">
                            <input type="tel" class="form-control" name="edit_phone"
                                placeholder="Enter your phone no..." id="edit_phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Photo</label>
                        <div class="col-lg-10">
                            <input type="file" class="" name="edit_photo" id="edit_photo" />
                        </div>
                    </div>
                </fieldset>

            </div>
        </div>
        <button class="btn btn-outline-primary" id="edit_btn" onclick="showEdit()">Show Edit</button>
    </div>
    @push('js')
        <script>
            const editBtn = $('#edit_btn');
            const editForm = $('.edit-form');

            editBtn.click(function() {
                editForm.toggle();
                editBtn.text(editForm.is(':visible') ? 'Hide Edit' : 'Show Edit');
                editBtn.toggleClass('btn-outline-primary btn-outline-danger');
            });
        </script>
    @endpush
</x-sg-master>
