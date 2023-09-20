<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
     *
     * @param string $name 氏名
     * @param string $kana フリガナ
     * @param int    $tel  電話番号
     * @param string $email メールアドレス
     * @return false|string 'ユーザーID' または メールアドレスが重複している場合はfalseを返却
     */
    public function input(string $name, string $kana, int $tel,string $email, )
    {
        try{
            // 重複アドレスの確認 (メールアドレスが一意のためすでに使用されていた場合はエラーとする)
            $query = 'SELECT COUNT(*) as count FROM contacts WHERE email = :email';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if($result->count != 0){
                // メールアドレス検索の結果重複していた場合はfalseを返却
                return false;
            }
						
            // 重複がない場合は処理を続行
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO users (name, kana, tel, email) VALUES (:name, :kana, :tel, :email)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }

    }
}