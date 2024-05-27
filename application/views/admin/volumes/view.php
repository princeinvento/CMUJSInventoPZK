<div class="col-span-10 py-7 px-10">
    <hr>
    <div class="px-5 pb-3">
    <div class="mt-4">
        <p class="text-2xl font-bold mb-2"><?php echo $volume['vol_name']; ?></p>
        <p class=""><?php echo $volume['description']; ?></p>
    </div>
    <div class="mt-4 flex space-x-4 justify-between">
        <form action="" method="post">
            <select name="action" onchange="this.form.submit()" class="bg-gray-200 text-black px-4 py-3 rounded">
                <option value="">Select Action</option>
                <option value="publish_<?php echo $volume['vol_id']; ?>" <?php echo $volume['published'] == 1 ? 'disabled' : ''; ?>>Publish</option>
                <option value="archive_<?php echo $volume['vol_id']; ?>" <?php echo $volume['published'] == 3 ? 'disabled' : ''; ?>>Archive</option>
                <option value="unpublish_<?php echo $volume['vol_id']; ?>" <?php echo $volume['published'] == 0 ? 'disabled' : ''; ?>>Unpublish</option>
            </select>
        </form>
        <a href="<?php echo base_url('volumes/addarticle').'/'.$volume['vol_id'];?>" class="add-article-by-id bg-green-900 text-white py-3 px-3 rounded">Add Article</a>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'];
            list($actionType, $volId) = explode('_', $action);

            switch ($actionType) {
                case 'publish':
                    header("Location: " . base_url() . "volumes/publish/" . $volId);
                    exit;
                case 'unpublish':
                    header("Location: " . base_url() . "volumes/unpublish/" . $volId);
                    exit;
                case 'archive':
                    header("Location: " . base_url() . "volumes/archive/" . $volId);
                    exit;
            }
        }
        ?>

    </div>
    <hr>

    <div class="p-5 mt-4">
        <p class="text-xl font-bold mb-6">List of Articles</p>
        <?php if (empty($volume['articles'])): ?>
            <p class="mt-5 text-center">No articles found</p>
        <?php else: ?>
            <table class="table  w-full border">
                <tr>
                    <th class="py-5">Title</th>
                    <th>Keywords</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
                <td>
                    <?php foreach ($volume['articles'] as $article): ?>
                        <?php if ($article['published'] == 1): ?>
                            <tr class="text-center rounded border h-32">
                                <td>
                                    <div class="article-info px-3">
                                        <div class="text-left"><?php echo $article['title']; ?></div>
                                    </div>
                                </td>
                                <td class="border px-10">
                                <?php echo $article['keywords']; ?>
                                </td>
                                <td class="border">
                                    <div class="article-status px-3">
                                    <div class="status-icon px-5 py-2 text-center">
                                    <?php 
                                            // Fetch author from authors database
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
                                <td class="border text-center rounded">
                                    <div class="actions justify-center flex p-5">
                                        <a href="<?php echo base_url(); ?>admin/articles/view/<?php echo $article['articleid']; ?>" class="action bg-green-900 rounded text-white p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256">
                                                <path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path>
                                            </svg>
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
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </table>
        <?php endif; ?>
    </div>
</div>
