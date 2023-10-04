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
     * @param string $inquiry
     * 
     */
    public function save(string $name, string $kana, int $tel,string $email, string $inquiry)
    {
	try{
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :inquiry)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':inquiry',$inquiry, PDO::PARAM_STR);
            $stmt->execute();
            $lastId = $this->dbh->lastInsertId();
            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();
            return $lastId;

        }catch(PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            ($e);
            exit();
        }
    }

    public function read()
    {
        try {
            $query = 'SELECT * FROM contacts';
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "取得失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function update($id)
{
    try {
        $query = 'SELECT * FROM contacts WHERE id = :id';
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // :id プレースホルダに $id の値をバインド
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "取得失敗: " . $e->getMessage() . "\n";
        exit();
    }
}

    /**
         * お問い合わせIDに対応するお問いあわせのデータをテーブルから削除する
         * @param string $id contactID
         * @return void
         */
        public function delete(string $id)
        {
            try{
                $this->dbh->beginTransaction();
                $query = 'DELETE FROM contacts WHERE id = :id';
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $this->dbh->commit();
                return;

            } catch (PDOException $e) {
                // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
                $this->dbh->rollBack();
                echo "削除失敗: " . $e->getMessage() . "\n";
                exit();
            }
        }


}
