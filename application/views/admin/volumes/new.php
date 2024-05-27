<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-7">Add Volume</div>
        <form action="<?php echo base_url(); ?>volumes/add" method="POST">
            <div class="my-4">
                <p class="font-medium mb-2">Volume Name</p>
                <input name="vol_name" class="w-full h-[45px] p-2 bg-gray-100 rounded" type="text" placeholder="Enter Volume Name" value="<?php echo set_value('vol_name'); ?>"/>
                <?php echo form_error('vol_name', '<div class="error">', '</div>'); ?>
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Volume Description</p>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editor1" name="description" placeholder="Enter Abstract" required></textarea>
                <?php echo form_error('description', '<div class="error">', '</div>'); ?>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="w-32 bg-green-900 text-white py-3 px-3 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>