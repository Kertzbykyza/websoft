<div class="flex h-screen bg-gray-700">
<div class="w-64 bg-gray-800 shadow-lg">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-gray-800">Sidebar</h2>
            <ul class="mt-4">
                <li class="mt-3">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Home</a>
                </li>
                <li class="mt-3">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Settings</a>
                </li>
                <li class="mt-3">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Messages</a>
                </li>
            </ul>
        </div>
    </div>
   
    <div class="flex-1 flex flex-col overflow-hidden">
		
        <div class="container d-flex align-items-center" style="height:100vh;">
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary text-center">
                        <th scope="col">#</th>
                        <th scope="col">Volume Name</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($volumes as $i): ?>
                    <tr class="table-primary">
                        <th class="text-center" scope="row"><?=$i["volumeid"] ?></th>
                        <td class="text-center"><?=$i["vol_name"]?></td>
                        <td class="text-center"><?=$i["description"]?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
