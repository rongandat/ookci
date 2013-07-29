{if count($feedbackmsgs)>0 }

<div class="albox succesbox" style="z-index: 290;">
    {section name=fb_index loop=$feedbackmsgs}
    <ul>
        {section name=fb_index loop=$feedbackmsgs}
        <li>{$feedbackmsgs[fb_index]}</li>
        {/section}
    </ul>
    {/section}
    <a class="close tips" href="#" original-title="close">close</a>
</div>
{/if}
