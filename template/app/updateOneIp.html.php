<?php
include __DIR__ . "/../baseOpen.html.php";?>


<!-- Textfield with Floating Label -->

<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
  <li class="mdl-list__item mdl-grid center-items">
    <h3>Update Manual</h3>
  </li>
</ul>

<div class="mdl-grid">
  <form method="post" action="products/create">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
      <input class="mdl-textfield__input" type="text" name="name">
      <label class="mdl-textfield__label" for="sample3">Create Name Products</label>
    </div>

    <?php
        foreach($ipAddresses as $ipAddress){
        }
    ?>
      
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="category_id">
      <label class="mdl-textfield__label" for="sample3"><?php echo $ipAddress->getIp(); ?> </label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="unit">
      <label class="mdl-textfield__label" for="sample3">Create qté Unitaire</label>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" name="gram">
      <label class="mdl-textfield__label" for="sample3">Create qté en Gramme</label>
    </div>

  </form>
</div>

<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
  <li class="mdl-list__item mdl-grid center-items">
    <h3>Products</h3>
  </li>
</ul>

<div class="demo-list-action mdl-list mdl-cell mdl-cell--10-col text-center">
  <div class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <table class="fontTableau" border="1">
        <ul>
          <tr>
            <th>Name</th>
            <th>Id</th>
            <th>Ip</th>
            <th>Status</th>
            <th>Date dernier ON</th>
            <th>Date Ko</th> 
            <th>Type de matériel</th> 
          </tr>
        </ul>
        <ul>
        <?php foreach ($ipAddresses as $ipAdress): ?>
          <tr>
            <td><?=$ipAdress->getName()?></td>
            <td><?=$ipAdress->getId()?></td>
            <td><?=$ipAdress->getIp()?></td>
            <td><?=$ipAdress->getStatus()?></td>
            <td><?=$ipAdress->getDateDernOn()?></td>
            <td><?=$ipAdress->getDateKo()?></td>
            <td><?=$ipAdress->getTypeMat()?></td>
          </tr>
        <?php endforeach;?>
        </ul>
      </table>
    </span>
  </div>
</div>
<?php
include __DIR__ . "/../baseClose.html.php";?>