function unFollow(manga_id, follow_id) {

    let request_unfollow = {
        'follow_id': follow_id
    }

    $.ajax({
        type: 'POST',
        url: getUnfollowRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_unfollow,
        success: function (response) {
            if (response.result) {
                $(`#${manga_id}`).hide()
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
