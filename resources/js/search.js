let hide_search = $('#hide_search')
let show_search = $('#show_search')
let advanced_area = $('.advanced_area')
let reset_button = $('#reset_button')

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
