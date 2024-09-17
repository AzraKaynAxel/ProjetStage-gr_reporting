<!--<script src="../../views/js/processingForm.js"></script>-->

<div class="col">
    <div class="card">
        <h2 class="card-header">Détection d'erreur</h2>
        <br>
        <div class="card-body">
            <form id="myForm" action="{$link->getAdminLink('AdminReporting')}" method="post">
                {if isset($formFields) && !empty($formFields)}
                    <div class="form-row">
                        {foreach from=$formFields key=fieldKey item=field}
                            <div class="form-group {if $field.type == 'text' || $field.type == 'date'} col-md-4 {elseif $field.type == 'checkbox'} col-md-3{/if}">
                                <label for="{$field.name}">{$field.label}</label>
                                {if $field.type == 'text' || $field.type == 'date'}
                                    <input type="{$field.type}" name="{$field.name}" placeholder="{$field.placeholder|default:''}" id="{$field.name}" class="form-control"
                                    data-error_target="error_{$field.name}"/>
                                    <div dir="ltr" style="text-overflow: unset">
                                        <span id="error_{$field.name}"></span>
                                    </div>
                                {elseif $field.type == 'checkbox'}
                                    <input type="checkbox" name="{$field.name}" id="{$field.name}" value="{$field.value}" class="form-check-input"/>
                                {elseif $field.type == 'submit'}
                                    <button id="submit" type="submit" name="{$field.name}" class="btn btn-primary">{$field.value}</button>
                                {/if}
                            </div>
                        {/foreach}
                    </div>
                {/if}
            </form>
        </div>
    <button id='refresh' type="button" class="btn btn-secondary">Actualiser</button>
    </div>
</div>

