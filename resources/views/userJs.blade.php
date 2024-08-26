    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
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
                        // console.log(response);
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
        });
    </script>
