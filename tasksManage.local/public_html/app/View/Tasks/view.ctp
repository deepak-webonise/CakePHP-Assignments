<h2><?php echo $task['Task']['title'] ;?></h2>
   <table>
       <tr><td>Created : <?php echo $task['Task']['created']; ?> Modified :<?php echo $task['Task']['modified']; ?> </tr>
       <tr><td><h4>Duration:</h4> <?php echo $task['Task']['duration'] ; ?>hrs.</td></tr>
       <tr><td><h4>Comments:</h4> <?php echo $task['Task']['comments']; ?></td></tr>

   </table>
