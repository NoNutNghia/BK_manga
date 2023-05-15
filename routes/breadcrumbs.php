<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('main', function ($trail) {
    $trail->push('Home', route('main'));
});

Breadcrumbs::for('manga', function ($trail, $manga) {
    $trail->parent('main');
    $trail->push($manga->title, route('detail', ['id' => $manga->manga_id]));
});

Breadcrumbs::for('chapter', function ($trail, $chapter, $manga) {
    $trail->parent('manga', $manga);
    $trail->push($chapter->title, route('chapter', ['id' => $chapter->chapter_id]));
});
