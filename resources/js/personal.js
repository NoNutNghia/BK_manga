let full_name = $('#info_full_name')
let nick_name = $('#info_nick_name')
let date_of_birth = $('#info_date_of_birth')
let button_update_information = $('#update_information')
let gender_information = $('input[type="radio"]:checked')
let input_file = $('#upload-file')
let string_file = ''

input_file.on('change', function (event) {
    const file = this.files[0]
    if(file) {
        let reader = new FileReader()

        reader.onload = function (e) {
            $('#avatar_user').attr('src', e.target.result)
            string_file = e.target.result
        }

        reader.readAsDataURL(file)
    }
})
button_update_information.on('click', function () {

    resetError()

    let data = {
        'full_name': full_name.val().trim(),
        'nick_name': nick_name.val().trim(),
        'date_of_birth': date_of_birth.val(),
        'gender': gender_information.val(),
        'string_file': string_file
    }

    let check = validateUpdateData(data)

    if (check) {
        $.ajax({
            url: getRouteChangeInformation(),
            type: 'POST',
            headers: {'X-CSRF-TOKEN': getCSRFToken()},
            data: data,
            success: function (res) {
                if (res.result) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: `${res.message}`,
                        showConfirmButton: false,
                        timer: 1500
                    })

                    if (string_file) {
                        avatar_user.attr('src', string_file)
                    }
                } else {
                    if (res.data) {
                        $(`#${res.data}`).html(res.message)
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: `${res.message}`,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            }
        })
    }
})

function validateUpdateData(data) {
    let validation = true;

    if (!data['full_name']) {
        setErrorInput(full_name, validation)
        $('#info_full_name_error').html("You must input your full name")
    }

    if (!data['nick_name']) {
        setErrorInput(nick_name, validation)
        $('#info_nick_name_error').html("You must input your nickname")
    }

    if (!data['date_of_birth']) {
        setErrorInput(date_of_birth, validation)
        $('#info_date_of_birth_error').html("You must choose your date of birth")
    }
    if (!data['gender']) {
        setErrorInput(gender_information, validation)
        $('#info_gender_error').html("You must choose your gender")
    }

    return validation
}

function setErrorInput(selector, validation) {
    selector.addClass('error_input')
    validation = false
}

function resetError() {
    $('input').removeClass('error_input')
    $('.error_message').html("")
}

