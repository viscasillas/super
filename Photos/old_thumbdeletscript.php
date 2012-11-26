<?php
else 
   echo "
   <div class='previewWindow'>
   <form method='post'>
   <input type='text' name='imagetodelete' value='".$_GET['img']."' style='display:none;'>
   <input class='deleteBTNBig' name='deleteIMG' type='submit'>
   </form>
   <img class='previewImage' src='".$_GET['img']."'/>
   <br />
   <input type='text' value='".$siteURL.$_GET['img']."'  class='imgURLbox'/>
   </div>
   " ;
   ?>