let button_change_password = $('#button_change_password')
let new_password = $('#new_pass')
let current_password = $('#current_pass')
let confirm_password = $('#confirm_pass')

button_change_password.on('click', function () {

    resetError()

    let data_password = {
        new_password: new_password.val().trim(),
        confirm_password: confirm_password.val().trim(),
        current_password: current_password.val().trim()
    }

    if (validationPassword(data_password)) {
        if (checkConfirmPassword(data_password)) {

            data = {
                'current_password': data_password.current_password,
                'new_password': data_password.new_password
            }

            $.ajax({
                url: getRouteChangePassword(),
                headers: {'X-CSRF-TOKEN': getCSRFToken()},
                type: "POST",
                data: data,
                success: function (response) {
                    if (response.result) {
                        emptyInput()
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        $(`#${response.data}`).html(`${response.message}`)
                    }
                }
            })
        }
    }
})

function validationPassword(data) {
    let validation = true

    if (!data.current_password) {
        $('#error_current_password').html('You must input your current password!')
        current_password.addClass('error_input')
        validation = false
    }

    if (!data.new_password) {
        $('#error_new_password').html('You must input your new password!')
        new_password.addClass('error_input')
        validation = false
    }

    if (!data.confirm_password) {
        $('#error_confirm_password').html('You must re-input your new password!')
        confirm_password.addClass('error_input')
        validation = false
    }

    return validation
}

function checkConfirmPassword(data) {
    if (data.new_password !== data.confirm_password) {
        new_password.addClass('error_input')
        confirm_password.addClass('error_input')
        $('#error_confirm_password').html('Confirm password not the same with new password!')
        return false
    }

    return true
}

function resetError() {
    $('input').removeClass('error_input')
    $('.error_message').html('')
}

function emptyInput() {
    $('input').val('')
}
