<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter_ITSD82</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles for the navbar */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: #246613;
            color: #36FF04;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: start;
            }

            .nav-menu {
                width: 100%;
                flex-direction: column;
                align-items: start;
            }

            .nav-item {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar flex justify-between items-center p-4 z-10 relative">
        <div class="flex items-center">
            <img src="<?= base_url('assets/logo.jpg'); ?>" alt="Logo" class="h-14">
        </div>
        <div class="nav-menu flex items-center space-x-6">
            <ul class="flex flex-row items-center space-x-6">
                <li class="nav-item">
                    <a href="home" class="nav-link py-2 px-3 text-[#246613] rounded" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="article" class="nav-link py-2 px-3 text-[#246613] rounded">Latest Issues</a>
                </li>
                <li class="nav-item">
                    <a href="archived" class="nav-link py-2 px-3 text-[#246613] rounded">Archive</a>
                </li>
                <li class="nav-item">
                    <a href="dashboard" class="nav-link py-2 px-3 text-[#246613] rounded">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>
