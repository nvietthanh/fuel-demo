function handleUploadImage (event) {
    event.preventDefault();

    $('#image').click()
}

$(document).ready(function () {

    $('#image').on('change', function(event) {
        var file = event.target.files[0];

        if (file && file.type.startsWith('image')) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
                $('#previewImg').show();
            };

            reader.readAsDataURL(file);
        }
    });

    $('#product-form').on('submit', function (event) {
        event.preventDefault();

        clearErrors('product-form')

        $.ajax({
            url: '/admin/products/store',
            method: 'POST',
            data: new FormData($(this)[0]),
            processData: false,
            contentType: false,
            success: function (response) {
                // Swal.fire({
                //     toast: true,
                //     position: 'top-end',
                //     icon: 'success',
                //     text: response.message,
                //     showConfirmButton: false,
                //     timer: 1500,
                //     timerProgressBar: true
                // }).then(() => {
                //     window.location.href = '/admin/products';
                // });
            },
            error: function (xhr) {
                const response = xhr.responseJSON

                if (response.status == 422) {
                    const errors = response.data

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        text: 'Please check the form fields and try again.',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    });

                    setErrors(errors, 'product-form')
                }
            }
        });
    });
});
