{if count($validerrors)>0 }
<div class="albox errorbox" style="z-index: 270;">
    <ul>
        {section name=error_index loop=$validerrors}
        <li><strong>{$validerrors[error_index].field}:</strong> {$validerrors[error_index].message}</li>
        {/section}
    </ul>
    <a class="close tips" href="#" original-title="close">close</a>
</div>
{/if}