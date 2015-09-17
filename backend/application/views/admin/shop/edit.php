<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Shop Name</label>
    <div class="col-sm-10">
      <input type="text" name="shop_name" class="form-control" value="<?=$shop->shop_name?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Position X</label>
    <div class="col-sm-10">
      <input type="text" name="pos_x" class="form-control" value="<?=$shop->pos_x?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Position Y</label>
    <div class="col-sm-10">
      <input type="text" name="pos_y" class="form-control" value="<?=$shop->pos_y?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Shop Type</label>
    <div class="col-sm-10">
      <select name="type_id" class="form-control">
        <option value="1" <? if($shop->type_id==1) echo 'selected'; ?>>음식점</option>
        <option value="2" <? if($shop->type_id==2) echo 'selected'; ?>>술집</option>
        <option value="3" <? if($shop->type_id==3) echo 'selected'; ?>>미용실</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control" value="<?=$shop->address?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tel</label>
    <div class="col-sm-10">
      <input type="text" name="tel" class="form-control" value="<?=$shop->tel?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" value="<?=$shop->phone?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      <img src="<?=$shop->img?>">
      <input type="file" name="img">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="description" class="form-control" row="2"><?=$shop->description?></textarea>
    </div>
  </div>
  
<? if($shop): ?>
<button type="submit" class="btn btn-success btn-lg">Save</button>
<a type="button" class="btn btn-danger btn-lg" href="/admin/shop/delete/<?=$shop->id?>">Delete</a>
<a type="button" class="btn btn-primary btn-lg" href="/admin/shop/shops">Back to List</a>
<? else: ?>
<button type="submit" class="btn btn-success btn-lg">Register</button>
<button type="button" class="btn btn-danger btn-lg" onclick="history.go(-1)">Cancel</button>
<? endif ?>
</form>


