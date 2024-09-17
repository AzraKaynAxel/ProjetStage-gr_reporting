<div class="container-md">
    {include file='module:gr_reporting/views/templates/admin/form_filter.tpl'}


<table class="table table-striped table-hover">
    <thead class="bg-secondary text-light">
    <tr>
        <th scope="col">Id Erreur</th>
        <th scope="col">Id Commande</th>
        <th scope="col">Référence</th>
        <th scope="col">Date Commande</th>
        <th scope="col">Date Erreur</th>
        <th scope="col">Statut Erreur</th>
        <th scope="col">Libellé Erreur</th>
        <th scope="col">Date de Traitement</th>
    </tr>
    </thead>
    <tbody>
    {foreach from=$orders item=order}
        <tr>
            <td class="custom-secondary-texte">{$order.id}</td>
            <td class="custom-secondary-texte">{$order.id_order}</td>
            <td class="custom-secondary-texte">{$order.reference}</td>
            <td class="custom-secondary-texte">{$order.date_order}</td>
            <td class="custom-secondary-texte">{$order.date_add}</td>
            <td class="custom-secondary-texte">{$order.status_error}</td>
            <td class="custom-secondary-texte">{$order.libelle_error}</td>
            <td class="custom-secondary-texte">{$order.date_update}</td>
        </tr>
    {/foreach}
    </tbody>
</table>

</div>