$(document).ready(function() {
    // Tab switching functionality
    $('.nav-tabs a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // User registration form submission
    $('#user-register-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        $.ajax({
            url: '{{ route('post.register') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data.errors) {
                    // Display validation errors
                    $.each(data.errors, function(key, value) {
                        const inputField = $(`[name="${key}"]`);
                        inputField.addClass('is-invalid');
                        inputField.after(`<span class="error-message text-danger">${value[0]}</span>`);
                    });
                } else if (data.success) {
                    alert('Registration successful!');
                    window.location.href = data.redirect_url;
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Attorney registration form submission
    $('#attorney-register-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        $.ajax({
            url: '{{ route('post.register') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data.errors) {
                    // Display validation errors
                    $.each(data.errors, function(key, value) {
                        const inputField = $(`[name="${key}"]`);
                        inputField.addClass('is-invalid');
                        inputField.after(`<span class="error-message text-danger">${value[0]}</span>`);
                    });
                } else if (data.success) {
                    alert('Registration successful!');
                    window.location.href = data.redirect_url;
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        });
    });

    // User register button click
    $('#user-register-btn').on('click', function(e) {
        e.preventDefault();
        $(this).closest('form').submit();
    });
});
