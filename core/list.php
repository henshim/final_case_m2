<?php foreach ($rooms as $key => $room): ?>       <div class="row" style="width=100px;height=150px">
            <img src="img/photo-collage.png" style="float: left;" alt="">
        </div>
    <!--<article class="col-12 col-sm-9 mt-2">-->
    <!--    <div class="col-12 col-sm-12 row mb-2">-->
    <div class="col-sm-4">
        <div class="card text-center">
            <div class="">
                <div class="card text-center">
                    <!--                <div class="card-header">-->
                    <!--                    --><?php //echo $key + 1 ?>
                    <!--                </div>-->
                    <div class="card-header">
                        <?php echo $room->name ?>
                    </div>
                    <!--                <div class="card-body">-->
                    <!--                    --><?php //echo $room->description ?>
                    <!--                </div>-->
                    <div class="card-body <?php if ($room->status == "Empty"): ?>
                                            <?php echo "btn-success" ?>
                                      <?php endif; ?>
                                      <?php if ($room->status == "Rented"): ?>
                                            <?php echo "btn-warning" ?>
                                      <?php endif; ?> ">
                        <p><?php echo "Giá :" . $room->unit_price ?></p>
                        <!--                </div>-->
                        <!--                <div class="card-body">-->
                        <p><?php echo "Trạng thái: " . $room->status ?></p>
                        <!--                </div>-->
                        <!--                <div class="card-body">-->
                        <p><?php echo "Loại phòng: " . $room->cateName ?></p>
                        <?php if ($room->status == "Rented"): ?>
                            <p><?php echo " Check in: " . $room->check_in ?></p>
                            <p><?php echo " Check out: " . $room->check_out ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-header">
                        <?php if (($room->status === "Empty")): ?>
                            <a href="index.php?page=room&action=update&id=<?php echo $room->id ?>"
                               type="button" class="btn btn-primary">Update
                            </a>
                            <a href="index.php?page=room&action=delete&id=<?php echo $room->id ?>"
                               type="button" class="btn btn-danger"
                               onclick="return confirm('Bạn chắc chắn muốn xóa ?')">Delete
                            </a>
                            <a href="index.php?page=room&action=detail&id=<?php echo $room->id ?>"
                               type="button" class="btn btn-success">Detail
                            </a>
                        <?php endif; ?>
                        <?php if ($room->status === "Empty"): ?>
                            <a href="index.php?page=room&action=check_in&id=<?php echo $room->id ?>"
                               type="submit" class="btn btn-info">Check in
                            </a>
                        <?php endif; ?>
                        <?php if ($room->status === "Rented"): ?>
                            <a href="index.php?page=room&action=check_out&id=<?php echo $room->id ?>"
                               type="submit" class="btn btn-info">Check out
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
