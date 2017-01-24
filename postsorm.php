<?php
date_default_timezone_set('America/New_York');

class postsorm
{
  private $id;
  private $title;
  private $description;
  private $price;
  private $phonenumber;
  private $imagelink;
  private $category;
  private $username;

  public static function connect() {
    return new mysqli("classroom.cs.unc.edu",
		      "psanka",
                      "random123",
		      "psankadb");
  }

  public static function create($title, $description, $price, $phonenumber, $username, $category, $imagelink) {
    $mysqli = postsorm::connect();

       $sql = "SELECT CategoryID FROM Categories WHERE CategoryName = '".$category ."'";
    $category_id;
     $catresult = $mysqli->query($sql);
        while($row = $catresult->fetch_assoc()) {
        $category_id = $row["CategoryID"];
    }

      $sql = "SELECT UserID FROM Users WHERE UserName = '".$username ."'";
    $user_id;
     $userresult = $mysqli->query($sql);
        while($row = $userresult->fetch_assoc()) {
        $user_id = $row["UserID"];
    }



    $result = $mysqli->query("insert into Posts (Title, Description, Price, PhoneNumber, Picture, CategoryID, UserID) values  ('".$title."', '".$description."', '".$price."', '".$phonenumber."','".$imagelink."', '".$category_id."','".$user_id."')");



    if ($result) {
      $id = $mysqli->insert_id;

        return $id;
      //return new postsorm($id, $title, $description, $price, $phonenumber, $imagelink, $category, $username);
    }
    return null;

  }


      private function __construct($id, $title, $description, $price, $phonenumber, $imagelink, $category, $username) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->price = $price;
    $this->phonenumber = $phonenumber;
    $this->imagelink = $imagelink;
    $this->category = $category;
    $this->username = $username;
  }

     public function getJSON() {


    $json_obj = array('PostID' => $this->id,
		      'title' => $this->title,
		      'description' => $this->description,
		      'price' => $this->price,
		      'phonenumber' => $this->phonenumber,
		      'category' => $this->category,
		      'username' => $this->username);
    return json_encode($json_obj);
  }
}
