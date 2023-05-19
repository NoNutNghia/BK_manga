let select_chapter = $('.select_chapter')

select_chapter.on('change', function () {
    window.location = $(this).val()
})
