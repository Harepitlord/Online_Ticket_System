<?php
  if($_SERVER['REQUEST_METHOD']=='POST') {
    function get_data() {
      $datae=array();
      $datae[]=array(
          'Uname'=>$_POST['uname'],
          'Email'=>$_POST['email'],
          'Password'=>$_POST['psw']
        );
        return json_encode($datae);
    }
    $name='data';
    $filename=$name.'.json';
    $handle=@fopen($filename,'r+');
    if($handle==null) {
      if(file_put_contents($filename,get_data())) {
        echo $filename.' created';
      }
      else
      {
        echo 'There is some internel error';
      }
    }
    else {
      $json = file_get_contents($filename);
      $data = json_decode($json);
      array_push($data,get_data());
      if(file_put_contents($filename,$data))
        echo 'Successfully appended';
      else
        echo 'There is a internel error in appending data';
    }
    header("Location: Signup.html");
    exit;
  }
  ?>
