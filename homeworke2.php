<!DOCTYPE html>
<html lang="en">
    <head>
        <title>create account</title>

        <?php
            if ($_SERVER['REQUEST_METHOD']=="POST"){
                if(!$conecte_databez=new mysqli("localhost","root" ,"","php")){
                    die('Could not connect');
                }
                $error=[];
                $valuse=0;
                $print_erorse="";
                $Create_an_account="";

    
                if(!preg_match('/[\?\$\#\@\;\:\/\\\=\"\<\>\%\{\}\|\^\~\[\`\*\+\" "0-9]+/',$_POST['name']) and !empty($_POST['name'])){
                    $name=$_POST['name'];
                    $valuse+=1;
                }else{
                    $error[]="Please enter the name correctly";
                }
                if(!empty($_POST['age']) and $_POST['age']>=10 and $_POST['age']<=30){
                    $age=$_POST['age'];
                    $valuse+=1;
                }else{8
                    
                    $error[]="Please enter the age correctly";
                }
                if(!empty($_POST['gender'])){
                    $gender=$_POST['gender'];
                    $valuse+=1;
                }else{
                    $error[]="Please enter your gender";
                }
                if(!empty($_POST['email']) and preg_match('/[\W\_]*@[a-zA-Z]*\.[a-zA-Z]*/',$_POST['email']) and !preg_match('/[\?\$\#\;\:\/\\-\=\"\<\>\%\{\}\|\^\~\[\`\*\+\" "]+/',$_POST['email'])){
                    $email=$_POST['email'];
                    $valuse+=1;
                }else{
                    $error[]="Please enter the email correctly";
                }
                if($valuse==4){
                    if($conecte_databez->query("INSERT INTO stydant (name, age, gender, email) VALUES ('$name' , '$age' , '$gender' , '$email')") === TRUE){
                        $Create_an_account = "Account created";
                    }
                }else {
                    $index=1;
                    foreach($error as $x){
                        $print_erorse =$print_erorse .$index .") $x <br>" ;
                        $index+=1;
                    }
                }
            }
        ?>

        <style>
        body{
            background-color: black;
        }
        .app_CRETE_tixt{
            margin-top: 100px;
            position: relative;
            color: white;
            text-align: center;
        }
        .CRETE{
            font-size: 70px;
            margin-bottom: 0;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif
        }
        label{
            color: rgb(88, 88, 88);
        }
        .abu{
            margin-left: 560px;
            color: rgb(92, 92, 92);
            margin-top: 60px;
        }
        label{
            font-size: 12px;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        input,.submit{
            width: 370px;
            margin: 15px;
            padding: 20px;
            margin-left: 0;
            margin-right: 0;
        }
        input{
            background-color: rgb(48, 48, 48);
            border: 0;
            font-size: 10px;
            position:relative;
            color: white;
            font-size: small;
        }
        .submit{
            width: 410px;
            height: 55.4px;
            border: 1px solid white;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: white;
            background-color: black;
        }
        .submit:hover{
            background-color: white;
            color: black;
        }
        .print_erorse{
            color: red;
        }
        .print_Create_an_account{
            color: green;
        }
        .label_input{
            color: white;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 15px;
        }
        .input_gender{
            width: 57px;
        }

        </style> 
    </head>

    <body>
        <div class="app_CRETE_tixt">
            <h1 class="CRETE">CRETE ACCOUNT</h1>
        </div>
        <div class="abu">
            <form action="" method="post">
                <div>
                    <label>
                    YOUR NAME    
                    <div class="input">
                            <input type="text" placeholder="enter your name" name="name">
                        </div>
                    </label>
                </div>
                <div>
                    <label>
                        YOUR AGE
                        <div class="input">
                            <input type="text" placeholder="enter your age" name="age">
                        </div>
                    </label>
                </div>
                <div>
                    <label>
                        YOUR EMAIL
                        <div class="input">
                            <input type="text" placeholder="enter your email" name="email">
                        </div>
                    </label>
                </div>
                <div>
                    <div class="input">
                        <p class ="prgraf">enter your gender</p>
                        <label class="label_input">
                            <input type="radio" class="input_gender" name="gender" value="female">
                            female
                        </label><br>
                        <label class="label_input">
                            <input type="radio" class="input_gender" name="gender" value="male">
                            male
                        </label>
                    </div>
                </div>
                <div>
                    <div  class="input">
                        <input type="submit" value="CRETE ACCOUNT" class="submit">
                    </div>
                </div>
            </form>
            <div  class="input">
                <b class="print_Create_an_account">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=="POST"){
                        echo $Create_an_account;
                    }
                    ?>
                </b>
            </div>
            <div  class="input">
                <b class="print_erorse">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=="POST"){
                        echo $print_erorse;
                    }
                    ?>
                </b>
            </div>
        </div>

    </body>

</html>