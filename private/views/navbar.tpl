<nav id="ship">
    <input type="checkbox" id="anchor">
    <label for="anchor" class="anchor">
        <i class="fas fa-ship"></i>
        <i class="fas fa-anchor"></i>
    </label>
    <ul id="navbar">
        <li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=news">News</a></li>
        <li class="stairs"><a href="#">Music</a>
            <ul>
                <li><a href="index.php?page=swing">Swing</a></li>
                <li><a href="index.php?page=rock">Rock</a></li>
                <li><a href="index.php?page=retro">Retro</a></li>
            </ul>
        </li>
        <li><a href="index.php?page=info">Info</a></li>
    </ul>
</nav>
<div class="search-field">
    <form method="get" action="index.php">
        <input type="hidden" name="page" value="news">
        <label>Search for news:<br>
            <input type="text" name="searchterm">
        </label><br>
        <input type="submit" name="submit" value="search">
    </form>
</div>