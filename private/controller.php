<?php

//===================================NAV BAR ACTIONS

function homepage_action() {
    //MODEL
    global $smarty;
//    $articles = get_articles();
//    $smarty->assign('articles',$articles);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('home.tpl');
    $smarty->display('footer.tpl');
}

function page_not_found_action() {
    global $smarty;
    $smarty->display('notfound.tpl');
}

function news_action() {
    global $smarty;
    global $pagenubmer;
    //MODEL
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pagenubmer);
    $smarty->assign('number_of_pages', $number_of_pages);
    $smarty->assign('articles',$articles);
    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('news.tpl');
    $smarty->display('footer.tpl');
}

function search_action() {
    global $smarty, $pagenubmer, $searchterm;
    //MODEL
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pagenubmer);
    $smarty->assign('number_of_pages', $number_of_pages);
    $smarty->assign('articles',$articles);
    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('search.tpl');
    $smarty->display('footer.tpl');
}

function info_action() {
    global $smarty;
    //MODEL
        $info_contents = get_info();
        $smarty->assign('info_contents', $info_contents);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('info.tpl');
    $smarty->display('footer.tpl');
}

function swing_action() {
    global $smarty;
    //MODEL
    $kind = 'swing';
    $swing_songs = get_music($kind);
    $smarty->assign('songs', $swing_songs);

    $swing_events = get_festivals($kind);
    $smarty->assign('events', $swing_events);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('swing.tpl');
    $smarty->display('footer.tpl');
}

function rock_action() {
    global $smarty;
    //MODEL
    $kind = 'swing';
    $rock_songs = get_music($kind);
    $smarty->assign('songs', $rock_songs);

    $rock_events = get_festivals($kind);
    $smarty->assign('events', $rock_events);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('rock.tpl');
    $smarty->display('footer.tpl');
}

function retro_action() {
    global $smarty;
    //MODEL
    $kind = 'retro';
    $retro_songs = get_music($kind);
    $smarty->assign('songs', $retro_songs);

    $retro_events = get_festivals($kind);
    $smarty->assign('events', $retro_events);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('navbar.tpl');
    $smarty->display('retro.tpl');
    $smarty->display('footer.tpl');
}

//===========================================CMS LOGIN PAGES

function admin_action() {
    global $smarty;
    //MODEL
    $smarty->display('header.tpl');
    $smarty->display('admin.tpl');
    $smarty->display('footer.tpl');
    //VIEWS
}

function cms_action() {
    global $smarty;

    //MODEL
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('footer.tpl');
    //VIEWS
}

function no_post_action() {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('admin.tpl');
    $smarty->display('footer.tpl');
}

function no_info_action() {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('admin.tpl');
    $smarty->display('no_info.tpl');
    $smarty->display('footer.tpl');
}

function no_fetch_action() {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('admin.tpl');
    $smarty->display('no_fetch.tpl');
    $smarty->display('footer.tpl');
}

//===========================================CMS PAGES

//+++++++++++++NEWS

function cms_news_action() {
    global $smarty;
    global $pagenubmer;
    //MODEL
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pagenubmer);
    $smarty->assign('number_of_pages', $number_of_pages);
    $smarty->assign('articles', $articles);


    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_news.tpl');
    $smarty->display('footer.tpl');
}

function cms_add_news_action() {
    global $smarty;
    //MODAL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_add_news.tpl');
    $smarty->display('footer.tpl');
}

function cms_edit_news_action() {
    global $smarty;
    //MODAL

    $id = $_GET['id'];
    $news_to_edit = select_news_to_edit($id);
    $smarty->assign('edit_news', $news_to_edit);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_edit_news.tpl');
    $smarty->display('footer.tpl');
}

//+++++++++++MUSIC

function cms_music_action() {
    global $smarty;
    //MODEL
    $events = get_events();
    $smarty->assign('events', $events);
    $songs = get_songs();
    $smarty->assign('songs', $songs);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_music.tpl');
    $smarty->display('footer.tpl');
}

function cms_add_song_action() {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_add_song.tpl');
    $smarty->display('footer.tpl');
}

function cms_add_event_action()  {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_add_event.tpl');
    $smarty->display('footer.tpl');
}

function cms_edit_event_action() {
    global $smarty;
    //MODEL
    $id = $_GET['id'];
    $event_to_edit = select_event_array_to_edit($id);
    $smarty->assign('edit_event', $event_to_edit);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_edit_event.tpl');
    $smarty->display('footer.tpl');
}

function cms_edit_song_action() {
    global $smarty;
    //MODEL
    $id = $_GET['id'];
    $song_to_edit = select_song_array_to_edit($id);
    $smarty->assign('edit_song', $song_to_edit);

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_edit_song.tpl');
    $smarty->display('footer.tpl');
}

//+++++++++++INFO

function cms_info_action() {
    global $smarty;
    //MODEL
    $info_contents = get_info();
    $smarty->assign('info_contents', $info_contents);


    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_info.tpl');
    $smarty->display('footer.tpl');
}

function cms_edit_info_action() {
    global $smarty;
    //MODEL

    $id = $_GET['id'];
    $content_to_edit = select_info_array_to_edit($id);
    $smarty->assign('edit', $content_to_edit);


    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_edit_info.tpl');
    $smarty->display('footer.tpl');

}

function cms_add_info_action() {
    global $smarty;
    //MODEL

    //VIEWS
    $smarty->display('header.tpl');
    $smarty->display('cms.tpl');
    $smarty->display('cms_add_info.tpl');
    $smarty->display('footer.tpl');
}

//================================MIDDLE-MAN ACTIONS
function admin_login_action() {
    return admin_login();
}

//+++INFO MIDDLEMAN

function submit_edited_info_action() {
    edit_db_for_info_content();
}

function delete_info_article_action () {
    delete_info_article();
}

function add_info_to_db_action () {
    add_info_to_db();
}

//+++EVENT MIDDLEMAN

function add_event_to_db_action () {
    add_event_to_db();
}

function submit_edited_event_to_db_action () {
    submit_edited_event_to_db();
}

function delete_event_action() {
    delete_event();
}

//+++SONG MIDDLEMAN

function add_song_to_db_action() {
    add_song_to_db();
}

function submit_edited_song_to_db_action() {
    submit_edited_song_to_db();
}

function delete_song_action() {
    delete_song();
}

//+++NEWS MIDDLE MAN

function add_news_action() {
    add_news();
}

function edit_news_action() {
    edit_news();
}