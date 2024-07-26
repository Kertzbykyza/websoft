<div class="p-10">
    <form action="updateArticle" method="post">
        <h2 class="text-gray-600 text-2xl mb-4">Edit Article</h2>

        <!-- Hidden input for the article ID -->
        <input type="hidden" name="articleid" value="<?= set_value('articleid', $article['articleid'] ?? '') ?>">

        <!-- Title input -->
        <div class="mb-4">
            <label for="title" class="block text-gray-600 text-sm font-medium mb-2">Title</label>
            <input type="text" name="title" id="title"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                value="<?= set_value('title', $article['title']) ?>" required>
        </div>

        <!-- Author select (with dynamic addition) -->
        <div id="author-container" class="mb-4">
            <label for="authors" class="block text-gray-600 text-sm font-medium mb-2">Authors</label>
            <div id="author-list">
                <?php foreach ($author_article as $aa): ?>
                    <?php if ($aa["article_id"] == $article["articleid"]): ?>
                        <div class="author-item mb-2">
                            <select name="authors[]" class="author-select w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required>
                                <?php foreach ($authors as $author): ?>
                                    <option value="<?= $author['auid'] ?>" <?= $author['auid'] == $aa["audid"] ? 'selected' : '' ?>>
                                        <?= $author['author_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" class="remove-author bg-[#FF0000] hover:bg-[#FF7F7F] text-white font-bold py-2 px-4 rounded-xl ml-2">Remove</button>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <button type="button" id="add-author" class="mt-2 bg-[#7EB077] hover:bg-[#02972F96] text-white font-bold py-2 px-4 rounded-xl">Add Author</button>
        </div>

        <!-- File input (disabled) -->
        <div class="flex justify-between gap-5 w-full">
            <div class="mb-4 flex-1 h-full">
                <label for="filename" class="block text-gray-600 text-sm font-medium mb-2">File</label>
                <input type="text" id="filename"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    value="<?= set_value('filename', $article['filename']) ?>" disabled>
                <input type="hidden" name="filename" value="<?= $article["filename"] ?>">
            </div>

            <!-- Volume select -->
            <div class="mb-4 flex-1 h-full">
                <label for="volumeid" class="block text-gray-600 text-sm font-medium mb-2">Volume</label>
                <select name="volumeid" id="volumeid"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    required>
                    <?php foreach ($volumes as $volume): ?>
                        <option value="<?= $volume['volumeid'] ?>" <?= set_select('volumeid', $volume['volumeid'], $volume['volumeid'] == $article['volumeid']) ?>>
                            <?= $volume['vol_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-4">
            <label for="keywords" class="block text-gray-600 text-sm font-medium mb-2">Keywords</label>
            <input type="text" name="keywords" id="keywords"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                value="<?= set_value('keywords', $article['keywords']) ?>"
                placeholder="Enter comma-separated keywords">
        </div>
        <!-- Abstract textarea -->
        <div class="mb-4">
            <label for="abstract" class="block text-gray-600 text-sm font-medium mb-2">Abstract</label>
            <textarea name="abstract" id="editor"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                rows="6"><?= set_value('abstract', $article['abstract']) ?></textarea>

            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        editor.setData('<?= htmlspecialchars_decode(set_value('abstract', $article['abstract'])) ?>');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>

        <!-- Submit button -->
        <button type="submit"
            class="bg-[#7EB077] hover:bg-[#02972F96] text-white font-bold py-2 px-4 rounded-xl w-full">Update</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const addAuthorButton = document.getElementById('add-author');
    const authorContainer = document.getElementById('author-list');

    addAuthorButton.addEventListener('click', function () {
        const authorItem = document.createElement('div');
        authorItem.className = 'author-item mb-2';

        const newSelect = document.createElement('select');
        newSelect.name = 'authors[]';
        newSelect.className = 'w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500';
        newSelect.setAttribute('required', true);
        <?php foreach ($authors as $author): ?>
            const option<?= $author['auid'] ?> = document.createElement('option');
            option<?= $author['auid'] ?>.value = '<?= $author['auid'] ?>';
            option<?= $author['auid'] ?>.textContent = '<?= $author['author_name'] ?>';
            newSelect.appendChild(option<?= $author['auid'] ?>);
        <?php endforeach; ?>

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'remove-author bg-[#FF0000] hover:bg-[#FF7F7F] text-white font-bold py-2 px-4 rounded-xl ml-2';
        removeButton.textContent = 'Remove';

        removeButton.addEventListener('click', function () {
            authorItem.parentNode.removeChild(authorItem);
        });

        authorItem.appendChild(newSelect);
        authorItem.appendChild(removeButton);
        authorContainer.appendChild(authorItem);
    });

    // Event delegation for remove buttons
    authorContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-author')) {
            const authorItem = event.target.closest('.author-item');
            if (authorItem) {
                authorItem.parentNode.removeChild(authorItem);
            }
        }
    });
});
</script>
