<div class="cms-add-music-wrapper">
    <h1>Add Song</h1>
    <form action="index.php" method="post">
        <label>Choose song type<br>
            <select name="song_kind">
                <option value="swing">Swing</option>
                <option value="rock">Rock</option>
                <option value="retro">Retro</option>
            </select>
        </label><br>
        <label>Song name:<br>
            <input type="text" name="song_name">
        </label><br>
        <label>Song description:<br>
            <textarea name="song_info" rows="10" cols="100">

            </textarea>
        </label><br>
        <label>Song autor:<br>
            <input type="text" name="song_autor">
        </label><br>
        <label>Add song YT link:<br>
            <input type="text" name="song_link">
        </label><br>
        <input type="submit" name="submit_add_song" value="Add Song">
    </form>
</div>