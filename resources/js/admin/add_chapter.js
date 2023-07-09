let upload_chapter_image = $('#upload_chapter_image')
let button_upload_chapter = $('#button_upload_chapter')
let file = null
let title_chapter = $('#title_chapter')

upload_chapter_image.on('change', function (event) {
    file = this.files[0]
    $('#check_upload').show()
})

button_upload_chapter.on('click', function () {
    if (!file) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: `You must upload your zip file!`,
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        let data = {
            'manga_id': getMangaID(),
            'title_chapter': title_chapter.val().trim()
        }
        $.ajax({
            url: getRouteCreateChapter(),
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
                }
            }
        })
    }
})
