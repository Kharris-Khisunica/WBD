<?php



$activeURL = $_SERVER['REQUEST_URI'];

$links = [
    'Home' => '/home'
];

if (!empty($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'job-seeker':
            $links['History'] = '/history';
            break;
        case 'company':
            $links['Profile'] = '/profile';
            break;
    }
}

function isLinkActive($activeURL, $link)
{
    return $activeURL === $link;
};

?>
<nav>
    <a href="/" class="logo-container">
        <img class="nav-logo" src="/public/asset/logo-wbd.png" alt="logo" />
    </a>
    <div class="hamburger" id="hamburger-btn">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div class="nav-items" id="nav-items">
        <?php
        foreach ($links as $key => $value) {
            $activeLinkClass = isLinkActive($activeURL, $value) ? 'nav-item active' : 'nav-item';
            $lower = strtolower($key);
            $item = <<<"EOT"
                <div class="$activeLinkClass">
                    <a class="nav-icon-container" href="$value">
                        <img src="/public/asset/$lower.png" alt="$key" class="nav-item-icon" />
                        $key
                    </a>
                </div>
            EOT;
            echo $item; 
        }

        if (empty($_SESSION['role'])) {
            $buttons = <<<"EOT"
                <div class="btn-container">
                    <button class="green-outline-btn">Join Us</button>
                    <button class="green-btn">Sign In</button>
                </div>
                EOT;

                echo $buttons;
        }


        ?>
    </div>
</nav>
<script defer src="/public/js/navbar.js"></script>