<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
</head>
<body class="bg-gray-100">
	<div class="p-10">
		<form id="registrationForm" action="addUser?role=<?= $role ?>" method="POST">
			<h2 class="text-gray-600 text-2xl mb-4">Registration Form</h2>
			<div class="mb-4">
				<label for="completeName" class="block text-gray-600 text-sm font-medium mb-2">Complete Name</label>
				<input type="text" name="completeName" id="completeName" placeholder="John Doe" required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
			</div>

			<div class="mb-4">
				<label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
				<input type="email" name="email" id="email" placeholder="example@example.com" required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
			</div>

			<?php if ($role == 3) { ?>
				<div class="mb-4">
					<label for="contact_num" class="block text-gray-600 text-sm font-medium mb-2">Contact Number</label>
					<input type="text" name="contact_num" id="contact_num" placeholder="+63 123 456 7890" required
						class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
				</div>

				<div class="mb-4">
					<label for="title" class="block text-gray-600 text-sm font-medium mb-2">Title</label>
					<input type="text" name="title" id="title" placeholder="Mr./Mrs." required
						class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
				</div>
			<?php } ?>

			<div class="mb-6">
				<label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
				<input type="password" name="password" id="password" placeholder="******************" required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
			</div>

			<button id="submitBtn"
				class="bg-[#7EB077] hover:bg-[#02972F96] text-white font-bold py-2 px-4 rounded-xl w-full">Submit</button>
		</form>

		<script>
			document.getElementById('submitBtn').addEventListener('click', function (e) {
				e.preventDefault(); // Prevent the default form submission
				var completeName = document.getElementById('completeName').value;
				var email = document.getElementById('email').value;
				var password = document.getElementById('password').value;

				var emailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;

				// Example validation checks
				if (completeName === '' || email === '' || password === '') {
					alert('Please fill in all fields.');
					return; // Stop the form submission
				}

				// Email validation using regex
				if (!emailRegex.test(email)) {
					alert('Please enter a valid email address.');
					return; // Stop the form submission
				}

				document.getElementById('registrationForm').submit(); // Submit the form programmatically
			});
		</script>
	</div>
</body>
</html>
