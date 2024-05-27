<div class="col-span-10 py-7 px-10">
    <div class="text-3xl font-bold">Dashboard</div>
    <div class="flex mt-8">
        <div class="flex-auto bg-zinc-100 px-5 pt-4 pb-4 rounded">
            <div class="text-xl font-bold pb-8">
                Registered Users
            </div>
            <div class="flex justify-between items-center">
                <div class="dashboard-icon opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                </div>
                <div class="text-6xl font-bold text-slate-900">
                    <?= $cusers; ?>
                </div>
            </div>
        </div>

        <div class="flex-auto bg-zinc-100 px-5 pt-4 pb-4 ml-4 rounded">
            <div class="text-xl font-bold pb-8">
                Registered Authors
            </div>
            <div class="flex justify-between items-center">
                <div class="dashboard-icon opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                </div>
                <div class="text-6xl font-bold text-slate-900">
                    <?= $cauthors; ?>
                </div>
            </div>
        </div>

        <div class="flex-auto bg-zinc-100 px-5 pt-4 pb-4 rounded mx-4">
            <div class="text-xl font-bold pb-8">
                Archived Volumes
            </div>
            <div class="flex justify-between items-center">
                <div class="dashboard-icon opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000" viewBox="0 0 256 256"><path d="M232,48H160a40,40,0,0,0-32,16A40,40,0,0,0,96,48H24a8,8,0,0,0-8,8V200a8,8,0,0,0,8,8H96a24,24,0,0,1,24,24,8,8,0,0,0,16,0,24,24,0,0,1,24-24h72a8,8,0,0,0,8-8V56A8,8,0,0,0,232,48ZM96,192H32V64H96a24,24,0,0,1,24,24V200A39.81,39.81,0,0,0,96,192Zm128,0H160a39.81,39.81,0,0,0-24,8V88a24,24,0,0,1,24-24h64ZM160,88h40a8,8,0,0,1,0,16H160a8,8,0,0,1,0-16Zm48,40a8,8,0,0,1-8,8H160a8,8,0,0,1,0-16h40A8,8,0,0,1,208,128Zm0,32a8,8,0,0,1-8,8H160a8,8,0,0,1,0-16h40A8,8,0,0,1,208,160Z"></path></svg>
                </div>
                <div class="text-6xl font-bold text-slate-900">
                <?= $archived; ?>
                </div>
            </div>
        </div>
    </div>

    <table class="table-auto w-full mt-12">
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