<?php
/* Smarty version 4.3.2, created on 2023-09-14 09:30:51
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6502d2cbe562b3_76539564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e922cbbdf1fd4e35380fc1e61d2cc165491caa9' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl',
      1 => 1694683831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6502d2cbe562b3_76539564 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">確認画面</h2>
            <form action="/contact/completion" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
"readonly>
                </div>
                <div class="form-group">
                    <label for="furigana">フリガナ</label>
                    <input type="text" class="form-control" name="kana" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
"readonly>
                </div>
                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" name="tel" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
"readonly>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
"readonly>
                </div>
                
                <div class="form-group">
                    <label for="inquiry">お問い合わせ内容</label>
                    <textarea name="inquiry" class="form-control" name="inquiry" disabled><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['post']->value['inquiry'], ENT_QUOTES, 'UTF-8');?>
</textarea>
                </div>

                <div class>
                    <P>上記の内容でよろしいですか？</P>
                </div>
                <button class="btn bg-warning my-2" type="button" onclick="window.location.href='/contact/input'">キャンセル</button>
                <button class="btn bg-warning my-2">送信</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php }
}
