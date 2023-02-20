<?php
$number = readline('enter ur card number');
class cards
{
    function luhn($number)
    {
        $stripped = str_replace(' ', '', $number);
        $reversed = strrev($stripped);
        for ($i = 1; $i < strlen($reversed); $i += 2) {
            $double = $reversed[$i] * 2;
            $reversed[$i] = $double - ($double > 9 ? 9 : 0);
        }
        if (array_sum(str_split($reversed)) % 10 == 0) {
            echo 'valid';
        } else {
            echo 'invalid';
        }
    }

    function checkIssuer($number)
    {

        global $type;
        $stripped = str_replace(' ', '', $number);
        $cardtype = array(
            "visa" => "/^4[0-9]{15}/",
            "visa1" => "/^62[0-9]{14}/",
            "visa2" => "/^67[0-9]{14}/",
            "mastercard" => "/^5[1-5][0-9]{14}/",
            "mastercard1" => "/^14[0-9]{14}/",
        );

        if (preg_match($cardtype['visa'], $stripped)) {
            $type = "visa";
            echo ' visa';
        } else if (preg_match($cardtype['visa1'], $stripped)) {
            $type = "visa1";
            echo ' visa';
        } else if (preg_match($cardtype['visa2'], $stripped)) {
                $type = "visa2";
                echo ' visa';
        } else if (preg_match($cardtype['mastercard'], $stripped)) {
            $type = "mastercard";
            echo ' mastercard';
        } else if (preg_match($cardtype['mastercard1'], $stripped)) {
                $type = "mastercard1";
                echo ' mastercard';
        } else {
            echo ' issuer unknown';
        }

    }
}

$newNum = new cards();
$newNum->luhn($number);
$newNum->checkIssuer($number);

