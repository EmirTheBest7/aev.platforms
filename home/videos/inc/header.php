<div class="header">
    <div class="header-left">
        <svg id="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 12h18M3 6h18M3 18h18" /></svg>
        <img class="logo" src="<?php echo LOGO; ?>" />
        
    </div>
    <div class="search-bar mobile-hide">
        <input type="text" placeholder="Search..." />
    </div>
    <div class="user-settings">
        <button class="button uil uil-plus">Upload</button>
        <div class="uil uil-moon dark-light"></div>
        <a href="../channel/"><img class="user-profile" src="<?php echo $_SESSION['user_photo']; ?>" alt=""></a>
        
    </div>
</div>