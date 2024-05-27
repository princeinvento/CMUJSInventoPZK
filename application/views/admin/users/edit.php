<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-6">Edit User</div>
        <hr>
        <form class="mt-5" method="POST" action="<?php echo base_url(); ?>users/edit_user/" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php echo $users['userid']; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="complete_name">Complete Name:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="complete_name" name="complete_name" type="text" placeholder="Enter Complete Name" value="<?php echo $users['complete_name']?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter Email" value="<?php echo $users['email']?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pword">Password:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pword" name="pword" type="password" placeholder="Enter Password" value="<?php echo $users['pword']?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role:</label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" name="role" required>
                    <option value="1" <?php echo set_select('role', '1', $users['role'] == '1'); ?>>User</option>
                    <option value="2" <?php echo set_select('role', '2', $users['role'] == '2'); ?>>Author</option>     
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status:</label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required>
                     <option value="1" <?php echo set_select('status', '1', $users['status'] == '1'); ?>>Active</option>    
                     <option value="0" <?php echo set_select('status', '0', $users['status'] == '0'); ?>>Inactive</option>    

                </select>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-green-900 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit User
                </button>
            </div>
        </form>
    </div>
</div>