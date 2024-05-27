<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-6">User Details</div>
        <hr>
            <div class="mb-4 mt-5">
                <label class="block text-gray-700 font-bold mb-2" for="complete_name">Complete Name:</label>
                <p class="appearance-none rounded text-2xl font-medium w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="complete_name" name="complete_name"><?php echo $users['complete_name']?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
                <p class="appearance-none rounded text-xl font-medium w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email"><?php echo $users['email']?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="pword">Password:</label>
                <p class="appearance-none rounded text-xl font-medium w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="pword" name="pword"><?php echo str_repeat("*", strlen($users['pword'])); ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="role">Role:</label>
                <p class="appearance-none rounded text-xl font-medium w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="role" name="role">
                    <?php
                    switch($users['role']) {
                        case 1:
                            echo 'User';
                            break;
                        case 2:
                            echo 'Author';
                            break;
                        case 3:
                            echo 'Evaluator';
                            break;
                        default:
                            echo 'Unknown';
                    }
                    ?>
                </p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status:</label>
                <p class="appearance-none rounded text-xl font-medium w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status">
                    <?php echo ($users['status'] == 1) ? 'Active' : 'Inactive'; ?>
                </p>
            </div>
            <hr>
    </div>
</div>
