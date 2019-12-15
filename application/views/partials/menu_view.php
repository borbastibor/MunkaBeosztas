<div class="dropdown">
    <button onclick="dropdownClick()" class="dropbutton">M</button>
    <div id="dropdown-menu" class="dropdown-content">
        <?php
        echo(anchor('home','Munkák'));
        echo(anchor('dolgozok','Dolgozók'));
        echo(anchor('kocsik','Kocsik'));
        ?>
  </div>
</div>