<div>
    <h1>Edit News</h1>
    <div>
        <form method="post" action="index.php">
            <input type="hidden" name="news_edit_id" value="{$edit_news[0]}">
            <label>Edit title:<br>
                <input type="text" name="edit_news_title" value="{$edit_news[1]}">
            </label><br>
            <label>Edit content:<br>
                <textarea name="edit_news_content" rows="10" cols="100">
                    {$edit_news[2]}
                </textarea>
            </label><br>
            <label>Edit optional image link: <br>
                <input type="text" name="edit_news_link" value="{$edit_news[3]}">
            </label><br>
            <input type="submit" name="submit_edit_news" value="Edit news">
        </form>
    </div>
</div>