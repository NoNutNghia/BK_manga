let button_edit_status = $('#button_edit_status')

if (button_edit_status) {
    button_edit_status.on('click', function () {
        let action = $(this).val() === getActiveValue() ? 'unban' : 'ban'
        $(this).attr('disabled', true)
        Swal.fire({
            title: `Do you want to ${action} this user?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                data = {
                    'id': getUserID(),
                    'user_status': $(this).val()
                }

                Swal.fire({
                    title: `Just a moment...`,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                })

                $.ajax({
                    url: getRouteUpdateStatusUser(),
                    headers: {'X-CSRF-TOKEN': getCSRFToken()},
                    type: "POST",
                    data: data,
                    success: function (response) {
                        if (response.result) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            if (button_edit_status.val() === getActiveValue()) {
                                button_edit_status.removeClass('button_read_begin')
                                button_edit_status.addClass('button_follow')
                                button_edit_status.html('Ban User')
                                $('#user_status').html('active')
                                button_edit_status.val(getDisableValue())
                            } else {
                                button_edit_status.removeClass('button_follow')
                                button_edit_status.addClass('button_read_begin')
                                button_edit_status.html('Unban User')
                                $('#user_status').html('disabled')
                                button_edit_status.val(getActiveValue())
                            }

                            button_edit_status.removeAttr('disabled')
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            button_edit_manga.removeAttr('disabled')
                        }
                    }
                })
            }
        })
    })
}
