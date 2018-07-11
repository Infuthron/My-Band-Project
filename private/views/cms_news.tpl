<h1>News</h1>
<div class="cms-news-wrapper">
    <div class="cms-add-news">
        <a href="index.php?page=cms_add_news">Add News</a>
    </div>
    <div class="cms-news-content-view">
        <div>
            <h3>Current page: {$current_page}</h3>
        </div>
        <div>
            {foreach from=$articles item=article}
                <div class="cms-smarty-article">
                    <h2>{$article[0]}</h2>
                    <p>{$article[1]}</p>
                    <img src="{$article[2]}" alt="Ello"/>
                </div>
                <div>
                    <form method="post" action="index.php">
                        <input type="hidden" name="delete_id" value="{$article[3]}">
                        <label> Delete:
                            <input type="checkbox" name="news_delete_check" value="delete">
                        </label>
                        <input type="submit" name="submit_cms_news_delete" value="Confirm delete">
                        <label>
                            <a href="index.php?page=cms_edit_news&id={$article[3]}">Edit</a>
                        </label>
                    </form>
                </div>
            {/foreach}
            <div class="cms-news-pagination">
                {if $current_page gt 1}
                    <a href="index.php?page=cms_news&pagenumber={$current_page - 1}" class="cms-news-previous">Grevious Page</a>
                {/if}

                {if $current_page lt $number_of_pages}
                    <a href="index.php?page=cms_news&pagenumber={$current_page + 1}" class="cms-news-next">Nextus Page</a>
                {/if}
            </div>
        </div>
    </div>
</div>