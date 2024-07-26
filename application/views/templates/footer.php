
<script>
    // Function to set modal title and button text based on the mode
    $('#authModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var mode = button.data('mode');
        var modal = $(this);
        
        // Set modal title and button text based on the mode
        if (mode === 'Login') {
            modal.find('.modal-title').text('Login');
            modal.find('#modalButton').text('Login');
        } else if (mode === 'Register') {
            modal.find('.modal-title').text('Register');
            modal.find('#modalButton').text('Register');

            var modalBody = modal.find('.modal-body').find('form');
            modalBody.append('<div class="form-group additional-fields" >' +
                '<label for="fullname">Full Name</label>' +
                '<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name">' +
                '</div>' +
                '<div class="form-group additional-fields" i>' +
                '<label for="email">Email</label>' +
                '<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">' +
                '</div>');
        }
    });

    $('#authModal').on('hide.bs.modal', function () {
        var modalBody = $(this).find('.modal-body').find('form');
        modalBody.find('.additional-fields').remove(); // Remove additional fields when the modal is closed
    });
</script>
</body>

</html>
