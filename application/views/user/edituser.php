<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="p-10">
        <h2 class="text-gray-600 text-2xl mb-4"><?= $title ?? "Edit Account" ?></h2>
        <?php 
            $actionUrl = isset($user) ? "updateUser?id={$user['userid']}" : "updateAuthor?id={$author['auid']}";
        ?>
        <form id="editAccountForm" action="<?= $actionUrl ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2" for="completeName">Complete Name</label>
                <input type="text" name="completeName" id="completeName" placeholder="John Doe" value="<?= isset($user) ? $user['complete_name'] : $author['author_name']; ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="example@example.com" value="<?= isset($user) ? $user['email'] : $author['email']; ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            </div>

            <?php if (isset($author)) { ?>
                <div class="mb-4">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="contact_num">Contact Number</label>
                    <input type="text" name="contact_num" id="contact_num" placeholder="+63 123 456 7890" value="<?= $author['contact_num'] ?>" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>

            <?php } ?>

            <?php if (isset($user)) { ?>
                <div class="mb-6">
                    <label class="block text-gray-600 text-sm font-medium mb-2" for="pword">Password</label>
                    <input type="password" name="password" id="pword" placeholder="******************" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
            <?php } ?>

            <button id="submitButton" class="bg-[#7EB077] hover:bg-[#02972F96] text-white font-bold py-2 px-4 rounded-xl w-full" type="submit">Update</button>
        </form>
    </div>

    <script>
        document.getElementById('submitButton').addEventListener('click', function (event) {
            event.preventDefault();

            var completeName = document.getElementById('completeName').value;
            var email = document.getElementById('email').value;
            var passwordField = document.getElementById('pword');
            var password = passwordField ? passwordField.value : null;

            if (!completeName) {
                alert('Complete Name is required.');
                return;
            }

            if (!email) {
                alert('Email is required.');
                return;
            }

            var emailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }

            if (passwordField && !password) {
                alert('Password is required.');
                return;
            }

            document.getElementById('editAccountForm').submit();
        });
    </script>
</body>

</html>
