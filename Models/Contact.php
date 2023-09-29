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

    // /**
    // * お問い合わせ情報を取得して返却する
    // * @param string $id お問い合わせID
    // * @return stdClass object型で取得したお問い合わせのデータを返却する
    // */
    // public function read(string $id): stdClass
    // {
    //     try{
    //       $query = 'SELECT * FROM contacts WHERE id = :id';
    //       $stmt = $this->dbh->prepare($query);
    //       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //       $stmt->execute();
    //       return $stmt->fetch(PDO::FETCH_OBJ);
    //     } catch (PDOException $e) {
    //       echo $e->getMessage(). "\n";
    //       exit();
    //       }
    // }
    
    // /**
    //  * お問い合わせ情報を取得する
    //  * @param string $id 更新対象のユーザーID
    //  * @param string $name 氏名
    //  * @param string $kana ふりがな
    //  * @param string $email メールアドレス
    //  * @param string|null $password パスワード
    //  * @return bool メールアドレス重複時は更新処理をせずfalseを返却する
    //  */
    // public function edit(string $id, string $name, string $kana, int $tel, string $email, string $inquiry)
    // {
    // try{
    //         $query =  ' contacts SET name = :name, kana = :kana, tel = :tel, email = :email, inquiry = :inquiry';
            
    //         $query .= ' WHERE id = :id';
    //         $stmt = $this->dbh->prepare($query);
    //         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //         $stmt->bindParam(':name', $name);
    //         $stmt->bindParam(':kana', $kana);
    //         $stmt->bindParam(':email', $email);
    //         if(!empty($password)) {
    //                             $hash = password_hash($password, PASSWORD_BCRYPT);
    //             $stmt->bindParam(':password', $hash);
    //         }
    //         $stmt->execute();
    //         // トランザクションを完了することでデータの書き込みを確定させる
    //         $this->dbh->commit();
    //         return true;

    //     } catch (PDOException $e) {
    //         // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
    //         $this->dbh->rollBack();
    //         echo "登録失敗: " . $e->getMessage() . "\n";
    //         exit();
    //     }
    // }

}
