

<?php
$varA = $_POST["valeurA"];
$varB = $_POST["valeurB"];
$varX = 0;

    echo "<table border = 1>";

        echo "<tr bgcolor=$color>";

            echo"<td align=middle width=\"150px\">"."Valeur A"."</td><td align=middle width=\"150px\">"."Valeur B"."</td><td align=middle width=\"150px\">"."RESULT"."</td>";
            echo"<td align=middle width=\"150px\"> ACTION </td>";
        echo "</tr>";


/*--------------------Delet fichier--------------------------*/

        $fic = fopen("Info_Table.txt", "r+");
            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";
            ftruncate($fic, 0);

            fclose($fic);

/*----------------------Boucle Metteur-----------------------------*/


        for($tmp = 0; $tmp <= $varB; $tmp++)
        {
            $varX = $varA * $tmp;
            $fic = fopen("Info_Table.txt", "a");
            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";
            $line = $varA." ".$tmp." ".$varX."\n";

            fwrite($fic, $line);

            fclose($fic);

        }
/*-----------------------Read and show------------------------------*/
            $new_file = file("Info_Table.txt");
            $number = count($new_file);

/*------------------------------------------------------------------*/
            $fic = fopen("Info_Table.txt", "r+");

            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";


            for($tmp = 0; $tmp < $number; $tmp++)
            {

                if($tmp % 2 == 0)
                {
                    $color = "gray";
                }
                else
                    $color = "white";


                $var[0] = 0; $var[1] = 0; $var[2] = 0;
                fscanf($fic, "%d %d %d", $var[0], $var[1], $var[2]);



                $requet[$tmp] = "<tr bgcolor=$color>".
                                    "<td align=middle width=\"150px\">".$var[0]."</td>
                                    <td align=middle width=\"150px\">".$var[1]."</td>
                                    <td align=middle width=\"150px\">".$var[2]."</td>".
                                    "<td align=middle>
                                        <a href=\"Edit.php? Modify=$tmp\">
                                            <button>Edit</button>
                                        </a>
                                    </td>".
                                    "<td align=middle>
                                        <a href=\"Delete.php? unset=$tmp\">

                                            <button style=\"background-color:red;\"> Delet </button>
                                        </a>
                                    </td>".
                                "</tr>";

                echo $requet[$tmp];

            }
            fclose($fic);
    echo "</table>";
/*--------------------------------------------------------------*/

     echo "<table>";

        echo "<tr>";

           echo "<td align=middle>
                    <a href=\"Multiply.html\">
                            <button> >>New Table</button>
                    </a>
                </td>";

        echo "</tr>";

     echo "</table>";

?>
