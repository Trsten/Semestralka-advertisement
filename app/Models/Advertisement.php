<?php


namespace App\Models;

use Couchbase\UserSettings;
use Lib\DB;

class Advertisement
{
    private $id;
    private $userId;

    private $title;
    private $location;
    private $typProperty;
    private $address;
    private $area;
    private $contact;

    private $price;
    private $description;

    public function __construct(array $data)
    {
        $this->id = array_key_exists('id', $data) ? $data['id'] : null;
        $this->userId = array_key_exists('userId', $data) ? $data['userId'] : null;;

        $this->title = $data['title'];
        $this->location = $data['location'];
        $this->typProperty = $data['typProperty'];
        $this->address = $data['address'];
        $this->area = $data['area'];
        $this->contact = $data['contact'];

        $this->price = $data['price'];
        $this->description = $data['description'];
    }

    public static function getAll() : array
    {
        $results = [];

        $rows = DB::queryAll('SELECT * FROM advertisements');

        foreach ($rows as $row)
        {
            $adv = new Advertisement($row);
            $results[] = $adv;
        }

        return $results;
    }

    public static function getUserAdvertisements($userId) {

        $results = [];

        $rows = DB::queryAll('SELECT * FROM advertisements WHERE userId=? ',[$userId]);

        foreach ($rows as $row)
        {
            $adv = new Advertisement($row);
            $results[] = $adv;
        }

        return $results;
    }

    public static function getAdvertisement($userId,$id)
    {
        $row = DB::queryOne('SELECT * FROM advertisements WHERE ( id=? AND userId=?) ',
            [
                $id,
                $userId,
            ]);

        $adv = new Advertisement($row);
        return $adv;
    }

    public static function getAdvertisementById($id)
    {
        $row = DB::queryOne('SELECT * FROM advertisements WHERE id=?  ', [$id]);
        $adv = new Advertisement($row);
        return $adv;
    }

    public function save() {
        DB::queryOne('INSERT INTO advertisements(userId, title, location, typProperty, address, area, contact, price, description) VALUES (?,?,?,?,?,?,?,?,?)', [
            $this->userId,
            $this->title,
            $this->location,
            $this->typProperty,
            $this->address,
            $this->area,
            $this->contact,
            $this->price,
            $this->description,
        ]);
    }

    public function delete()
    {
        DB::queryAll('DELETE FROM comments WHERE adverId=?',[$this->id]);
        DB::queryOne('DELETE FROM advertisements WHERE id=?',[$this->id]);
    }

    public function update()
    {
        $row =DB::queryOne('UPDATE advertisements SET title=?, location=?, typProperty=?, address=?, area=?, contact=?, price=?, description=? WHERE id=?',
            [
                $this->title,
                $this->location,
                $this->typProperty,
                $this->address,
                $this->area,
                $this->contact,
                $this->price,
                $this->description,
                $this->id,
            ]);
    }

    public function getUsername() {

        $row = DB::queryOne("SELECT username FROM users WHERE id=?",[$this->userId]);

        return $row['username'];
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getTypProperty()
    {
        return $this->typProperty;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed|null $userId
     */
    public function setUserId( $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function setAttributes(array $data)
    {
        $this->title = (empty($data['title']) ? $this->title : $data['title'] );
        $this->location = (empty($data['location']) ? $this->location : $data['location'] );
        $this->typProperty = (empty($data['typProperty']) ? $this->typProperty : $data['typProperty'] );
        $this->address = (empty($data['address']) ? $this->address : $data['address'] );
        $this->area = (empty($data['area']) ? $this->area : $data['area'] );
        $this->contact = (empty($data['contact']) ? $this->contact : $data['contact'] );

        $this->price = (empty($data['price']) ? $this->price : $data['price'] );
        $this->description = (empty($data['description']) ? $this->description : $data['description'] );
    }
}