<?php
require ('db_define.php');
function make_connection() {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DB);
    if ($mysqli->connect_errno) {
        die('Connection error: ' . $mysqli->connect_errno . '<br>');
    }
    return $mysqli;
}

function get_articles() {
    $mysqli = make_connection();
    $query = "SELECT title FROM news_articles";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 1');
    $stmt->bind_result($title) or die ('Error binding results 1');
    $stmt->execute() or die ('Error executing 1');
    $results = array();
    while ($stmt->fetch()) {
        $results[] = $title;
    }
    return $results;
}

function get_some_articles() {
    global $pagenubmer, $searchterm;
    $number_of_pages = get_pages() or die ('Error getting pages');
    $mysqli = make_connection();
    $firstrow = ($pagenubmer - 1) * ARTICLES_PER_PAGE;
    $number_per_page = ARTICLES_PER_PAGE;

    $query =   "SELECT title, content,  imagelink, article_id 
                FROM news_articles 
                WHERE title LIKE ? 
                OR content LIKE ?
                ORDER BY article_id 
                DESC LIMIT $firstrow,$number_per_page";

    $stmt = $mysqli->prepare($query) or die ('Error querying 1');
    $stmt->bind_param('ss', $searchterm, $searchterm) or die ("Error binidng searchterm");
    $stmt->bind_result($title, $content, $imagelink, $article_id) or die ("Error bindind results 2");
    $stmt->execute() or die ('Error executing 2');
    $results = array();
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $title;
        $article[] = $content;
        $article[] = $imagelink;
        $article[] = $article_id;
        $results[] = $article;
    }
    return $results;
}

function get_pages() {
    $mysqli = make_connection();
    $query = "SELECT * FROM news_articles";
    $result = $mysqli->query($query) or die ('Error querying 2');
    $rows = $result->num_rows;
    $number_of_pages = ceil($rows / ARTICLES_PER_PAGE);
    return $number_of_pages;
}

function  get_number_of_pages() {
    $number_of_pages = get_pages() or die ('Error getting pages');
    return $number_of_pages;
}

//=======================================INFO==============================================

function get_info() {
    $mysqli = make_connection();
    $query = "SELECT info_content_id, title, content FROM info_content ORDER BY info_content_id DESC";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting info');
    $stmt->bind_result($id, $title, $content) or die ('Error binding getting info');
    $stmt->execute() or die ('Error executing getting info');
    $results = array();
    while ($stmt->fetch()) {
        $info_contents = array();
        $info_contents[] = $id;
        $info_contents[] = $title;
        $info_contents[] = $content;
        $results[] = $info_contents;
    }
    return $results;
}

//Function looks if id in $_GET is the same as array index 0 and gives the array back.
function select_info_array_to_edit ($id) {
    $mysqli = make_connection();
    $query = "SELECT info_content_id, title, content FROM info_content WHERE info_content_id = '$id'";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting info to edit');
    $stmt->bind_result($id, $title, $content) or die ('Error binding getting info');
    $stmt->execute() or die ('Error executing getting info to edit');
    $results = array();
    while ($stmt->fetch()) {
        $info_contents = array();
        $info_contents_to_edit[] = $id;
        $info_contents_to_edit[] = $title;
        $info_contents_to_edit[] = $content;
        $results = $info_contents_to_edit;
    }
    return $results;
}

function edit_db_for_info_content(){

    $id = $_POST['info_edit_id'];
    $info_title = $_POST['info_title'];
    $info_content = $_POST['info_content'];

    if (empty($_POST['info_title']) OR empty ($_POST['info_content'])) {
        return exit('Input field are empty');
    }

    $mysqli = make_connection();
    $query = "UPDATE info_content SET title = ?, content = ? WHERE info_content_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error preparing for edit');
    $stmt->bind_param('ss', $info_title, $info_content) or die ('Error binding params for edit info');
    //$stmt->bind_result($info_content ) or die ('Error binding for edit info');
    $stmt->execute() or die ('Error executing edit for info');
}

function delete_info_article () {

    if (empty($_POST['info_delete_check'])) {

    } else {
        $mysqli = make_connection();
        $id = $_POST['delete_id'];
        $query = "DELETE FROM info_content WHERE info_content_id = $id";
        $stmt = $mysqli->prepare($query) or die ('Error preparing for delete');
        $stmt->execute() or die ('Error executing delete for info');
    }
}

function  add_info_to_db () {
    $id = 0;
    $addtitle = $_POST['add_info_title'];
    $addcontent = $_POST['add_info_content'];

    if (empty($_POST['add_info_title']) OR empty ($_POST['add_info_content'])) {
        return exit('Input fields are empty');
    }

    $mysqli = make_connection();
    $query = "INSERT INTO info_content VALUES (?,?,?)";
    $stmt = $mysqli->prepare($query) or die ('Error preparing adding info');
    $stmt->bind_param('iss', $id, $addtitle, $addcontent) or die ('Error binding params for add content');
    $stmt->execute() or die ('Error executing adding content');

}

//=======================================MUSIC=============================================

function add_event_to_db () {
    /*1*/ $id = 0;
    /*2*/ $event_kind = $_POST['event_kind'];
    /*3*/ $event_name = $_POST['event_name'];
    /*4*/ $event_location = $_POST['event_location'];
    /*5*/ $event_day = $_POST['event_day'];
    /*6*/ $event_month = $_POST['event_month'];
    /*7*/ $event_year = $_POST['event_year'];
    /*8*/ $event_ticket = $_POST['event_ticket'];
    /*9*/ $event_info = $_POST['event_info'];

    if (empty($_POST['event_name']) OR empty ($_POST['event_location']) OR empty ($_POST['event_ticket']) OR empty ($_POST['event_info'])) {
        return exit('Input fields are empty');
    }

    $mysqli = make_connection();       /*1 2 3 4 5 6 7 8 9 */
    $query = "INSERT INTO events VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query) or die ('Error preparing adding event');
    $stmt->bind_param('isssiiiss',    /*1*/ $id,
                           /*123456789*/    /*2*/ $event_kind,
                                            /*3*/ $event_name,
                                            /*4*/ $event_location,
                                            /*5*/ $event_day,
                                            /*6*/ $event_month,
                                            /*7*/ $event_year,
                                            /*8*/ $event_ticket,
                                            /*9*/ $event_info) or die ('Error binding params for add event');
    $stmt->execute();
}

function get_events() {
    $mysqli = make_connection();
    $query = "SELECT  event_id, 
                      event_kind, 
                      event_name, 
                      event_location, 
                      event_day, 
                      event_month, 
                      event_year, 
                      ticket_price, 
                      event_info 
                      FROM events ORDER BY 
                      event_year ASC , 
                      event_month ASC, 
                      event_day ASC";

    $stmt = $mysqli->prepare($query) or die ('Error getting events');
    $stmt->bind_result( $id,
                        $event_kind,
                        $event_name,
                        $event_location,
                        $event_day,
                        $event_month,
                        $event_year,
                        $event_ticket,
                        $event_info) or die ('Error binding getting events');

    $stmt->execute() or die ('Error executing getting events');
    $results = array();
    while ($stmt->fetch()) {
        $event = array();
        /*0*/ $event[] = $id;
        /*1*/ $event[] = $event_kind;
        /*2*/ $event[] = $event_name;
        /*3*/ $event[] = $event_location;
        /*4*/ $event[] = $event_day;
        /*5*/ $event[] = $event_month;
        /*6*/ $event[] = $event_year;
        /*7*/ $event[] = $event_ticket;
        /*8*/ $event[] = $event_info;
              $results[] = $event;
    }
    return $results;
}

function select_event_array_to_edit($id) {
    $mysqli = make_connection();
    $query = "SELECT * FROM events WHERE event_id = '$id'";
    $stmt = $mysqli->prepare($query) or die ('Error preapring getting events to edit');
    $stmt->bind_result( $id,
                        $event_kind,
                        $event_name,
                        $event_location,
                        $event_day,
                        $event_month,
                        $event_year,
                        $event_ticket,
                        $event_info) or die ('Error binding params for add event');
    $stmt->execute() or die ('Error executing getting events to edit');
    $results = array();
    while ($stmt->fetch()) {
        $events_to_edit = array();
        /*0*/ $events_to_edit[] = $id;
        /*1*/ $events_to_edit[] = $event_kind;
        /*2*/ $events_to_edit[] = $event_name;
        /*3*/ $events_to_edit[] = $event_location;
        /*4*/ $events_to_edit[] = $event_day;
        /*5*/ $events_to_edit[] = $event_month;
        /*6*/ $events_to_edit[] = $event_year;
        /*7*/ $events_to_edit[] = $event_ticket;
        /*8*/ $events_to_edit[] = $event_info;
        $results = $events_to_edit;
    }
    return $results;
}

function submit_edited_event_to_db () {
    /*1*/ $id = $_POST['event_edit_id'];
    /*2*/ $event_kind = $_POST['edit_event_kind'];
    /*3*/ $event_name = $_POST['edit_event_name'];
    /*4*/ $event_location = $_POST['edit_event_location'];
    /*5*/ $event_day = $_POST['edit_event_day'];
    /*6*/ $event_month = $_POST['edit_event_month'];
    /*7*/ $event_year = $_POST['edit_event_year'];
    /*8*/ $event_ticket = $_POST['edit_event_ticket'];
    /*9*/ $event_info = $_POST['edit_event_info'];

    if (empty($_POST['edit_event_name']) OR empty ($_POST['edit_event_location']) OR empty ($_POST['edit_event_ticket']) OR empty ($_POST['edit_event_info'])) {
        return exit('Input fields are empty');
    }

    $mysqli = make_connection();
    $query = "UPDATE events SET event_kind = ?,  
                                event_name = ?, 
                                event_location = ?,   
                                event_day = ?, 
                                event_month = ?, 
                                event_year = ?, 
                                ticket_price = ?, 
                                event_info = ? 
                                WHERE event_id = $id"; //ADD LIKE BELOW
    $stmt = $mysqli->prepare($query) or die ('Error prepparing events for edit');
    $stmt->bind_param('sssiiiss',
                           /*12345678*/     /*1*/ $event_kind,
                                            /*2*/ $event_name,
                                            /*3*/ $event_location,
                                            /*4*/ $event_day,
                                            /*5*/ $event_month,
                                            /*6*/ $event_year,
                                            /*7*/ $event_ticket,
                                            /*8*/ $event_info) or die ('Error binding params for edit event');
    $stmt->execute() or die ('Error executing edit for events');
}

function delete_event() {

    if (empty($_POST['event_delete_check'])) {

    } else {
        $mysqli = make_connection();
        $id = $_POST['event_delete_id'];
        $query = "DELETE FROM events WHERE event_id = $id";
        $stmt = $mysqli->prepare($query) or die ('Error prepering for event delete');
        $stmt->execute() or die ('Error executing delete for info');
    }

}

//=======================================SONGS=============================================

function add_song_to_db () {
    /*1*/ $id = 0;
    /*2*/ $song_kind = $_POST['song_kind'];
    /*3*/ $song_name = $_POST['song_name'];
    /*4*/ $song_info = $_POST['song_info'];
    /*5*/ $song_autor = $_POST['song_autor'];
    /*6*/ $song_link = $_POST['song_link'];

    if (empty($_POST['song_name']) OR empty($_POST['song_info']) OR empty($_POST['song_autor'])OR empty($_POST['song_link'])) {
        return exit('Input fields are empty');
    }
    $mysqli = make_connection();      /*1 2 3 4 5 6*/
    $query = "INSERT INTO music VALUES (?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query) or die ('Error preparing adding song');
    $stmt->bind_param('isssss', $id, $song_kind, $song_name, $song_info, $song_autor, $song_link);
    $stmt->execute() or die ('Error execuring ading songs');
}

function get_songs() {
    $mysqli = make_connection();
    $query = "SELECT * FROM music ORDER BY song_id DESC";
    $stmt = $mysqli->prepare($query) or die ('Error getting songs');
    $stmt->bind_result($id, $song_kind, $song_name, $song_info, $song_autor, $song_link) or die ('Error binding getting songs');
    $stmt->execute() or die ('Error executing getting songs');
    $results = array();
    while ($stmt->fetch()) {
        $song = array();
        $song[] = $id;
        $song[] = $song_kind;
        $song[] = $song_name;
        $song[] = $song_info;
        $song[] = $song_autor;
        $song[] = $song_link;
        $results[] = $song;
    }
    return $results;
}

function select_song_array_to_edit($id) {
    $mysqli = make_connection();
    $query = "SELECT * FROM music WHERE song_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting events to edit');
    $stmt->bind_result( $id, $song_kind, $song_name, $song_info, $song_autor, $song_link) or die ('Error binding params for edit');
    $stmt->execute() or die ('Error executing getting events to edit');
    $results = array();
    while ($stmt->fetch()) {
        $songs_to_edit = array();
        $songs_to_edit[] = $id;
        $songs_to_edit[] = $song_kind;
        $songs_to_edit[] = $song_name;
        $songs_to_edit[] = $song_info;
        $songs_to_edit[] = $song_autor;
        $songs_to_edit[] = $song_link;
        $results = $songs_to_edit;
    }
    return $results;
}

function submit_edited_song_to_db() {
    /*1*/ $id = $_POST['song_edit_id'];
    /*2*/ $song_kind = $_POST['edit_song_kind'];
    /*3*/ $song_name = $_POST['edit_song_name'];
    /*4*/ $song_info = $_POST['edit_song_info'];
    /*5*/ $song_autor = $_POST['edit_song_autor'];
    /*6*/ $song_link = $_POST['edit_song_link'];

    if (empty($_POST['edit_song_name']) OR empty($_POST['edit_song_info']) OR empty($_POST['edit_song_autor'])OR empty($_POST['edit_song_link'])) {
        return exit('Input fields are empty');
    }

    $mysqli = make_connection();
    $query = "UPDATE music SET song_kind = ?, song_name = ?, song_info = ?, song_autor = ?, song_yt_link = ? WHERE song_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error prepering update songs');
    $stmt->bind_param('sssss', $song_kind, $song_name, $song_info, $song_autor, $song_link) or die ('Error binding params for song update');
    $stmt->execute() or die ('Error executing edit for songs');
}

function delete_song() {

    if (empty($_POST['song_delete_check'])) {

    } else {
        $mysqli = make_connection();
        $id = $_POST['song_delete_id'];
        $query = "DELETE FROM music WHERE song_id = $id";
        $stmt = $mysqli->prepare($query) or die ('Error prepering for song delete');
        $stmt->execute() or die ('Error executing song for info');
    }

}

//=======================================NEWS==============================================

function add_news () {
    $id = 0;
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];
    $news_link = $_POST['news_link'];

    if (empty($_POST['news_title']) OR empty($_POST['news_content'])) {
        return exit('Input fields are empty');
    }

    if (empty($_POST['news_link'])) {
        $news_link = '';
    }

    $mysqli = make_connection();
    $query = "INSERT INTO news_articles VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($query) or die('Error preparing adding news');
    $stmt->bind_param( 'isss', $id, $news_title, $news_content, $news_link);
    $stmt->execute();
}

function select_news_to_edit($id) {
    $mysqli = make_connection();
    $query = "SELECT * FROM news_articles WHERE article_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting news to edit');
    $stmt->bind_result($id, $news_title, $news_content, $news_link);
    $stmt->execute() or die ('Error executing getting news to edit');
    $results = array();
    while ($stmt->fetch()) {
        $news_to_edit = array();
        $news_to_edit[] = $id;
        $news_to_edit[] = $news_title;
        $news_to_edit[] = $news_content;
        $news_to_edit[] = $news_link;
        $results = $news_to_edit;
    }
     return $results;
}

function edit_news() {
    $id = $_POST['news_edit_id'];
    $news_title = $_POST['edit_news_title'];
    $news_content = $_POST['edit_news_content'];
    $news_link = $_POST['edit_news_link'];

    if (empty($_POST['edit_news_title']) OR empty($_POST['edit_news_content'])) {
        return exit('Input fields are empty');
    }

    if (empty($_POST['edit_news_link'])) {
        $news_link = '';
    }

    $mysqli = make_connection();
    $query = "UPDATE news_articles SET title = ?, content = ?, imagelink = ? WHERE article_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error preparing update news');
    $stmt->bind_param('sss', $news_title, $news_content, $news_link) or die ('Error binigng params for news udate');
    $stmt->execute();

}


//=======================================LOGIN=============================================

function admin_login() {
    if (!isset($_POST['submit_admin_login'])) {
       return 'no_post';
       exit();
    }

    if (empty($_POST['username']) OR empty($_POST['password'])) {
       return 'no_info';
        exit();
    }

    $mysqli = make_connection();
    $query = "SELECT admin_id FROM admin WHERE admin_name = ? AND admin_password = ?";
    $stmt = $mysqli->prepare($query) or die ('Error preparing 2');
    $stmt->bind_param('ss', $username, $password) or die ('Error binding params 1');
    $stmt->bind_result($admin_id) or die ('Error binding results 3');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt->execute() or die ('Error executing 3');
    $fetch_success = $stmt->fetch();

    if (!$fetch_success) {
        return 'no_fetch';
        exit();
    }

    $_SESSION['loggedin'] = 'loggedin';
    setcookie('admin_id', $admin_id, time() + 3600);
    return 'cms';
    exit();
}

function admin_cookie() {
    if (!isset($_COOKIE['admin_id'])) {
        admin_action(); ///TO CHANGE
    }
}

//========================================RETRO-MUSIC=================================================

function get_music ($kind) {
    $mysqli = make_connection();
    $query = "SELECT * FROM music WHERE song_kind LIKE '$kind'";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting retro');
    $stmt->bind_result($song_id, $song_kind, $song_name, $song_info, $song_autor, $song_yt_link);
    $stmt->execute() or die ('Error executing getting retro');
    $results = array();
    while ($stmt->fetch()) {
        $retro = array();
        $retro[] = $song_id;
        $retro[] = $song_kind;
        $retro[] = $song_name;
        $retro[] = $song_info;
        $retro[] = $song_autor;
        $retro[] = $song_yt_link;
        $results[] = $retro;
    }
    return $results;

}

function get_festivals($kind) {
    $mysqli = make_connection();
    $query = "SELECT * FROM events WHERE event_kind LIKE '$kind'";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting festivals');
    $stmt->bind_result($event_id, $event_kind, $event_name, $event_location, $event_day, $event_month, $event_year, $ticker_price, $event_info) or die ('Error binidng festivals');
    $stmt->execute() or die ('Error executing getting festivals');
    $results = array();
    while ($stmt->fetch()) {
        $festival = array();
        $festival[] = $event_id ;
        $festival[] = $event_kind;
        $festival[] = $event_name;
        $festival[] = $event_location;
        $festival[] = $event_day;
        $festival[] = $event_month;
        $festival[] = $event_year;
        $festival[] = $ticker_price;
        $festival[] = $event_info;
        $results[] = $festival;
    }
    return $results;
}

/*function select_news_to_edit($id) {
    $mysqli = make_connection();
    $query = "SELECT * FROM news_articles WHERE article_id = $id";
    $stmt = $mysqli->prepare($query) or die ('Error preparing getting news to edit');
    $stmt->bind_result($id, $news_title, $news_content, $news_link);
    $stmt->execute() or die ('Error executing getting news to edit');
    $results = array();
    while ($stmt->fetch()) {
        $news_to_edit = array();
        $news_to_edit[] = $id;
        $news_to_edit[] = $news_title;
        $news_to_edit[] = $news_content;
        $news_to_edit[] = $news_link;
        $results = $news_to_edit;
    }
    return $results;
}*/











