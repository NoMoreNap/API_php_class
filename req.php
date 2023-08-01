<?php
require_once 'API.php';
$api = new API();
if(!isset($_GET['mode'])) {
    error('Не передан GET параметр mode',422);
    return;
}

$mode = $_GET['mode'];

switch ($mode) {
    case 'all':
        $api->get_users();
        break;
    case 'byid':
        if(!isset($_GET['id'])) {
            error('Не передан GET параметр ID пользователя',422);
            return;
        }
        $api->get_userPosts($_GET['id']);
        break;
    case 'todos':
        if(!isset($_GET['id'])) {
            error('Не передан GET параметр ID пользователя',422);
            return;
        }
        $api->get_userTodos($_GET['id']);
        break;
    case 'add':
        if(!isset($_POST['userId']) or !isset($_POST['text']) or !isset($_POST['title'])) {
            error('Не передан POST параметр ID пользователя, текст или заголовок поста',422);
            return;
        }
        $api->create_post($_POST['userId'],$_POST['title'], $_POST['text']);
        break;
    case 'edit':
        if(!isset($_POST['userId']) or !isset($_POST['text']) or !isset($_POST['title']) or !isset($_POST['postId'])) {
            if(!isset($_POST['text'])) {
                error('1',422);
                break;
            }
            error('Не передан POST параметр ID пользователя или поста, текст или заголовок',422);
            return;
        }
        $api->edit_post($_POST['postId'],$_POST['userId'],$_POST['title'], $_POST['text']);
        break;
    case 'delete':
        if(!isset($_POST['postId'])) {
            if(!isset($_POST['text'])) {
                error('1',422);
                break;
            }
            error('Не передан POST параметр ID поста',422);
            return;
        }
        $api->delete_post($_POST['postId']);
        break;
}

function error($text, $code) {
    http_response_code($code);
    echo json_encode(array('response' => false, 'text' => $text));
}



