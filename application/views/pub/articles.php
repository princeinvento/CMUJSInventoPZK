    <div class="col-span-9">
        <div class="latest-articles pl-12 pr-5 mt-10">
            <div class="text-xl font-medium mb-1">Articles</div>
            <?php if ($articles !== false && !empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
            <div class="latest-articles-item">
                <div class="flex mt-5 mb-5">
                    <div class="p-1">
                        <img src="<?php echo base_url('assets/images/samplecover.png')?>" alt="" srcset="" class="mb-5">
                    </div>
                    <div class="flex-auto w-14 p-1 px-3">
                        <div class="article-title text-xl font-medium">
                        <?php echo $article['title']?>
                        </div>
                        <div class="article-info text-sm text-gray-700 mt-4 mb-8">
                            <div class="article-author"><span class="font-medium pr-5">Author </span><?php echo $article['author_name']?></div>
                            <div class="article-doi mt-2"><span class="font-medium pr-5">DOI</span><a href="<?php echo $article['doi']?>"><?php echo $article['doi']?></a></div>
                        </div>
                        <div class="article-button">
                        <a href="<?php echo base_url()?>article/<?php echo $article['articleid'];?>" class="bg-green-800 hover:bg-green-900 text-white mt-2 py-2 px-6 rounded w-100 text-center">View Article</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="p-5">No released article at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
