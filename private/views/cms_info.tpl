<div class="cms-info-wrapper">
    <h1>Info</h1>
    <a href="index.php?page=cms_add_info">Add info article</a>
    <div class="cms-info-content-view">
        {foreach from=$info_contents item=info_content}
            <div class="cms-live-content-info">
                <h4 class="cms-info-h4">{$info_content[1]}</h4>
                <p class="cms-info-part1">
                    {$info_content[2]}
                </p>
            </div>
            <form method="post" action="index.php">
                <input type="hidden" name="delete_id" value="{$info_content[0]}">
                <label> Delete:
                    <input type="checkbox" name="info_delete_check" value="delete">
                </label>
                <input type="submit" name="submit_cms_info_delete" value="Confirm delete">
                <label>
                    <a href="index.php?page=cms_edit_info&id={$info_content[0]}">Edit</a>
                </label>
            </form>
        {/foreach}
    </div>
</div>

<!-- Hidden input type as basic variabele