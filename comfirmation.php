<?php
require_once('smarty/libs/Smarty.class.php');

$smarty = new Smarty;

// 入力データを取得
$post = $_POST;

// Smartyにデータを割り当て
$smarty->assign('post', $post);

// 確認画面のテンプレートを表示
$smarty->display('confirmation.tpl');
?>