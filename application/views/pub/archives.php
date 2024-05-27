    <div class="col-span-9">
        <div class="latest-articles pl-12 pr-5 mt-10">
            <div class="text-xl font-medium mb-1">Archives</div>

            <?php foreach ($volumesarchived as $volumearch): ?>
            <div class="latest-articles-item">
                <div class="flex mt-5 mb-5">
                    <div class="p-1">
                        <img src="<?php echo base_url('assets/images/samplecover.png')?>" alt="" srcset="" class="mb-5">
                    </div>
                    <div class="flex-auto w-14 p-1 px-3">
                    <div class="item-header flex flex-row justify-between">
                        <div class="vol-name text-xl font-medium">
                            <?php echo $volumearch['vol_name']?>
                        </div>
                        <div class="vol-publish-date text-md">
                        <?php echo $volumearch['date_created']?>
                        </div>
                    </div>
                    <div class="item-description mt-4 mb-8">
                        <div class="desc text-gray-800 indent-10 text-justify leading-8">
                         <?php echo word_limiter($volumearch['description'], 40); ?>
                        </div>
                    </div>
                    <div class="article-button">
                        <a href="<?php echo base_url()?>volumearticle/<?php echo $volumearch['vol_id'];?>" class="bg-green-800 hover:bg-green-900 text-white mt-2 py-2 px-6 rounded w-100 text-center">View Article</a>
                    </div>
                </div>
                </div>
            </div>
           <?php endforeach; ?>

        </div>
    </div>