<?php

// get newest rates	
$url = 'http://docs.ookcash.com/api/get_tag_posts/';
$fields = array(
    'slug' => API_POST_HOMEPAGE
);
$tags = json_decode(curl_get($url, $fields));
$posts = array();
foreach ($tags->posts as $post) {
    $data = array(
        'href' => $post->url,
        'title' => $post->title,
        'content' => substr(strip_tags($post->content), 0, 175),
        'thumbnail' => $post->thumbnail,
    );
    $posts[] = $data;
}

$post_info_url = 'http://docs.ookcash.com/api/get_page/';
$post_info_fields = array(
    'slug' => API_POST_BANNER
);
$post_info_object = json_decode(curl_get($post_info_url, $post_info_fields));
$post_info = array(
    'href' => $post_info_object->page->url,
    'title' => $post_info_object->page->title,
    'content' => $post_info_object->page->content,
);

$smarty->assign('posts', $posts);
$smarty->assign('post_info', $post_info);
$_html_main_content = $smarty->fetch('home/index.html');
?>