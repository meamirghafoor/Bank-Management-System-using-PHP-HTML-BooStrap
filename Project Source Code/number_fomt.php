<?php
function rup_format($rup) {
       $con=mysqli_connect("localhost","root","","web_programming");
         $sql = mysqli_query($con,$rup);
        $row = mysqli_fetch_array($sql);
        $number = $row['total'];
        if(isset($number)){
        $number = (0+str_replace(",", "", $number));
        if (!is_numeric($number)) return false;
        if     ($number > 1000000000000) return 'PKR '.round(($number/1000000000000), 2).'T';
        elseif ($number == 1000000000000) return 'PKR '.round(($number/1000000000000), 2).'.00T';
        elseif ($number > 1000000000) return 'PKR '.round(($number/1000000000), 2).'B';
        elseif ($number == 1000000000) return 'PKR '.round(($number/1000000000), 2).'.00B';
        elseif ($number > 1000000) return 'PKR'.round(($number/1000000), 2).'M';
        elseif ($number == 1000000) return round(($number/1000000), 2).'.00M';
        elseif ($number > 1000) return 'PKR '.round(($number/1000), 2).'K';
        elseif ($number == 1000) return 'PKR '.round(($number/1000), 2).'.00K';
        elseif ($number < 1000) return 'PKR '.$number.'.00';
        return rup_format($number);
    }else{
        if (isset($number)) {
            # code...
        }else{
            $number="0.00";
            return $number;
        }
        return rup_format($number);
    }
    }
?>