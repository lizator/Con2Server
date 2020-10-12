<div class="activity_heading">
  <?php
    echo '<h1>' . $act_title . '</h1>';
    ?>
</div>
<div class="activity_img">
  <?php
    echo '<img src="../../../img/activities/' . $subpage . '.jpg">'
    ?>
</div>


<div class="activity_content">
  <?php
    require('activities/' . $subpage . '.html');
  ?>
</div>
