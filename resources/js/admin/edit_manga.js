let title = $('#title')
let other_name = $('#other_name')
let author = $('#author')
let age_range = $('#age_range')
let manga_status = $('#manga_status')
let description = $('#description')
let upload_image_logo = $('#upload_image_logo')
let upload_image_large = $('#upload_image_large')

let image_logo = ''
let image_large = ''

let button_edit_manga = $('#update_manga')

upload_image_logo.on('change', function (event) {
    const file = this.files[0]
    if(file) {
        let reader = new FileReader()

        reader.onload = function (e) {
            $('.image_logo').attr('src', e.target.result)
            image_logo = e.target.result
        }

        reader.readAsDataURL(file)
    }
})

upload_image_large.on('change', function (event) {
    const file = this.files[0]

    if(file) {
        let reader = new FileReader()

        reader.onload = function (e) {
            $('.image_large').attr('src', e.target.result)
            image_large = e.target.result
        }

        reader.readAsDataURL(file)
    }
})

button_edit_manga.on('click', function () {
    $(this).attr('disabled', true);
    resetError();
    let genre = $('input[name="genre_manga"]:checked')
    let genre_list = []

    genre.each(function () {
        genre_list.push($(this).val())
    })

    let data = {
        'title': title.val().trim(),
        'other_name': other_name.val().trim(),
        'author_id': author.val(),
        'age_range': age_range.val(),
        'description': description.val().trim(),
        'image_large': image_large,
        'image_logo': image_logo,
        'manga_status': manga_status.val(),
        'genre': genre_list,
    }

    let validation = validationData(data)

    if (validation) {
        let params = new URLSearchParams(window.location.search)

        data['id'] = params.get('id')

        $.ajax({
            url: getRouteEditManga(),
            type: "POST",
            headers: {'X-CSRF-TOKEN': getCSRFToken()},
            data: data,
            success: function (response) {
                if (response.result) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => window.location.href = response.data)
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
    } else {
        $(this).removeAttr("disabled")
    }
})

function validationData(data) {
    let validation = true;

    if (!data['title']) {
        title.addClass('error_input')
        validation = false
    }

    if (!data['other_name']) {
        other_name.addClass('error_input')
        validation = false
    }

    if (!data['author_id']) {
        author.addClass('error_input')
        validation = false
    }

    if (!data['age_range']) {
        age_range.addClass('error_input')
        validation = false
    }

    if (!data['manga_status']) {
        manga_status.addClass('error_input')
        validation = false
    }

    if (!data['description']) {
        description.addClass('error_input')
        validation = false
    }

    if (!data['genre'].length) {
        $('#error_genre_select').html('You must choose genre of manga!')
        validation = false
    }

    return validation
}

function resetError() {
    $('input').removeClass('error_input')
    $('image').removeClass('error_input')
    $('.error_message').html('')
    $('textarea').removeClass('error_input')
}
