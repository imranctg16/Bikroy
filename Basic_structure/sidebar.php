<div style="border: dashed" class="col-lg-12">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        <!-- /.input-group -->
    </div>

    Blog Categories Well
    <div class="well">
        <h4>বিভাগ</h4>


        <ul class="list-unstyled">
            <?php
            $select_div_class = new Division();
            $select_div = $select_div_class->get_all_div();

            while ($row = mysqli_fetch_assoc($select_div)) { ?>

                <li><a href="#"><?php echo $row['division_name']; ?></a>
                </li>

            <?php }
            ?>
        </ul>
    </div>

    <!-- Side Widget Well -->

</div>