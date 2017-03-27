    
                                <!-- AVATAR UPLOAD FUNC -->
                                <?php
                                function avatar()
                                {
                                    $file = 'uploads/'.$_SESSION['user']['id'].'.jpg';
                                    if (file_exists($file) == true)
                                     {
                                      echo 'uploads/'.$_SESSION['user']['id'].'.jpg';
                                    }
                                    else
                                    {
                                        echo "img/noavatar.png";
                                    }
                                }
                                ?>

                                <!-- LANGUAGE FUNCTION -->

<?php
function language() {
        $lang = $_GET['lang'];
        if(file_exists("language/".$lang."/lang.php"))
        {
            include "language/".$lang."/lang.php";
        }
        else
        {
            include "language/en/lang.php";
  }
        }

        
        function currencyImport($from,$to)
{
$url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
$handle = @fopen($url, 'r');

if($handle)
{
    $result = fgets($handle, 4096);
    fclose($handle);
}

$currencyData = explode(',',$result);
return $currencyData[1];
}
?>