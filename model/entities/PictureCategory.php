<?php
/**
 * Created by PhpStorm.
 * User: Ittai
 * Date: 2/3/2015
 * Time: 11:44 PM
 */
include_once 'IDBEntity.php';
include_once 'InputChecker.php';

class PictureCategory implements IDBEntity
{
    private $picture_id;
    private $category_id;

    /**
     * @return mixed
     */
    public function getPictureId()
    {
        return $this->picture_id;
    }

    /**
     * @param $picture_id
     * @throws exception
     */
    public function setPictureId($picture_id)
    {
        InputChecker::isNonNegativeInteger($picture_id, "PictureCategory picture_id must not be null and must be a non-negative integer.");
        $this->picture_id = $picture_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param $category_id
     * @throws exception
     */
    public function setCategoryId($category_id)
    {
        InputChecker::isNonNegativeInteger($category_id, "PictureCategory category_id must not be null and must be a non-negative integer.");
        $this->category_id = $category_id;
    }

    function getAssociationArray()
    {
        $assoArr = array();

        if($this->picture_id !== null)
        {
            $assoArr['picture_id'] = $this->picture_id;
        }
        if($this->category_id !== null)
        {
            $assoArr['category_id'] = $this->category_id;
        }

        return $assoArr;
    }
}