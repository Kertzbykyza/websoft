<img src="<?= base_url('assets/cover.jpg'); ?>" alt="Cover Image" class="w-[1300px] rounded-lg" style="height: 170px; object-fit: cover;">

<section class="container px-2 my-1/4 mx-auto">
	<!-- <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These companies have purchased in the last 12 months.</p> -->

	<div class="flex flex-col" x-data="{open:true}">
		<div class="sticky top-0 bg-white w-full  p-0">
			<ul
				class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 mt-20 ms-10 ">
				<li class="me-2">
					<a aria-current="page" x-on:click="open = true"
						:class="{ 'bg-[#52923F] text-black': open, 'text-[#000000] hover:bg-[#7EB077] hover:text-black':!open }"
						class="inline-block p-4 text-xl bg-[#7EB077] rounded-t-lg h-16 w-60">Evaluators</a>
				</li>
				<li class="me-2">
					<a x-on:click="open = false"
						:class="{ 'bg-[#52923F] text-black':!open, 'hover:bg-[#7EB077] hover:text-black hover:bg-[#7EB077]': open }"
						class="inline-block p-4 text-xl rounded-t-lg active h-16 w-60">Authors</a>
				</li>
			</ul>
		</div>
		<div class="overflow-y-auto">
			<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
				<div class="flex justify-end" x-show="open">
					<a href="createUser?role=2"
						class=" my-4 bg-[#7EB077] hover:bg-[#52923F] text-white font-bold py-2 px-4 rounded-full">
						Add Evaluator
					</a>
				</div>
				<div class="flex justify-end" x-show="!open">
					<a href="createUser?role=3"
						class=" my-4 bg-[#7EB077] hover:bg-[#52923F] text-white font-bold py-2 px-4 rounded-full">
						Add Author
					</a>
				</div>


				<!-- Evaluators Table -->
				<div class="overflow-hidden border border-gray-200 " x-show="open">
					<table class="min-w-full divide-y divide-gray-200 ">
						<thead class="bg-gray-50 ">
							<tr>


								<th scope="col"
									class="px-12 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									#
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Fullname
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Email</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Actions</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200  ">
							<?php
							$i = 1;
							foreach ($users as $user):
								if($user["role"] == 2){

								
								?>
								<tr>
									<td
										class="px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500 ">
										<?= $i ?>
									</td>
									<td class="px-12 py-4 text-sm font-medium whitespace-nowrap text-gray-500">
										<?= $user["complete_name"] ?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500">
										<?= $user["email"] ?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-nowrap flex flex-row gap-1">
										<!-- <button
											class="bg-blue-500 hover:bg-blue-700 text-gray-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
											data-modal-toggle="viewModal">
											View
										</button> -->
										<!-- <a href="editUser?id=<?= $user["userid"] ?>"
											class="bg-green-500 hover:bg-green-700 text-gray-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
										</a> -->
										<a href="deleteUser/<?= $user["userid"] ?>"
											class="px-2 py-2 bg-[#FF00006E] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/del.png" alt="" class="h-10 w-10inline-block ">
										</a>
										<a href="editUser?id=<?= $user["userid"] ?>"
											class="px-2 py-2 bg-[#FBFF006E] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/compose.png" alt="" class="h-10 w-10 inline-block ">
										</a>

									</td>


								</tr>



								<?php
								$i++;

								}

							endforeach;
							?>


						</tbody>
					</table>

				</div>

				<!-- Authors Table -->
				<div class="overflow-hidden border border-gray-200 " x-show="!open">
					<table class="min-w-full divide-y divide-gray-200 ">
						<thead class="bg-gray-50 ">
							<tr>


								<th scope="col"
									class="px-12 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									#
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Fullname
								</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Email</th>

								<th scope="col"
									class="px-4 py-3.5 text-sm font-normal text-left  text-gray-500 ">
									Actions</th>
							</tr>
						</thead>
						<tbody class="bg-white divide-y divide-gray-200  ">
							<?php
							$i = 1;
							foreach ($authors as $author):
								
								
								?>
								<tr>
									<td
										class="px-4 py-4 text-md text-center whitespace-nowrap font-medium text-gray-500 ">
										<?= $i ?>
									</td>
									<td class="px-12 py-4 text-sm font-medium whitespace-nowrap text-gray-500">
										<?= $author["author_name"] ?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-nowrap text-gray-500">
										<?= $author["email"] ?>
									</td>
									<td class="px-4 py-4 text-sm whitespace-nowrap flex flex-row gap-1">
										<!-- <button
											class="bg-blue-500 hover:bg-blue-700 text-gray-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
											data-modal-toggle="viewModal">
											View
										</button> -->
										<!-- <a href="editUser?id=<?= $author["auid"] ?>"
											class="bg-green-500 hover:bg-green-700 text-gray-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
										</a> -->
										<a href="deleteAuthor?id=<?= $author["auid"] ?>"
											class="px-2 py-2 bg-[#FF00006E] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/del.png" alt="" class="h-10 w-10 inline-block ">
										</a>
										<a href="editAuthor?id=<?= $author["auid"] ?>"
											class="px-2 py-2 bg-[#FBFF006E] rounded-md flex justify-center items-center w-fit">
											<img src="<?= base_url() ?>assets/compose.png" alt="" class="h-10 w-10 inline-block ">
										</a>

									</td>


								</tr>



								<?php
							

								$i++;
							endforeach;
							?>


						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>



	<!-- <div class="flex items-center justify-between mt-6">
		<a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
			</svg>

			<span>
				previous
			</span>
		</a>

		<div class="items-center hidden md:flex gap-x-3">
			<a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
			<a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
		</div>

		<a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
			<span>
				Next
			</span>

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
				<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
			</svg>
		</a>
	</div> -->
</section>
