    <!-- Side Nav -->
    <div class="col-span-3 px-5 pt-10 border-l-2 border-gray-200">
        <div class="current-issue">
            <div class="p text-lg font-medium mb-1">Current Issue</div>
            <?php foreach ($volumes as $volume): ?>
            <a href="<?php echo base_url('current')?>" style="font-family: 'Poppins'; color: #84A62D;"><?php echo $volume['vol_name']?></a>
            <?php endforeach; ?>
        </div>
        <!-- <div class="categories mt-10 mb-10">
        <div class="p text-lg font-medium mb-1">Categories</div>
        <div class="cat-item my-3">
            <a href="" style="color: #84A62D;">Agriculture, Aquatic, and Natural Sciences</a>
        </div>
        <div class="cat-item my-3">
        <a href="" style="color: #84A62D;">Economics, Education, Environmental and Social Sciences</a>
        </div>
        <div class="cat-item my-3">
        <a href="" style="color: #84A62D;">Engineering, Mathematics, and Applied Sciences</a>
        </div>
        <div class="cat-item my-3">
        <a href="" style="color: #84A62D;">Life Sciences</a>
        </div>
        <div class="cat-item my-3">
        <a href="" style="color: #84A62D;">Natural Sciences</a>
        </div>
        <div class="cat-item my-3">
        <a href="" style="color: #84A62D;">Social Sciences</a>
        </div>
        </div> -->
    </div>
</div>