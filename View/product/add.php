<form method="post" style="width: 700px" enctype="multipart/form-data">
    <fieldset>
        <legend>ADD PRODUCTS</legend>
        <div>
            <div class="form-group">
                <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md"
                       type="text" required="">
                <?php if (isset($error['name'])): ?>
                    <p class="error"><?php echo $error['name'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <input id="product_name" name="price" placeholder="PRODUCT PRICE" class="form-control input-md"
                       required="" type="number">VND
                <?php if (isset($error['price'])): ?>
                    <p class="error"><?php echo $error['price'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <select id="" name="cateName" class="form-control">
                    <?php foreach ($cates as $cate): ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <input id="available_quantity" name="amount" placeholder="AVAILABLE QUANTITY"
                       class="form-control input-md" required="" type="number">
                <?php if (isset($error['amount'])): ?>
                    <p class="error"><?php echo $error['amount'] ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">PRODUCT SUPPLIER</label>
                <select id="" name="supName" class="form-control">
                    <?php foreach ($sups as $sup): ?>
                        <option value="<?php echo $sup['id'] ?>"><?php echo $sup['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <textarea class='form-control input' name="description" id="" placeholder='DESCRIPTION' cols="30"
                          rows="10"></textarea>
                <?php if (isset($error['description'])): ?>
                    <p class="error"><?php echo $error['description'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="img" class="col-md-4 control-label">Image</label>
                <input type="file" name="img" class="form-control input-md">
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="index.php?page=product&action=list" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </fieldset>
</form><?php
