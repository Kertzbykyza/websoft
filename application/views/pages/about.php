<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card {
            border-width: 1px;
            border-color: #000000;
        }

        .italic {
            font-style: italic;
            color: #6B7280;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <img src="<?= 'http://localhost/online_publication-main/assets/cover.jpg'; ?>" alt="Cover Image" class="w-full rounded-lg" style="height: 200px; object-fit: cover;">

        <div class="mx-auto max-w-auto mt-4 p-5 bg-white rounded-lg shadow-md">
            <?php
            // Assuming $this->db is your database connection object or variable
            
            // Fetch all volumes that are published
            $volumes = $this->db->query("SELECT * FROM volume WHERE published = 1 ORDER BY volumeid DESC")->result_array();

            // Loop through each volume
            foreach ($volumes as $volume) {
                $vol_id = $volume['volumeid'];

                // Fetch articles for this volume that are published
                // $articles = $this->db->query("
                // SELECT 
                //     article_author.*, 
                //     authors.*, 
                //     articles.*, 
                //     volume.* 
                // FROM 
                //     article_author 
                //     INNER JOIN authors ON article_author.audid = authors.auid 
                //     INNER JOIN articles ON article_author.article_id = articles.articleid 
                //     INNER JOIN volume ON articles.volumeid = volume.volumeid 
                // WHERE 
                //     volume.volumeid = ? AND volume.published = 1
                // ORDER BY 
                //     articles.articleid DESC", // Adjusted ORDER BY clause
                //     array($vol_id)
                // )->result_array();
            
                // Display volume details and articles if there are any
                if (!empty($articles)) {
                    ?>
                    <div class="mt-5">
                        <h2 class="text-center font-bold text-2xl"><?= $volume['vol_name']; ?></h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($articles as $article):
                                if ($article['volumeid'] == $volume["volumeid"]):
                                    ?>
                                    <div class="card mt-4 p-4 border rounded-lg border-green-500 flex items-center">
                                        <div class="mr-3">
                                            <img src="<?= base_url() ?>assets/filecover.png" alt="File Icon" class="h-35 w-40 object-cover rounded">
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-xl"><?= $article['title']; ?></h4>
                                            <p class="mt-2"><span class="font-bold">Author/s:</span>
                                                <ul class="list-disc list-inside">
                                                    <?php
                                                    foreach ($article_authors as $a):
                                                        if ($a['article_id'] == $article["articleid"]):
                                                            foreach ($authors as $auth):
                                                                if ($auth["auid"] == $a["audid"]):
                                                                    echo '<li class="italic text-gray-600">' . $auth["author_name"] . '</li>';
                                                                endif;
                                                            endforeach;
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </ul>
                                            </p>
                                            <p class="mt-2"><span class="font-bold">Keywords: </span><?= $article['keywords']; ?></p>
                                            <p class="mt-2"><span class="font-bold">Abstract: </span><?= $article['abstract']; ?></p>
                                            <?php if (!empty($article['filename'])): ?>
                                                <div class="mt-2"><span class="font-bold">File:</span>
                                                    <a href="<?= 'http://localhost/online_publication-main/assets/' . $article['filename']; ?>" class="text-blue-500 underline"><?= $article['filename']; ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
