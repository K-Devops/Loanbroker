<?php

if(isset($_POST['id']))
{
echo 'Submit wurde gedrückt';
} else {
echo 'submit wurde nicht gedrückt';
} 

if (!empty($_POST['userid'])) {
    echo "Yes, mail is set";    
} else {  
    echo "No, mail is not set";
}


