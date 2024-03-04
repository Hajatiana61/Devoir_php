
<?php
//$unset = $_GET["unset"];
$unset = $_GET["unset"];

    echo "<table border = 1>";

        echo "<tr bgcolor=$color>";

            echo"<td align=middle width=\"150px\">"."Valeur A"."</td><td align=middle width=\"150px\">"."Valeur B"."</td><td align=middle width=\"150px\">"."RESULT"."</td>";
            echo"<td align=middle width=\"150px\"> ACTION </td>";
        echo "</tr>";
/*--------------------------------------------------------------*/
            $new_file = file("Info_Table.txt");
            $number = count($new_file);

/*------------------------Reécrire le fichier----------------------*/
            $fic = fopen("Info_Table.txt", "r+");
            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";

            for($tmp = 0; $tmp < $number; $tmp++)
            {
                $lines[$tmp] = fgets($fic);

            }
            ftruncate($fic, 0);
            fclose($fic);


            $fic = fopen("Info_Table.txt", "a");
            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";
            for($tmp = 0; $tmp < $number; $tmp++)
            {
                if($tmp != $unset)
                    fwrite($fic, $lines[$tmp]);
                else
                    continue;
            }

            fclose($fic);
/*--------------------------------------------------------------*/
            $new_file = file("Info_Table.txt");
            $number = count($new_file);

/*--------------------------------------------------------------*/

            $fic = fopen("Info_Table.txt", "r+");

            if( $fic == NULL)echo "error : Impossible d'ouvrir le fichier";

            $line = NULL;

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
