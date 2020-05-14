<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

//create button click
if(isset($_POST['create'])) {
    createData();
}

//update button click
if(isset($_POST['update'])){
    UpdateData();
}

//Delete button click
if(isset($_POST['delete'])){
    deleteRecord();
}

//Delete All button Clicked
if(isset($_POST['deleteall'])){
    deleteAll();
}



function createData(){
    $bookname = textboxValue("book_name");
    $authorname = textboxValue("author_name");
    $bookprice = textboxValue("book_price");

    if($bookname && $authorname && $bookprice){

        $sql = "INSERT INTO books (book_name, author_name, book_price)
            VALUES('$bookname','$authorname','$bookprice');";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Added");

        }else{
            echo "Error adding record";
        }
    }else{
        TextNode("error", "Provide Data in Textbox");

    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
      return$textbox;
    }
}

//messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from mySQL database
function getData(){
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result)>0){
     return $result;
    }
}
//Update Data
function UpdateData(){
    $authorid = textboxValue("author_id");
    $bookname = textboxValue("book_name");
    $bookauthor = textboxValue("author_name");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookauthor && $bookprice){
        $sql = "
            UPDATE books SET book_name='$bookname',author_name ='$bookauthor', book_price ='$bookprice' WHERE id='$authorid'
            ";



        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Data Successfully Updated");

        } else {
            TextNode("error", "Unable to Update Data");

        }

    }else{
        TextNode("error", "Select Data Using the Edit Icon");

    }
}

//Deletes record
function deleteRecord(){
    $bookid =(int)textboxValue("author_id");

    $sql = "DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Record Deleted Successfully.");
    }else{
        TextNode("error","Unable to Delete Record");

    }
}

//Delete everything button
function deleteBtn(){
    $result=getData();
    $i=0;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
         $i++;
            if($i>3){
             buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i>Delete All", "deleteall", "");
             return;
            }

        }
    }
}

//deletes all

function deleteAll()
{
    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "All Records Deleted Successfully");
        Createdb();
    } else {
        TextNode("error", "Something Went Wrong the Records Cannot be Deleted");
    }
}

//set ID to textbox
function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['id'];
        }
    }
    return ($id + 1);
}





