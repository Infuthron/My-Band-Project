<h1>Edit</h1>
<form method="post" action="index.php">
    <input type="hidden" name="song_edit_id" value="{$edit_song[0]}">
    <label>Choose song type<br>
        <select name="edit_song_kind">
            <option selected="selected" value="{$edit_song[1]}">{$edit_song[1]}</option>
            <option value="swing">Swing</option>
            <option value="rock">Rock</option>
            <option value="retro">Retro</option>
        </select>
    </label><br>
    <label>Song name:<br>
        <input type="text" name="edit_song_name" value="{$edit_song[2]}">
    </label><br>
    <label>Song description:<br>
        <textarea name="edit_song_info" rows="10" cols="100">
            {$edit_song[3]}
        </textarea>
    </label><br>
    <label>Song autor:<br>
        <input type="text" name="edit_song_autor" value="{$edit_song[4]}">
    </label><br>
    <label>Add song YT link:<br>
        <input type="text" name="edit_song_link" value="{$edit_song[4]}">
    </label><br>
    <input type="submit" name="submit_edit_song" value="Edit Song">
</form>