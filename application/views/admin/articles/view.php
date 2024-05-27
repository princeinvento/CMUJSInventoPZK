<div class="col-span-10 py-7 px-10">
    <div class="articles-table">
        <div class="text-2xl font-bold mb-6">Article Details</div>
        <hr>
        <div class="current-issue pr-5 mt-10 border-gray-200">
            <div class="flex">
                <div class="flex basis-9/12 flex-col pr-8 mb-12">
                    <div class="article-title text-2xl font-medium pr-2">
                        <?php echo $articles['title']; ?>
                    </div>
                    <div class="article-info mt-5">
                        <div class="author">
                            <p class="font-medium text-gray-700">Author</p>
                            <p class="text-gray-600">
                                <?php 
                                    $authors = explode(',', $articles['authors']);
                                    foreach ($authors as $author) {
                                        echo trim($author) . '<br>'; 
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="flex mt-3">
                            <div class="doi">
                                <p class="font-medium text-gray-700">DOI</p>
                                <a href="#" class="text-gray-600"><?php echo $articles['doi']; ?></a>
                            </div>
                            <div class="dop ml-12">
                                <div class="font-medium text-gray-700">Date Published</div>
                                <a href="" class="text-gray-600"><?php echo $articles['date_published']; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="keywords mt-3">
                        <div class="doi">
                            <p class="font-medium text-gray-700">Keywords</p>
                            <p class="text-gray-600"><?php echo $articles['keywords']; ?></p>
                        </div>
                    </div>
                    <div class="abstract mt-12">
                        <div class="text-xl font-medium mb-5">
                            Abstract
                        </div>
                        <div class="desc text-gray-600 indent-10 text-justify leading-8">
                            <?php echo $articles['abstract']; ?>
                        </div>
                    </div>
                </div>
                <div class="flex basis-3/12 flex-col">
                    <img src="<?php echo base_url('assets/images/samplecover.png'); ?>" class="mb-5" alt="">
                    <a href="<?php echo base_url('uploads/' . $articles['filename']); ?>" class="bg-green-800 hover:bg-green-900 w-fit text-white py-2 px-6 rounded text-center inline-flex items-center" download>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ffffff" viewBox="0 0 256 256">
                            <path d="M224,152a8,8,0,0,1-8,8H192v16h16a8,8,0,0,1,0,16H192v16a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8h32A8,8,0,0,1,224,152ZM92,172a28,28,0,0,1-28,28H56v8a8,8,0,0,1-16,0V152a8,8,0,0,1,8-8H64A28,28,0,0,1,92,172Zm-16,0a12,12,0,0,0-12-12H56v24h8A12,12,0,0,0,76,172Zm88,8a36,36,0,0,1-36,36H112a8,8,0,0,1-8-8V152a8,8,0,0,1,8-8h16A36,36,0,0,1,164,180Zm-16,0a20,20,0,0,0-20-20h-8v40h8A20,20,0,0,0,148,180ZM40,112V40A16,16,0,0,1,56,24h96a8,8,0,0,1,5.66,2.34l56,56A8,8,0,0,1,216,88v24a8,8,0,0,1-16,0V96H152a8,8,0,0,1-8-8V40H56v72a8,8,0,0,1-16,0ZM160,80h28.69L160,51.31Z"></path>
                        </svg>
                        <span class="ml-2">Download</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
