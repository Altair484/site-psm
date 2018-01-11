<?php

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

add_action( 'add_meta_boxes', 'emoji_metabox' );
function emoji_metabox(){
    add_meta_box( 'my-meta-box-id', 'Envie d\'ajouter des Emojis à votre article? 😏 ', 'emoji_metabox_link', 'post', 'normal', 'high' );}

function emoji_metabox_link(){
    echo ('<a href="https://getemoji.com/" target="_blank">Faites des copier coller depuis ce site</a>');
}