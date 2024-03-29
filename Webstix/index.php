<?php
//Header Files that contain all the classes.
include('classes/db_config.php');
include ("classes/classes_lib.php");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chatbot in PHP | CodingNepal</title>
    <!--<link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
html,body{
    display: grid;
    height: 100%;
    place-items: center;
}

::selection{
    color: #fff;
    background: #99003d;
}

::-webkit-scrollbar{
    width: 3px;
    border-radius: 25px;
}
::-webkit-scrollbar-track{
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
    background: #ddd;
}
::-webkit-scrollbar-thumb:hover{
    background: #ccc;
}

.wrapper{
    width: 530px;
    background: #fff;
    border-radius: 5px;
    border: 1px solid lightgrey;
    border-top: 0px;
}
.wrapper .title{
    background: #99003d;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    line-height: 60px;
    text-align: center;
    border-bottom: 1px solid #99003d;
    border-radius: 5px 5px 0 0;
}
.wrapper .form{
    padding: 20px 15px;
    min-height: 400px;
    max-height: 600px;
    overflow-y: auto;
}
.wrapper .form .inbox{
    width: 100%;
    display: flex;
    align-items: baseline;
}
.wrapper .form .user-inbox{
    justify-content: flex-end;
    margin: 13px 0;
}
.wrapper .form .inbox .icon{
    height: 40px;
    width: 40px;
    color: #fff;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    font-size: 18px;
    background: #000000;
}
.wrapper .form .inbox .msg-header{
    max-width: 53%;
    margin-left: 10px;
}
.form .inbox .msg-header p{
    color: #fff;
    background: #ff66a3;
    border-radius: 10px;
    padding: 8px 10px;
    font-size: 14px;
    word-break: break-all;
}
.form .user-inbox .msg-header p{
    color: #333;
    background: #ff4dff;
}
.wrapper .typing-field{
    display: flex;
    height: 60px;
    width: 100%;
    align-items: center;
    justify-content: space-evenly;
    background: #d9d9d9;
    border-top: 1px solid #d9d9d9;
    border-radius: 0 0 5px 5px;
}
.wrapper .typing-field .input-data{
    height: 40px;
    width: 335px;
    position: relative;
}
.wrapper .typing-field .input-data input{
    height: 100%;
    width: 100%;
    outline: none;
    border: 1px solid transparent;
    padding: 0 80px 0 15px;
    border-radius: 3px;
    font-size: 15px;
    background: #fff;
    transition: all 0.3s ease;
}
.typing-field .input-data input:focus{
    border-color: rgba(0,123,255,0.8);
}
.input-data input::placeholder{
    color: #999999;
    transition: all 0.3s ease;
}
.input-data input:focus::placeholder{
    color: #bfbfbf;
}
.wrapper .typing-field .input-data button{
    position: absolute;
    right: 5px;
    top: 50%;
    height: 30px;
    width: 65px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    outline: none;
    opacity: 0;
    pointer-events: none;
    border-radius: 3px;
    background: #c300ff;
    border: 1px solid #ff00d4;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}
.wrapper .typing-field .input-data input:valid ~ button{
    opacity: 1;
    pointer-events: auto;
}
.typing-field .input-data button:hover{
    background: red;
}





 /* CSS */
 .button-86 {

align-items: center;
appearance: none;
background-color:mintcream;
border-radius: 2px;
border-width: 0;
box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px,rgba(45, 35, 66, 0.3) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
box-sizing: border-box;
color: #36395A;
cursor: pointer;
display: inline-flex;
font-family: serif;
    height: 28px;
justify-content: center;
line-height: 1;
list-style: none;
overflow: hidden;
padding-left: 16px;
padding-right: 16px;
position: relative;
text-align: left;
text-decoration: none;
transition: box-shadow .15s,transform .15s;
user-select: none;
-webkit-user-select: none;
touch-action: manipulation;
white-space: nowrap;
will-change: box-shadow,transform;
font-size: 18px;
}

.button-86:focus {
box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
}

.button-86:hover {
box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
transform: translateY(-2px);
}

.button-86:active {
box-shadow: #D6D6E7 0 3px 7px inset;
transform: translateY(2px);
}
</style>
</head>

<body>
<form id="frm" name="frm" method="POST">

    <div class="wrapper">
        <div class="title">PROTON</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                <?php
                    $bt=new bot();
                    $a=array();
                    $a=$bt->init();
                    $i=1;
                ?>
            
                <p>Hey there, I am webstix's chatbot. How can I help you? </p> 
 
                <?php 
                    foreach ($a as $value) 
                    {
                ?>
            
                <button class="button-86" role="button" id="<?php echo $i; ?>" name="<?php echo $value; ?>" >
                <?php
                    echo "$value";
                    $i++;
                ?>
                </button>

                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="typing-field">
        <div class="input-data">
                <input id="t1" name="t1" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
        </div>
    </div>
</div>
</form>
   
   
   
<script>
    $(document).ready(function(){
        $("button").click(function()
        {                
            var val1 = this.id;
            $v = this.id;
            $vall=this.name;
            $("#demo").text($v);
            $value = $("#frm").serialize();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $vall +'</p></div></div>';
            $(".form").append($msg);
            $("#t1").val('');


            if($v==5)
            {
                $vall=this.name;
                $msg2='CHOOSE THE CURRENT PLATFORM:  <div id="currtech" ><input type="button" id="opbtn" name="b1" value="Joomla"><br/><input type="button" id="opbtn" name="b2" value="Wordpress"><br/><input type="button" id="opbtn" name="b3" value="Magento"><br/><input type="button" id="opbtn" name="b4" value="Others"><br/></div>';
                
                $(".form").append($msg2);
                $("#opbtn").click(function()
                {  
                    $msg3='ENTER THE CURRENT TECHNOLOGY : <input type="text" id="tb1">';
                    $(".form").append($msg3);
                })
                
            }
           
                // start ajax code
                $.ajax({
                    url: 'botwork2.php',
                    type: 'POST',
                    data: { text1: val1},
                    success: function(result)
                    {    
                        //$replay = '<button class="button-86" role="button">'+ result +'</button>';
                        //$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                       // $(".form").append($replay);
                       // $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
</script>
</body>
</html>