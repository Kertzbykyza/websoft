<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</head>

<body>
    <img src="<?= base_url('assets/cover.jpg'); ?>" alt="Cover Image" class="w-[1300px] rounded-lg"
        style="height: 170px; object-fit: cover;">

    <section class="container px-2 my-1/4 mx-auto">
        <div class="flex flex-col" x-data="{ open: true }">
            <div class="sticky top-0 bg-white w-full p-0">
                <ul class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 mt-20 ms-10">
                    <li class="me-2">
                        <a aria-current="page" x-on:click="open = true"
                            :class="{ 'bg-[#52923F] text-black': open, 'text-[#000000] hover:bg-[#7EB077] hover:text-black': !open }"
                            class="inline-block p-4 text-xl bg-[#7EB077] rounded-t-lg h-16 w-60">Published Volumes</a>
                        <a x-on:click="open = false"
                            :class="{ 'bg-[#52923F] text-black': !open, 'hover:bg-[#7EB077] hover:text-black': open }"
                            class="inline-block p-4 text-xl rounded-t-lg active h-16 w-60">Unpublished Volumes</a>
                    </li>
                    <li class="justify-end mx-16 mt-5" x-show="!open">
                        <a href="createVolume"
                            class="my-4 bg-[#7EB077] hover:bg-[#52923F] text-white font-bold py-2 px-4 rounded-xl">Add
                            Volume</a>
                    </li>
                </ul>
            </div>
            <div class="overflow-y-auto">
                <!-- Published Volumes Table -->
                <div class="overflow-hidden border border-gray-200 " x-show="open">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left text-gray-500">#
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Volume
                                    Name</th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Description
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $i = 1; foreach ($volumes as $volume): ?>
                            <?php if ($volume["published"] && !$volume["archived"]) : ?>
                                
                            <tr>
                                <td class="px-4 py-4 text-md text-center font-medium text-gray-500"><?= $i ?></td>
                                <td class="px-12 py-4 text-sm font-medium text-gray-500"><?= $volume["vol_name"] ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 max-w-xs break-words">
                                    <?= $volume["description"] ?>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap flex gap-1">
                                    <a href="archiveVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#88F7A47C] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/documentation.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                    <a href="deleteVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#FF00006E] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/del.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                    <a href="editVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#FBFF006E] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/compose.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Unpublished Volumes Table -->
                <div class="overflow-hidden border border-gray-200 " x-show="!open">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-12 py-3.5 text-sm font-normal text-left text-gray-500">#
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Volume
                                    Name</th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Description
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $i = 1; foreach ($volumes as $volume): ?>
                            <?php if (!$volume["published"] && !$volume["archived"]) : ?>
                            <tr>
                                <td class="px-4 py-4 text-md text-center font-medium text-gray-500"><?= $i ?></td>
                                <td class="px-12 py-4 text-sm font-medium text-gray-500"><?= $volume["vol_name"] ?></td>
                                <td class="px-4 py-4 text-sm text-gray-500 max-w-xs break-words">
                                    <?= $volume["description"] ?>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap flex gap-1">
                                    <a href="publishVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#88F7A47C] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/publish.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                    <a href="deleteVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#F78888] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/del.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                    <a href="editVolume?id=<?= $volume["volumeid"] ?>"
                                        class="px-2 py-2 bg-[#FBFF006E] rounded-md flex justify-center items-center">
                                        <img src="<?= base_url() ?>assets/compose.png" alt=""
                                            class="h-10 w-10 inline-block">
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
