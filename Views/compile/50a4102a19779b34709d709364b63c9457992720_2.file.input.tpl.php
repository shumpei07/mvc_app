<?php
/* Smarty version 4.3.2, created on 2023-09-29 06:27:05
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/input.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65166e39f2f9e9_33957317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50a4102a19779b34709d709364b63c9457992720' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/input.tpl',
      1 => 1695968824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65166e39f2f9e9_33957317 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">入力画面</h2>
            <form action="/contact/input" method="post" class="bg-white p-3 rounded mb-5" >

                <div class="form-group">
                    <label for="name">氏名</label>
                    <input type="text" class="form-control" name="name"value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    <p class="error-text-name"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
                <div class="form-group">
                    <label for="furigana">フリガナ</label>
                    <input type="text" class="form-control" name="kana" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    <p class="error-text-kana"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" name="tel" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    <p class="error-text-tel"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email"  value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
">
                    <p class="error-text-email"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
                
                <div class="form-group">
                    <label for="inquiry">お問い合わせ内容</label>
                    <textarea name="inquiry" class="form-control" value="<?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['inquiry'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
" style="white-space: pre-wrap;"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['post']->value['inquiry'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</textarea>
                    <p class="error-text-inquiry"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['inquiry'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                </div>
                <button class="btn bg-warning my-2" type="submit" id ="submit">送信</button>
            </form>
        </div>
    </div>
    <table>
        <tr>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>お問い合わせ内容</th>
        </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
            <tr>
                <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['body'], ENT_QUOTES, 'UTF-8');?>
</td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    </table>
    
    <!-- <?php echo '<script'; ?>
 src="../js/validate.js"><?php echo '</script'; ?>
> -->
</body>
</html><?php }
}
