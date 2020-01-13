<?php


namespace App\Models;

use Couchbase\UserSettings;
use Lib\DB;

class Comment
{
    private $id;
    private $adverId;
    private $userId;
    private $comment;
    private $time;

    public function __construct(array $data)
    {
        $this->id = array_key_exists('id', $data) ? $data['id'] : null;
        $this->adverId = array_key_exists('adverId', $data) ? $data['adverId'] : null;
        $this->userId = array_key_exists('userId', $data) ? $data['userId'] : null;
        $this->comment = $data['comment'];
        $this->time = array_key_exists('time', $data) ? $data['time'] : null;
    }

    public static function getCommnet($id) {
        $row = DB::queryOne('SELECT * FROM comments WHERE id=?',[$id]);
        $result = new Comment($row);
        return $result;
    }

    public static function getAllCommentsOfAdvertisement($id)
    {
        $results = [];
        $rows = DB::queryAll('SELECT * FROM comments WHERE adverId=?',[$id]);
        foreach ($rows as $row)
        {
            $comment = new Comment($row);
            $results[] = $comment;
        }
        return $results;
    }

    public function getFull_name()
    {
        $fullname = DB::queryOne('SELECT full_name FROM users WHERE id=?',[$this->userId]);
        return $fullname[0];
    }

    public function add()
    {
        DB::queryOne('INSERT INTO comments(adverId, userId, comment, time ) VALUES (?,?,?,?)',
            [
                $this->adverId,
                $this->userId,
                $this->comment,
                $this->time,
            ]);
    }

    public function delete() {
        DB::queryOne('DELETE FROM comments WHERE id=?',[$this->id]);
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    public function setUserId($id): void
    {
        $this->userId = $id;
    }

    public function setAdverId($id): void
    {
        $this->adverId = $id;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }



}