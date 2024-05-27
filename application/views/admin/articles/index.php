<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-6">Articles</div>
        <div class="main-actions flex mb-8 justify-between">
            <div class="flex">
                <form method="GET" action="<?php echo base_url('admin/articles'); ?>">
                    <input type="text" name="search" id="search" class="bg-gray-100 py-3 px-3 rounded w-96" placeholder="Enter article title or keyword" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="bg-green-900 text-white py-3 px-3 rounded">Search</button>
                </form>
                <form class="ml-4" method="GET" action="<?php echo base_url('admin/articles'); ?>">
                    <select name="volume_filter" id="volume_filter" class="bg-gray-100 py-3 px-3 rounded">
                        <option value="">Filter by Volume</option>
                        <?php foreach ($volumes as $volume): ?>
                            <option value="<?php echo $volume['vol_id']; ?>"><?php echo $volume['vol_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="bg-green-900 text-white py-3 px-3 rounded">Apply</button>
                </form>
            </div>
        <a href="<?php echo base_url('admin/articles/new')?>" class="add-volume bg-green-900 text-white py-3 px-3 rounded">Create Article</a>
        </div>
        
        <table class="table-auto w-full">
        <tr class="border">
                <th class="py-5">Title</th>
                <th>Volume</th>
                <th>Keywords</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        <?php if ($articles !== false && !empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <tr class="text-center rounded border h-32">
                <td>
                    <div class="article-info px-3">
                        <div class="text-left"><?php echo $article['title']?></div>
                    </div>
                </td>
                <td class="border px-10">
                    <?php echo $article['vol_name']; ?>
                </td>
                <td class="border">
                    <div class="article-status px-3">
                    <div class="status-icon px-5 py-2 text-center">
                        <?php echo $article['keywords']?>
                    </div>
                    </div>
                </td>
                <td class="border">
                <div class="article-info px-3">
                    <div class="text-left">
                        <?php 
                        foreach ($authors as $author) {
                            if ($author['userid'] == $article['authorid']) {
                                echo $author['complete_name'];
                                break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </td>
                <td class="">
                <div class="actions justify-center items-center flex px-8 ">
                    <a href="<?php echo base_url(); ?>admin/articles/view/<?php echo $article['articleid'];?>" class="action bg-green-900 rounded text-white p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/articles/edit/<?php echo $article['articleid'];?>" class="action bg-green-900 rounded text-white p-2 mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z"></path></svg>
                    </a>
                    <a href="<?php echo base_url()?>articles/delete/<?php echo $article['articleid'];?>" class="action bg-green-900 rounded text-white p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
                    </a>
                </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="p-5">No released article at the moment.</p>
        <?php endif; ?>
        </table>
    </div>
</div>