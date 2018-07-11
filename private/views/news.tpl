<div class="news-head">
    <h1>NEWS</h1>
    <h3>Current page: {$current_page}</h3>
    <br>
</div>

    {foreach from=$articles item=article}
        <div class="smarty-article">
            <h2>{$article[0]}</h2>
            <p>{$article[1]}</p>
            <img src="{$article[2]}" alt="Ello"/>
        </div>
    {/foreach}
<div class="news-pagination">
    {if $current_page gt 1}
        <a href="index.php?page=news&pagenumber={$current_page - 1}" class="news-previous">Grevious Page</a>
    {/if}

    {if $current_page lt $number_of_pages}
        <a href="index.php?page=news&pagenumber={$current_page + 1}" class="news-next">Nextus Page</a>
    {/if}
</div>



