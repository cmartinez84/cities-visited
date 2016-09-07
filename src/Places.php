<?php
class Places
{
    private $city;
    private $image;
    
    function __construct($city, $image)
    {
        $this->city = $city;
        $this->image = $image;
    }

    function setCity($city)
    {
        $this->city = (string) $city;
    }

    function getCity()
    {
      return $this->city;
    }
    function setImage()
    {
      if($image){
        $this->image = $image;
      }
    }
    function getImage()
    {
      return $this->image;
    }


//cookies
    function save()
    {
      array_push($_SESSION['list_of_cities'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_cities'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_cities'] = array();
    }
}
 ?>
