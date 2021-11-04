<table
    class="easyui-datagrid"
    fit="true"
    url="<?php base_url();?>relatorios/listar_pacotes_por_aluno/<?php echo $id_aluno_pacote;?>"
    pagination="true"
    rownumbers="true"
    fitColumns="true"
    singleSelect="true"
    striped="true"
    >
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="nome_aluno_pacote" width="50">ALUNO</th>
            <th field="creditohoras" formatter="formataCreditoHoras" width="15">CRÉDITO</th>
            <th field="horasconsumidas" formatter="formarHorasConsumidas" width="15">CONSUMIDO</th>
            <th field="validade" width="20">VALIDADE</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
// FORMATA HORA
function formataCreditoHoras(value,row)
{
    return value+'hs';
}

// FORMATA HORA
function formarHorasConsumidas(value,row)
{
    return value+'hs';
}
</script>