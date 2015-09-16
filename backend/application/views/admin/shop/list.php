<h2>Shop List</h2>
<div>
  <ul class="list-unstyled">
    <? foreach($shops as $shop): ?>
    <li>
      <a href="/admin/shop/edit/<?=$shop->id?>">
      <div class="media" style="border: 1px solid gray">
        <div class="media-left"><img src="<?=$shop->img?>"></div>
        <div class="media-body">
          <div><?=$shop->shop_name?></div>
          <div><?=$shop->description?></div>
        </div>
      </div>
      </a>
    </li>
    <? endforeach ?>
  </ul>
</div>

<a class="btn btn-primary btn-lg" href="/admin/shop/register">Register</a>