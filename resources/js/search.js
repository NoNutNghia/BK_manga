let hide_search = $('#hide_search')
let show_search = $('#show_search')
let advanced_area = $('.advanced_area')
let reset_button = $('#reset_button')
let genre_checkbox = $('#genre_checkbox')
let select_status = $('#select_status')

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
