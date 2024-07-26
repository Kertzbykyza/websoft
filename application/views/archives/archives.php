<img src="<?= base_url('assets/cover.jpg'); ?>" alt="Cover Image" class="w-[1300px]  rounded-lg" style="height: 170px; object-fit: cover;">

<div class="flex h-screen bg-white" x-data="{ showAll: false, selectedVolume: <?= $volumes[0]['volumeid'] ?> }">
    <div class="mt-36 w-60 bg-[#70B32394] h-[270px] rounded-2xl overflow-hidden" x-bind:class="{ 'h-fit': showAll }">
        <div class="p-4">
            <ul class="mt-4">
                <?php
                $count = 1;
                foreach ($volumes as $volume):
                    if ($count == 5):
                        ?>
                        <li @click="showAll = !showAll" class="flex justify-center items-center mt-3" x-show="!showAll">
                            <p>See More</p>
                            <img src="<?= base_url('assets/arrow_down.png'); ?>" alt="arrow down" class="h-4">
                        </li>
                    <?php endif; ?>
                    <li class="mt-3 p-2 text-center rounded-full" @click="selectedVolume = <?= $volume['volumeid'] ?>" 
                        x-bind:class="{ 'bg-[#578F4988]': selectedVolume == <?= $volume['volumeid'] ?>, 'bg-[#0B4B03AD]': selectedVolume != <?= $volume['volumeid'] ?> }" 
                        x-show="showAll || <?= $count ?> <= 5">
                        <a href="#" class="text-white"><?= $volume['vol_name'] ?></a>
                    </li>
                    <?php
                    $count++;
                endforeach;
                ?>
                <li @click="showAll = !showAll" class="flex justify-center items-center mt-3" x-show="showAll">
                    <p>See Less</p>
                    <img src="<?= base_url('assets/arrow_down.png'); ?>" alt="arrow down" class="h-4">
                </li>
            </ul>
        </div>
    </div>

    <div class="mt-36 ml-10">
        <?php foreach ($articles as $article): ?>
            <div class="w-[950px] h-30 bg-white rounded-xl border-2 border-[#135D66] px-4 mb-2" 
                x-show="selectedVolume == <?= $article['volumeid'] ?>">
                <div class="flex justify-between">
                    <div class="py-6 px-4 col-span-2">
                        <div class="uppercase tracking-wide text-md text-[#000000] font-semibold"><?= $article['title'] ?></div>
                        <p class="mt-2 text-sm text-gray-500"></p>
                    </div>
                    <div class="flex items-center col-span-1">
                        <div class="border-gray-300 py-2 px-4 items-center bg-[#64B3597A bg-opacity-20 text-[#0C6900] font-bold rounded-full">
                        </div>
                        <div class="border-l-2 border-[#64B3597A] border-opacity-50 h-full mx-4"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
