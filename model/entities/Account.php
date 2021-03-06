<?php

include_once '/../IDBEntity.php';
include_once '/../InputChecker.php';

class Account implements IDBEntity
{
    private $id;
    private $username;
    private $first_name;
    private $last_name;
    private $hashed_password;
    private $email_address;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @throws exception
     */
    public function setId($id)
    {
        InputChecker::isNonNegativeInteger($id, "Account id must not be null and must be a non-negative integer.");
        $this->id = intval($id);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @throws exception
     */
    public function setUsername($username)
    {
        InputChecker::isAlphaNumeric($username, "Account username must not be empty/null and must only consist of alphanumeric characters.");
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $first_name = htmlentities($first_name,ENT_HTML5);
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $last_name = htmlentities($last_name,ENT_HTML5);
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashed_password;
    }

    /**
     * @param mixed $hashed_password
     */
    public function setHashedPassword($hashed_password)
    {
        $this->hashed_password = $hashed_password;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param $email_address
     * @throws exception
     */
    public function setEmailAddress($email_address)
    {
        InputChecker::isValidEmailAddress($email_address, "Account email_address is either null or invalid.");
        $this->email_address = $email_address;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->id !== null)
        {
            $assoArr['id'] = $this->id;
        }
        if($this->username !== null)
        {
            $assoArr['username'] = $this->username;
        }
        if($this->first_name !== null)
        {
            $assoArr['first_name'] = $this->first_name;
        }
        if($this->last_name !== null)
        {
            $assoArr['last_name'] = $this->last_name;
        }
        if($this->hashed_password !== null)
        {
            $assoArr['hashed_password'] = $this->hashed_password;
        }
        if($this->email_address !== null)
        {
            $assoArr['email_address'] = $this->email_address;
        }

        return $assoArr;
    }
}