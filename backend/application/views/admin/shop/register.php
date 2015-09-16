<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Shop Name</label>
    <div class="col-sm-10">
      <input type="text" name="shop_name" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Shop Type</label>
    <div class="col-sm-10">
      <select name="type_id" class="form-control">
        <option value="1">음식점</option>
        <option value="2">술집</option>
        <option value="3">미용실</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Tel</label>
    <div class="col-sm-10">
      <input type="text" name="tel" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
      <input type="file" name="img">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="description" class="form-control" row="2"></textarea>
    </div>
  </div>
  
<button type="submit" class="btn btn-success btn-lg">Register</button>
<button type="button" class="btn btn-danger btn-lg" onclick="history.go(-1)">Cancel</button>
</form>


