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
