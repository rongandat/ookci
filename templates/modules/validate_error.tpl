{if count($validerrors)>0 }
<div class="error">
    <div class="message">{$langs.ERROR_OCCURED_NOTICE}</div>
    <ul>
    {section name=error_index loop=$validerrors}
    <li><strong>{$validerrors[error_index].field}:</strong>{$validerrors[error_index].message}</li>
    {/section}
    </ul>
</div>
{/if}