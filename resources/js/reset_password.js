let button_reset_password = $('#button_reset_password')
let new_password = $('#new_password')
let submit_new_password = $('#submit_new_password')

button_reset_password.on('click', function () {

    resetError()

    let data_password = {
        new_password: new_password.val().trim(),
        submit_new_password: submit_new_password.val().trim()
    }

    if (validationData(data_password)) {
        data = {
            'user_id': getUserID(),
            'new_password': data_password.new_password
        }

        $.ajax({
            url: getRouteResetPassword(),
            type: "POST",
            data: data,
            headers: {'X-CSRF-TOKEN': getCSRFToken()},
            success: function (response) {
                if (response.result) {
                    $(`.${response.data}`).html(`${response.message}`)
                } else {
                    $(`${response.data}`).html(`${response.message}`)
                }
            }
        })
    }
})

function validationData(data) {
    let validation = true;

    if (!data.new_password) {
        new_password.addClass('error_input')
        $('#error_new_password').html("You must input your new password!")
        validation = false
    }

    if (!data.submit_new_password) {
        submit_new_password.addClass('error_input')
        $('#error_submit_new_password').html("You must re-input your new password!")
        validation = false
    }

    if (data.new_password !== data.submit_new_password) {
        $('#error_reset_password').html("New password and submit new password not the same!")
        validation = false
    }

    return validation;
}

function resetError() {
    $('.error_message').html('')
    $('input').removeClass('error_input')
}
