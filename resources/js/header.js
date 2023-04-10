let genre = $('#genre')
let ranking = $('#ranking')
let genre_hide = $('#genre_hide')
let ranking_hide = $('#ranking_hide')

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
