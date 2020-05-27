<?php
include("../../db/conn.php");
$id = $_GET['id'];

?>

<table id="deelnemers_table" class="highlight white-text responsive-table z-depth-3 " style="position: relative; height:50vh; width:40vw">
        <thead class="blue-grey darken-3 ">
            <tr>
                <th class='center'>DeelnemersNaam</th>
                <th class='center'>Type</th>
                <th class='center'>ProjectNaam</th>
                <th class='center'>STATUS</th>


            </tr>
        </thead>
        <?php
    $query =  mysqli_query($link,
    "SELECT 
    deelnemers_naam,
    projecten.type,
    projecten.naam AS project,
    STATUS
FROM
    deelnemers,
    projecten,
    taken,
    deelnemers_per_taak
WHERE
    projecten.project_id = taken.project_id
        AND taken.taak_id = deelnemers_per_taak.taak_id
        AND deelnemers_per_taak.deelnemers_id = deelnemers.deelnemers_id
        AND deelnemers.deelnemers_id = $id
        ORDER BY project ASC");  

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) 
    {
        echo "<tr>";
                echo "<td class='center'>" . $row{
                    'deelnemers_naam'} . "</td>";
                    echo "<td class='center'>" . $row{
                        'type'} . "</td>";   
                        echo "<td class='center'>" . $row{
                            'project'} . "</td>";
                            $Status = $row['STATUS'];
                            echo "<td class='center'>" . $Status . "</td>";
                         
 
                    }
                    
                }
        else{
            echo mysqli_error($link);
        }
        
                ?>
            </table>
        </body>