<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Include your CSS and JavaScript files here -->
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js" defer></script>
</head>

<body>
	<img src="<?= base_url('assets/cover.jpg'); ?>" alt="Cover Image" class="w-full rounded-lg"
		style="height: 170px; object-fit: cover;">

	<div class="flex flex-col items-start h-screen" x-data="{ open: true }">
		<div class="sticky top-0 bg-white w-full p-0">
			<ul
				class="flex flex-wrap justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 mt-20 ms-10">
				<li class="me-2">
					<a aria-current="page" x-on:click="open = true"
						:class="{ 'bg-[#52923F] text-black': open, 'text-[#000000] hover:bg-[#7EB077] hover:text-black': !open }"
						class="inline-block p-4 text-xl bg-[#7EB077] rounded-t-lg h-16 w-60">Published Articles</a>
					<a x-on:click="open = false"
						:class="{ 'bg-[#52923F] text-black': !open, 'hover:bg-[#7EB077] hover:text-black': open }"
						class="inline-block p-4 text-xl rounded-t-lg active h-16 w-60">Submissions</a>
				</li>
				<li class="justify-end mx-16 mt-5" x-show="!open">
					<a href="addSubmission"
						class="my-4 bg-[#7EB077] hover:bg-[#52923F] text-black font-bold py-2 px-4 rounded-xl">Add
						Submission</a>
				</li>
			</ul>
		</div>

		<div x-show="open" class="mt-4">
			<div class="overflow-x-auto border border-gray-200 mx-10 w-[75vw]">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">#</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Article
								Title</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Author</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">File</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Volume</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Keywords</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Actions</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						<?php
						if (empty($submission)) {
							echo "<tr><td colspan='6' class='px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500'>No Articles Found</td></tr>";
						} else {
							$i = 1;
							foreach ($articles as $article):
								?>
								<tr>
									<td class="px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500">
										<?= $i ?></td>
									<td class="px-4 py-4 text-sm font-medium whitespace-normal max-w-xs text-gray-500">
										<?= $article["title"] ?></td>
									<td class="px-4 py-4 text-sm font-medium whitespace-normal max-w-xs text-gray-500">
										<?php
										// $articleAuthors = array_filter($article_authors, function ($author) use ($article) {
										//     return $author["article_id"] == $article["articleid"];
										// });
										// foreach ($articleAuthors as $author) {
										//     foreach ($authors as $auth) {
										//         if ($auth["auid"] == $author["audid"]) {
										//             echo $auth["author_name"] . ", ";
										//         }
										//     }
										// }
								
										foreach ($article_authors as $a):
											if ($a["article_id"] == $article["articleid"]):
												foreach ($authors as $auth):
													if ($auth['auid'] == $a["audid"]):
														echo $auth['author_name']." <br>";
													endif;
												endforeach;
											endif;
										endforeach;
										?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-normal max-w-xs text-gray-500">
										<?= $article["filename"] ?></td>
									<td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500">
										<?php
										foreach ($volumes as $volume) {
											if ($volume["volumeid"] == $article["volumeid"]) {
												echo $volume["vol_name"];
											}
										}
										?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-normal max-w-xs text-gray-500">
										<?= $article["keywords"] ?></td>
									<td class="px-4 py-4 text-sm whitespa
									<td class="px-4 py-4 text-sm whitespace-nowrap flex flex-row gap-1">
										<a href="deleteArticle?id=<?= $article["articleid"] ?>"
											class="px-2 py-2 bg-[#FF00009A] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/del.png" alt="" class="h-10 w-10 inline-block">
										</a>
										<a href="editArticle?id=<?= $article["articleid"] ?>"
											class="px-2 py-2 bg-[#FBFF006E] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/compose.png" alt=""
												class="h-10 w-10 inline-block">
										</a>
									</td>
								</tr>
								<?php
								$i++;
							endforeach;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div x-show="!open" class="mt-4">
			<div class="overflow-x-auto border border-gray-200 mx-10 w-[75vw]">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">#</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Article
								Title</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">File</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Volume</th>
							<th scope="col" class="px-4 py-3.5 text-sm font-normal text-left text-gray-500">Actions</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						<?php
						if (empty($submission)) {
							echo "<tr><td colspan='5' class='px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500'>No Articles Found</td></tr>";
						} else {
							$i = 1;
							foreach ($submission as $article):
								if ($article["published"] == 1) {
									continue;
								}
								?>
								<tr>
									<td class="px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500">
										<?= $i ?></td>
									<td class="px-4 py-4 text-sm font-medium whitespace-normal max-w-xs text-gray-500">
										<?= $article["title"] ?></td>
									<td class="px-4 py-4 text-sm whitespace-normal max-w-xs text-gray-500">
										<?= $article["filename"] ?></td>
									<td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500">
										<?php
										foreach ($volumes as $volume) {
											if ($volume["volumeid"] == $article["volumeid"]) {
												echo $volume["vol_name"];
											}
										}
										?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-nowrap flex flex-row gap-1">
										<a href="publish?id=<?= $article["submission_id"] ?>"
											class="px-2 py-2 bg-[#88F7A47C] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/publish.png" alt=""
												class="h-10 w-10 inline-block">
										</a>
										<a href="deleteSubmission?id=<?= $article["submission_id"] ?>"
											class="px-2 py-2 bg-[#FF00009A] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/del.png" alt="" class="h-10 w-10 inline-block">
										</a>
										
									</td>
								</tr>
								<?php
								$i++;
							endforeach;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>