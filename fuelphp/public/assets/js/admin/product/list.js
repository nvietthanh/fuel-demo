function handleCreateProduct() {
    location.href = `/admin/products/create`;
}

function handleEditProduct(id) {
    location.href = `/admin/products/${id}/edit`;
}

function handleDeleteProduct(id) {
    Swal.fire({
        title: 'Are you sure you want to delete?',
        text: "This data cannot be recovered!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/products/delete/' + id,
                method: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire( 'Deleted!', 'The record has been successfully deleted.', 'success');
                    } else {
                        Swal.fire( 'Error!', 'Failed to delete: ' + response.message, 'error');
                    }
                },
                error: function(res) {
                    const response = res.responseJSON

                    Swal.fire('Error!', response.message ?? 'Unable to connect to the server.', 'error');
                }
            });
        }
    });
}