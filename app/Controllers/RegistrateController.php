<?php

namespace App\Controllers;
use App\Model;
use App\View;
use App\Response;
class RegistrateController
{
    public function show() {
        return View::make("registrate",[
            "title" => "Registrate",
        ]);
    }
    public function store()
    {
        $first_name=$_POST['fname'];
        $last_name=$_POST['lname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $model = new Model();
        $check_email_exist=$model->execute("select * from user where email=$email")->num_rows;
        if ($check_email_exist>0){
            //Response::make()

        }
        $model->execute("insert into user values(null,'$first_name','$last_name','$phone','$email','$password','customer') ");
        return View::make("welcome");

    }
}