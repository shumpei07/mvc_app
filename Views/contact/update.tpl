<!doctype html>
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
            <h2 class="mb-4">更新画面</h2>
            <form action="/contact/update" method="post" class="bg-white p-3 rounded mb-5" >

            <div class="form-group">
                <input type="hidden" class="form-control" name="id"value="{$post['id']}">
            </div>
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
                <div class>
                    <P>上記の内容でよろしいですか？</P>
                </div>
                <button class="btn bg-warning my-2" type="submit" formaction="/contact/cancel">キャンセル</button>
                <button id='send' class="btn bg-warning my-2" type="submit">送信</button>
            </form>
        </div>
    </div>
</body>
</html>
