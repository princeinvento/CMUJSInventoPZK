<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-6">Add Article</div>
        <hr>
        <form class="mt-5" method="POST" action="<?php echo base_url('volumes/create_article'); ?>" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Enter Title" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="keywords">Keywords:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="keywords" name="keywords" type="text" placeholder="Enter Keywords" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="abstract">Abstract:</label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="editor1" name="abstract" placeholder="Enter Abstract" required></textarea>
            </div>
            <input type="hidden" name="published" value="1">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">File:</label>
                <input type="file" name="filename" id="filename" accept=".pdf" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="doi">DOI:</label>
                <input class= "appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="doi" name="doi" type="text" placeholder="Enter DOI">
            </div>
            <!-- Volume section from the old design -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author:</label>
                <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" name="authorid" required>
                    <option value="">Select Author</option>
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author['userid']; ?>"><?php echo $author['complete_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="volumeid" value="<?php echo $volumeid; ?>">
            <!-- End of Volume section -->
            <div class="flex items-center justify-between">
                <button class="bg-green-900 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit Article
                </button>
            </div>
        </form>
    </div>
</div>
