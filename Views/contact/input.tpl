<!doctype html>
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
                    <input type="text" class="form-control" name="name"value="{$post['name']|default:''}">
                    <p class="error-text-name">{$errorMessages['name']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="furigana">フリガナ</label>
                    <input type="text" class="form-control" name="kana" value="{$post['kana']|default:''}">
                    <p class="error-text-kana">{$errorMessages['kana']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="tel">電話番号</label>
                    <input type="tel" class="form-control" name="tel" value="{$post['tel']|default:''}">
                    <p class="error-text-tel">{$errorMessages['tel']|default:''}</p>
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control"  name="email"  value="{$post['email']|default:''}">
                    <p class="error-text-email">{$errorMessages['email']|default:''}</p>
                </div>
                
                <div class="form-group">
                    <label for="body">お問い合わせ内容</label>
                    <textarea name="body" class="form-control" value="{$post['body']|default:''}" style="white-space: pre-wrap;">{$post['body']|default:''}</textarea>
                    <p class="error-text-body">{$errorMessages['body']|default:''}</p>
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
            {foreach  $result as $row}
            <tr>
                <td>{$row['name']}</td>
                <td>{$row['kana']}</td>
                <td>{$row['tel']}</td>
                <td>{$row['email']}</td>
                <td style="white-space: pre-wrap;">{$row['body']}</td>
                <td>                   
                   <form method="post" action="/contact/update">
                       <button class="update_id" type="submit" name="update_id" value="{$row['id']}">編集</button>
                   </form>
               </td>
               <td>
                   <form method="post" action="/contact/delete">
                       <button type="submit" name= "delete_id" class="delete-button" onclick="return confirm('本当に削除しますか?')" value="{$row['id']}">削除</button>
                   </form>
               </td>
            </tr>
            {/foreach} 
    </table>
    
    <!-- <script src="../js/validate.js"></script> -->
</body>
</html>