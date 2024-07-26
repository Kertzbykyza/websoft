<div class="container d-flex align-items-center " style="height:100vh;">
    <table class="table table-hover">
        <thead>
            <tr class="table-primary text-center" >
                <th scope="col" >#</th>
                <th scope="col">Author Name</th>
                <th scope="col">Email</th>
				<th scope="col">Contact Number</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $i): ?>
            <tr class="table-primary">
                <th class="text-center" scope="row"><?=$i["auid"] ?></th>
                <td class="text-center"><?=$i["author_name"]?></td>
                <td class="text-center"><?=$i["email"]?></td>
				<td class="text-center"><?=$i["contact_num"]?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
