<img src="<?= base_url('assets/cover.jpg'); ?>" alt="Cover Image" class="w-[1290px] shadow-lg rounded-lg" style="height: 250px; object-fit: cover;">

<div class="flex flex-wrap p-4 pt-16">
    <!-- Card 1 -->
    <div class="w-[600px] bg-[#7EB077] shadow-lg rounded-lg p-6 me-10 grid grid-cols-2">
        <div class="col-span-1 flex justify-center flex-col">
            <h1 class="text-xl font-bold mb-4 text-white">Active Users</h1>
            <img src="<?= base_url('assets/account.png'); ?>" alt="" class="h-40 self-center">
        </div>
        <div class="col-span-1 flex justify-center items-center">
            <h1 class="text-7xl text-center font-bold mb-4 text-white"><?=$user_count?></h1>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="w-[600px] bg-[#7EB077] shadow-lg rounded-lg p-6 me-10 grid grid-cols-2">
        <div class="col-span-1 flex justify-center flex-col">
            <h1 class="text-xl font-bold mb-4 text-white">Published Articles</h1>
			<img src="<?= base_url('assets/open-book.png'); ?>" alt="" class="h-40 self-center">
        </div>
        <div class="col-span-1 flex justify-center items-center">
            <h1 class="text-7xl text-center font-bold mb-4 text-white"><?=$article_count?></h1>
        </div>
    </div>
</div>
