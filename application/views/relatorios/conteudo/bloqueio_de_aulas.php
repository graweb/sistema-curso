<table
    class="easyui-datagrid"
    fit="true"
    url="<?php base_url();?>relatorios/listar_bloqueio_de_aulas/<?php echo $info_professor;?>/<?php echo $info_professor_de;?>/<?php echo $info_professor_ate;?>"
    pagination="true"
    rownumbers="true"
    fitColumns="true"
    singleSelect="true"
    striped="true"
    >
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="professor" width="50">PROFESSOR</th>
            <th field="dia" width="20">DIA</th>
            <th field="horainicio" formatter="formataHoraDe" width="15">DE</th>
            <th field="horafim" formatter="formataHoraAte" width="15">ATÉ</th>
        </tr>
    </thead>
</table>

<script type="text/javascript">
// FORMATA HORA
function formataHoraDe(value,row)
{
    return value+'hs';
}

// FORMATA HORA
function formataHoraAte(value,row)
{
    return value+'hs';
}
</script>