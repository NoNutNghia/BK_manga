function setWidthLabel() {
    let client_screen = $(document).width()
    let width = `calc((${client_screen}px - 24% - 60px) * 14 / 100)`
    $('.label_info').css('width', width)
}

setWidthLabel()

$(window).on('resize', function () {
    setWidthLabel()
})
