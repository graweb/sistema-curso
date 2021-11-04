<table
    class="easyui-datagrid"
    fit="true"
    url="<?php base_url();?>relatorios/listar_agenda_do_professor/<?php echo $info_professor;?>/<?php echo $info_professor_de;?>/<?php echo $info_professor_ate;?>"
    pagination="true"
    rownumbers="true"
    fitColumns="true"
    singleSelect="true"
    striped="true"
    >
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="nome_aluno" width="50">ALUNO</th>
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