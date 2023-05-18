let hide_search = $('#hide_search')
let show_search = $('#show_search')
let advanced_area = $('.advanced_area')
let reset_button = $('#reset_button')
let genre_checkbox = $('#genre_checkbox')
let select_status = $('#select_status')
let search_manga = $('#search_manga')
let filter_result = $('#filter_result')

hide_search.on('click', function () {
    show_search.css('display', 'block')
    hide_search.css('display', 'none')
    advanced_area.css('display', 'none')
})

show_search.on('click', function () {
    show_search.css('display', 'none')
    hide_search.css('display', 'block')
    advanced_area.css('display', 'flex')
})

reset_button.on('click', function () {
    $('input[type=checkbox]').prop('checked',false);
    $('select').prop('selectedIndex', 0)
})

function getAdvance() {
    $.ajax({
        type: "GET",
        url: getAdvanceRoute(),
        success: function (response) {
            if (response.result) {
                let html = ''
                let genre_select = response.data.genre

                genre_select.forEach(genre => {
                    html += `
                        <div class="flex flex-row gap-[4px]">
                            <input type="checkbox" class="w-[17px]" name="genre_select[]" id="" value="${genre.id}">
                            <span> ${genre.genre_name} </span>
                        </div>
                    `
                })

                genre_checkbox.html(html)
                html = ''
                let status_list = response.data.status_manga

                status_list.forEach(status_ele => {
                    html += `
                        <option value="${status_ele.id}"> ${status_ele.status_name} </option>
                    `
                })

                select_status.html(html)

            }
        }
    })
}

getAdvance()

search_manga.on('click', function () {

    let chapter_count = $('#select_number_of_chapter :selected').val()
    let upload_sorting = $('#select_sort_upload :selected').val()
    let manga_status = $('#select_status :selected').val()
    let checked_genre = $('input[type=checkbox]:checked').toArray()
    let genre_list = []

    checked_genre.forEach(element => {
        genre_list.push($(element).val())
    })

    let request_filter = {
        'manga_status': manga_status,
        'chapter_count': chapter_count,
        'upload_sorting': upload_sorting,
        'genre_list': genre_list
    }

    $.ajax({
        type: "POST",
        url: getFilterRoute(),
        headers: {'X-CSRF-TOKEN': getCSRFToken()},
        data: request_filter,
        success: function (response) {
            if (response.result) {
                filter_result.html(response.data)
                hover_description()
            }
        }
    })
})

function hover_description() {
    let description_tooltip = $('.description_tooltip')

    document.addEventListener(
        'mousemove',
        function (e) {
            let client_screen = $(document).width()

            for (let i = description_tooltip.length; i--;) {
                let description_ele = $(description_tooltip[i])
                if (e.pageX >= (client_screen / 2)) {
                    description_ele.css('right', (client_screen - e.pageX) + 'px')
                    description_ele.css('top', e.pageY + 'px')
                    description_ele.css('left', '')
                    description_ele.css('margin-right', '1rem')
                    description_ele.css('margin-left', '')
                } else {
                    description_ele.css('left', e.pageX + 'px')
                    description_ele.css('top', e.pageY + 'px')
                    description_ele.css('right', '')
                    description_ele.css('margin-left', '1rem')
                    description_ele.css('margin-right', '')
                }
            }
        },
        false
    )
}

