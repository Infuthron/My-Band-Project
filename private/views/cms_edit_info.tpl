<h1>Edit </h1>
<form method="post" action="index.php">
    <input type="hidden" name="info_edit_id" value="{$edit[0]}">
    <input name="info_title" type="text" value="{$edit[1]}">
    <br>
    <textarea name="info_content" rows="10" cols="100">
        {$edit[2]}
    </textarea>
    <br>
    <input type="submit" name="submit_edited_info" value="Submit Changes">
</form>