let genre = $('#genre')
let ranking = $('#ranking')
let genre_hide = $('#genre_hide')
let ranking_hide = $('#ranking_hide')
let login = $('#login')
let register = $('#register')
let avatar_user = $('#personal_avatar')
let modal_user = $('.modal_user')
let input_search = $('#input_search')
let search_result = $('#search_result')
let footer_tag = $('.footer_tag')

genre.hover(
    function () {
        if (genre_hide.css('display') === 'none') {
            genre_hide.css('display', 'grid')
            genre_hide.hover(
                function () {
                    genre_hide.css('display', 'grid')
                },
                function () {
                    genre_hide.css('display', 'none')
                }
            )
        }
    },
    function () {
        genre_hide.css('display', 'none')
    }
)

ranking.hover(
    function () {
        if (ranking_hide.css('display') === 'none') {
            ranking_hide.css('display', 'grid')
            ranking_hide.hover(
                function () {
                    ranking_hide.css('display', 'grid')
                },
                function () {
                    ranking_hide.css('display', 'none')
                }
            )
        }
    },
    function () {
        ranking_hide.css('display', 'none')
    }
)

login.on('click', function () {
    popup_login()
})

register.on('click', function () {
    popup_register()
})

function show_password_action(action) {

    let password_login = get_password_input()
    let show_password = get_show_password_eye()
    let hide_password = get_hide_password_eye()

    if (action) {
        password_login.attr('type', 'text')
        show_password.css('display', 'none')
        hide_password.css('display', 'block')
    } else {
        password_login.attr('type', 'password')
        show_password.css('display', 'block')
        hide_password.css('display', 'none')
    }
}

function get_password_input() {
    return $('#password_login')
}

function get_email_login() {
    return $('#email_login')
}

function get_show_password_eye() {
    return $('#show_password')
}

function get_hide_password_eye() {
    return $('#hide_password')
}

function popup_forgot_password() {
    let html_input =
        `
            <div class="flex flex-col gap-[8px] login_popup">
                <span class="error_message" id="error_reset"></span>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="email_login" class="label_input">Email</label>
                    <input type='text' placeholder='Email' class="input_auth" id="email_login">
                </div>
                <span class="error_message" id="error_email"></span>
                <div class="flex flex-col w-full mt-[8px]">
                    <button class="button_auth button_forgot_password w-full" id="button_send_request_reset_password">
                        <span>
                            Send Request Reset Password
                        </span>
                    </button>
                </div>
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-row items-center">
                        <span class="popup_text_redirect" onclick="popup_login()">
                            <span>
                                Login
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        `
    Swal.fire({
        title: "Forgot password",
        color: "#000",
        html: html_input,
        background: "#fff",
        showConfirmButton: false,
        showCloseButton: true,
    })

    $('#button_send_request_reset_password').on('click', function () {

        $(this).attr('disabled', true)

        resetMessageError()
        resetMessageError()

        email = $('#email_login').val().trim();

        data = {
            'email': email
        }

        if (validationForgotPassword(data)) {
            $.ajax({
                url: getCheckExistEmailRoute(),
                type: 'POST',
                headers: {'X-CSRF-TOKEN': getCSRFToken()},
                data: data,
                success: function (response) {
                    if (!response.result) {
                        $('#button_send_request_reset_password').removeAttr('disabled')
                        $(`#${response.data}`).html(response.message)
                    } else {
                        html_input = `
                        <div class="flex flex-col justify-center items-center gap-[16px] login_popup">
                            <span class="font-bold text-[30px]">
                                ${response.message}
                            </span>
                            <i class="fa-solid fa-envelope fa-beat-fade text-[60px] text-[blue] h-[70px]"></i>
                        </div>
                    `
                        Swal.fire({
                            color: "#000",
                            html: html_input,
                            background: "#fff",
                            showConfirmButton: true,
                        })
                    }
                }
            })
        }
    })
}

function popup_register() {
    let html_input =
        `
            <div class="flex flex-col gap-[8px] login_popup">
                <span class="error_message text-center" id="register_error">
                </span>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="full_name" class="label_input">Full name</label>
                    <input type='text' placeholder='Full name' class="input_auth" id="full_name">
                    <span class="error_message" id="full_name_error">
                    </span>
                </div>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="nick_name" class="label_input">Nickname</label>
                    <input type='text' placeholder='Nickname' class="input_auth" id="nick_name">
                    <span class="error_message" id="nick_name_error">
                    </span>
                </div>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="login_id" class="label_input">Email</label>
                    <input type='text' placeholder='Email' class="input_auth" id="login_id">
                    <span class="error_message" id="email_error">
                    </span>
                </div>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="password_login" class="label_input">Password</label>
                    <div class="flex flex-row items-center relative">
                        <input type='password' placeholder='Password' class="input_auth input_password" id="password_login">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon_eye" id="show_password" onclick="show_password_action(true)" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon_eye" id="hide_password" onclick="show_password_action(false)" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z"/></svg>
                    </div>
                    <span class="error_message" id="password_error">
                    </span>
                </div>
                <div class="flex flex-col gap-[4px]" >
                    <div class="label_input">
                        Gender
                    </div>
                    <div class="gender_option">
                        <div>
                            <label for="male" class="label_input">Male</label>
                            <input type="radio" name="gender" id="male" checked value="1">
                        </div>

                        <div>
                            <label for="female" class="label_input">Female</label>
                            <input type="radio" name="gender" id="female" value="2">
                        </div>

                        <div>
                            <label for="other" class="label_input">Other</label>
                            <input type="radio" name="gender" id="other" value="3">
                        </div>
                    </div>
                    <span class="error_message" id="gender_error">
                    </span>
                </div>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="date_of_birth" class="label_input">Date of birth</label>
                    <input type='date' class="input_auth" id="date_of_birth">
                    <span class="error_message" id="date_of_birth_error">
                    </span>
                </div>
                <div class="flex flex-row items-center justify-between mt-[16px]">
                    <div class="flex flex-row items-center">
                        <span class="popup_text_redirect" onclick="popup_login()">
                            <span>
                                Login
                            </span>
                        </span>
                    </div>
                    <button class="button_auth" id="button_register">
                        <span>
                            Register
                        </span>
                    </button>
                </div>
            </div>
        `
    Swal.fire({
        title: "Register",
        color: "#000",
        html: html_input,
        background: "#fff",
        showConfirmButton: false,
        showCloseButton: true,
    })

    let button_register = $('#button_register')

    button_register.on('click', function () {

        $(this).attr('disabled', true)

        resetInputStatus()
        resetMessageError()

        let password = $('#password_login').val().trim()
        let login_id = $('#login_id').val().trim()
        let nick_name = $('#nick_name').val().trim()
        let full_name = $('#full_name').val().trim()
        let date_of_birth = $('#date_of_birth').val()
        let gender = $('input[name="gender"]:checked').val()

        data = {
            'login_id': login_id,
            'full_name': full_name,
            'password': password,
            'nick_name': nick_name,
            'date_of_birth': date_of_birth,
            'gender': gender,
        }

        if(validationRegisterUser(data)) {
            $.ajax({
                type: 'POST',
                url: getRegisterRoute(),
                headers: {'X-CSRF-TOKEN': getCSRFToken()},
                data: data,
                success: function (res) {
                    if (!res.result) {
                        button_register.removeAttr('disabled')
                        $(`#${res.data}`).html(res.message)
                    } else {
                        html_input = `
                            <div class="flex flex-col justify-center items-center gap-[16px] login_popup">
                                <span class="font-bold text-[30px]">
                                    ${res.message}
                                </span>
                                <i class="fa-solid fa-envelope fa-beat-fade text-[60px] text-[blue] h-[70px]"></i>
                            </div>
                        `
                        Swal.fire({
                            color: "#000",
                            html: html_input,
                            background: "#fff",
                            showConfirmButton: true,
                        })
                    }
                }
            })
        }
    })
}

function popup_login() {
    let html_input =
        `
            <div class="flex flex-col gap-[8px] login_popup">
                <span class="error_message text-center" id="login_error">
                </span>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="login_id" class="label_input">Email / Nickname</label>
                    <input type='text' placeholder='Email / Nickname' class="input_auth" id="login_id">
                    <span class="error_message" id="email_error">
                    </span>
                </div>
                <div class="flex flex-col w-full gap-[4px]">
                    <label for="password_login" class="label_input">Password</label>
                    <div class="flex flex-row items-center relative">
                        <input type='password' placeholder='Password' class="input_auth input_password" id="password_login">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon_eye" id="show_password" onclick="show_password_action(true)" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon_eye" id="hide_password" onclick="show_password_action(false)" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z"/></svg>
                    </div>
                    <span class="error_message" id="password_error">
                    </span>
                </div>
                <div class="flex flex-row items-center justify-between mt-[16px]">
                    <div class="flex flex-row items-center gap-[8px]">
                        <span class="popup_text_redirect" onclick="popup_forgot_password()">
                            <span>
                                Forgot password
                            </span>
                        </span>
                        <div class="divide_text"></div>
                        <span class="popup_text_redirect" onclick="popup_register()">
                            <span>
                                Register
                            </span>
                        </span>
                    </div>
                    <button class="button_auth" id="button_login">
                        <span>
                            Login
                        </span>
                    </button>
                </div>
            </div>
        `
    Swal.fire({
        title: "Login",
        color: "#000",
        html: html_input,
        background: "#fff",
        showConfirmButton: false,
        showCloseButton: true,
    })

    let button_login = $('#button_login')

    button_login.on('click', function () {

        $(this).attr('disabled', true)

        let password = $('#password_login').val().trim()
        let login_id = $('#login_id').val().trim()

        let email_error_message = $('#email_error')
        let password_error_message = $('#password_error')
        let login_error_message = $('#login_error')

        resetInputStatus()
        resetMessageError()

        if (password && login_id) {
            $.ajax({
                type: 'POST',
                url: getLoginRoute(),
                headers: {'X-CSRF-TOKEN': getCSRFToken()},
                data: {
                    'login_id': login_id,
                    'password': password
                },
                success: function (response) {
                    if (response.result) {
                        if(response.data === 'admin') {
                            location.href = response.message
                        } else {
                            location.reload()
                        }
                    } else {
                        button_login.removeAttr('disabled')
                        login_error_message.html(response.message)
                    }
                }
            })
        } else {

            if (!login_id) {
                email_error_message.html("You must input your email / nickname!")
                setErrorInput($('#login_id'))
            }

            if (!password) {
                password_error_message.html("You must input your password!")
                setErrorInput($('#password_login'))
            }

            button_login.removeAttr('disabled')

        }
    })
}

function validationRegisterUser(data) {
    let validation = true

    if (!data['nick_name']) {
        $('#nick_name_error').html('You must input your nick name!')
        setErrorInput($('#nick_name'), validation)
        validation = false
    }

    if (!data['full_name']) {
        $('#full_name_error').html('You must input your full name!')
        setErrorInput($('#full_name'), validation)
        validation = false
    }

    if (!data['login_id']) {
        $('#email_error').html('You must input your email!')
        setErrorInput($('#login_id'), validation)
        validation = false
    }

    if (!data['password']) {
        $('#password_error').html('You must input your password!')
        setErrorInput($('#password_login'), validation)
        validation = false
    }

    if (!data['date_of_birth']) {
        $('#date_of_birth_error').html('You must choose your date of birth!')
        setErrorInput($('#date_of_birth'), validation)
        validation = false
    }

    if (!data['gender']) {
        $('#gender_error').html('You must choose your gender!')
        validation = false
    }

    if (!validation) {
        $('#button_register').removeAttr('disabled')
    }

    return validation
}

function validationForgotPassword(data) {
    let validation = true

    if (!data['email']) {
        $('#error_email').html('You must input your email!')
        validation = false
    }

    if (!validation) {
        $('#button_send_request_reset_password').removeAttr('disabled');
    }

    return validation
}

function setErrorInput(input, validation) {
    input.addClass('error_input')
    return false
}

function resetInputStatus() {
    $('input').removeClass('error_input')
}

avatar_user.on('click', function () {
    if (modal_user.hasClass('hidden_modal')) {
        modal_user.removeClass('hidden_modal')
    } else {
        modal_user.addClass('hidden_modal')
    }
})

function resetMessageError() {
    $('.error_message').html('')
}

function getGenre() {
    $.ajax({
        type: 'GET',
        url: getGenreRoute(),
        success: function (response) {
            if (response.result) {
                let genre_list = response.data

                let html_header = ''
                let html_footer = ''

                genre_list.forEach(genre => {
                    html_header += `<div> <a href='/manga/genre?id=${genre.id}'> <span> ${genre.genre_name} </span> </a> </div>`

                    html_footer += `<a href='/manga/genre?id=${genre.id}'> <span> ${genre.genre_name} </span> </a>`
                })

                genre_hide.html(html_header)
                footer_tag.html(html_footer)
            }
        }
    })
}

getGenre()

input_search.on('keyup', function (event) {
    let key = event.target.value.trim()

    if (key) {
        $.ajax({
            type: "POST",
            url: getSearchTitleRoute(),
            data: {
                'key': key
            },
            headers: {'X-CSRF-TOKEN': getCSRFToken()},
            success: function (response) {
                if (response.result) {
                    search_result.html(response.data)
                    search_result.css('display', 'block')
                }
            }
        })
    } else {
        search_result.css('display', 'none')
    }
})

$(document).on('click', function (event) {
    let target = $(event.target)
    if (target.attr('id') !== 'input_search') {
        search_result.css('display', 'none')
    }
})
