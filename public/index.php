<?php
    session_start();

    require ('../private/libs/Smarty.class.php');
    require ('../private/model.php');
    require ('../private/controller.php');

    $smarty = new Smarty();
    $smarty->setCompileDir('../private/tmp');
    $smarty->setTemplateDir('../private/views');

    define('ARTICLES_PER_PAGE',3);

    //=============TERNARY OPERATOR
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $pagenubmer = isset($_GET['pagenumber']) ? $_GET['pagenumber'] : '1';
    $searchterm = isset($_GET['searchterm']) ?  '%' . $_GET['searchterm'] . '%' : '%';

    if(isset($_POST['submit_admin_login'])) {
        $page = admin_login_action();
    }

    //========ORDERS FOR CONTROLER
    //+++INFO ORDERS

    if(isset($_POST['submit_edited_info'])) {
       submit_edited_info_action();
       cms_info_action();
        exit();
    }

    if(isset($_POST['submit_cms_info_delete'])) {
        delete_info_article_action();
        cms_info_action();
        exit();
    }

    if(isset($_POST['submit_add_info'])) {
        add_info_to_db_action();
        cms_add_info_action();
        exit();
    }

    //+++EVENT ORDERS

    if(isset($_POST['submit_add_event'])) {
        add_event_to_db_action();
        cms_add_event_action();
        exit();
    }

    if(isset($_POST['submit_edit_event'])) {
        submit_edited_event_to_db_action();
        cms_music_action();
        exit();
    }

    if(isset($_POST['submit_cms_event_delete'])) {
        delete_event_action();
        cms_music_action();
        exit();
    }

    //+++SONG ORDERS
    if(isset($_POST['submit_add_song'])) {
         add_song_to_db_action();
        cms_add_song_action();
        exit();
    }

    if(isset($_POST['submit_edit_song'])) {
        submit_edited_song_to_db_action();
        cms_music_action();
        exit();
    }

    if(isset($_POST['submit_cms_song_delete'])) {
        delete_song_action();
        cms_music_action();
        exit();
    }

    //+++NEWS ORDERS

    if (isset($_POST['submit_add_news'])) {
        add_news_action();
        cms_add_news_action();
        exit();
    }

    if (isset($_POST['submit_edit_news'])) {
        edit_news_action();
        cms_action();
        exit();
    }


    //===========PAGES

    if (isset($_SESSION['loggedin'])) {
        switch ($page) {
            case 'cms' : cms_action(); break;
            case 'cms_info': cms_info_action(); break;
            case 'cms_music' : cms_music_action(); break;
            case 'cms_news' : cms_news_action(); break;
            case 'cms_edit_info' : cms_edit_info_action(); break;
            case 'cms_edit_event' : cms_edit_event_action(); break;
            case 'cms_edit_song' : cms_edit_song_action(); break;
            case 'cms_edit_news' : cms_edit_news_action(); break;
            case 'cms_add_info' : cms_add_info_action(); break;
            case 'cms_add_song' : cms_add_song_action(); break;
            case 'cms_add_event' : cms_add_event_action(); break;
            case 'cms_add_news' : cms_add_news_action(); break;
        }
    }
    switch ($page) {
        case 'home': homepage_action(); break;
        case 'news': news_action(); break;
        case 'search': search_action(); break;
        case 'admin' : admin_action(); break;
        case 'no_post'  : no_post_action(); break;
        case 'no_info' : no_info_action(); break;
        case 'no_fetch' : no_fetch_action(); break;
        case 'info' : info_action(); break;
        case 'swing' : swing_action(); break;
        case 'rock' : rock_action(); break;
        case 'retro' : retro_action(); break;

    }

