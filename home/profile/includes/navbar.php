<main>
        <header>
            <div class="tb">
                <div class="td" id="logo">
                    <a href="index.php"><i class="fab fa-facebook-square"></i></a>
                </div>
                <?php 
                if (isset($_SESSION["user_id"])) {
                    echo ' <div class="td" id="search-form" >
                    <form method="get" action="search.php" onsubmit="return validateField()">
                    <select name="location" style="display: none;">
                        <option value="emails">Emails</option>
                        <option value="names">Names</option>
                        <option value="hometowns">Hometowns</option>
                        <option value="posts" selected>Posts</option>
                    </select>

                        <input type="text" placeholder="Search Facebook" style="line-height: unset;">
                        <button type="submit" value="Search" id="querybutton"><i class="material-icons">search</i></button>
                    </form>

            
                </div>
                <div class="td" id="f-name-l"><span>Hi, '.$_SESSION["username"].'</span></div>
                <div class="td" id="i-links">
                    <div class="tb">
                        <div class="td" id="m-td">
                            <div class="tb" style="display: flex;">
                                <a href="requests.php"><span class="td m-active" style="<?php echo '.$row['count'].' ?>"><i class="material-icons">person_add</i></span></a>
                                <a href="./Pyper/"><span class="td"><i class="material-icons">chat_bubble</i></span></a>
                                <a href="requests.php"><span class="td m-active"><i class="material-icons">notifications</i></span></a>
                            </div>
                        </div>
                        <div class="td">
                            <a href="profile.php" id="p-link">
                                <img src="https://imagizer.imageshack.com/img921/3072/rqkhIb.jpg">
                            </a>
                        </div>
                    </div>
                </div>';
                } else {
                    echo '<div class="td" id="f-name-l" 
                    style="width: 10%;
                    color: #fff;
                    font-weight: bold;
                    white-space: unset;
                    padding: 0;">
                    <a href="login.php">Register/Login</a></div>';
                }
                
                
                ?>
                

            </div>
        </header>
</main>

<script>
function validateField(){
    var query = document.getElementById("query");
    var button = document.getElementById("querybutton");
    if(query.value == "") {
        query.placeholder = 'Type something!';
        return false;
    }
    return true;
}
</script>


