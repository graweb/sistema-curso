<table id="dgMateriaAplicadaPorAluno" 
    class="easyui-datagrid"
    fit="true"
    url="<?php base_url();?>relatorios/listar_materia_aplicada_por_aluno/<?php echo $info_aluno;?>/<?php echo $info_aluno_de;?>/<?php echo $info_aluno_ate;?>"
    toolbar="#toolbarMateriaAplicadaPorAluno" 
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
<div id="toolbarMateriaAplicadaPorAluno">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-eye fa-lg" plain="true" onclick="infoMateriaAplicada()">Informações</a>
</div>

<!-- MODAL FINALIZAR -->
<div id="dlgMateriaAplicadaPorAluno" class="easyui-dialog" style="width:660px;height:410px"
        closed="true" buttons="#dlgMateriaAplicadaPorAluno" modal="true">
    <form id="formMateriaAplicadaPorAluno" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Matéria dada:" labelPosition="top" id="materia" name="materia" style="width:100%;" readonly="false">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Fala:" labelPosition="top" id="fala" name="fala" panelHeight="auto" editable="false" readonly="false" style="width:100%;">
                        <option value="O">Ótimo</option>
                        <option value="B">Bom</option>
                        <option value="R">Regular</option>
                        <option value="F">Fraco</option>
                        <option value="N">Não Avaliado</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Audição:" labelPosition="top" id="audicao" name="audicao" panelHeight="auto" editable="false" readonly="false" style="width:100%;">
                        <option value="O">Ótimo</option>
                        <option value="B">Bom</option>
                        <option value="R">Regular</option>
                        <option value="F">Fraco</option>
                        <option value="N">Não Avaliado</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Leitura:" labelPosition="top" id="leitura" name="leitura" panelHeight="auto" editable="false" readonly="false" style="width:100%;">
                        <option value="O">Ótimo</option>
                        <option value="B">Bom</option>
                        <option value="R">Regular</option>
                        <option value="F">Fraco</option>
                        <option value="N">Não Avaliado</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Escrita:" labelPosition="top" id="escrita" name="escrita" panelHeight="auto" editable="false" readonly="false" style="width:100%;">
                        <option value="O">Ótimo</option>
                        <option value="B">Bom</option>
                        <option value="R">Regular</option>
                        <option value="F">Fraco</option>
                        <option value="N">Não Avaliado</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgMateriaAplicadaPorAluno">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgMateriaAplicadaPorAluno').dialog('close')" style="width:90px">Fechar</a>
</div>

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

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgMateriaAplicadaPorAluno').datagrid({
    onDblClickCell: function(index,field,value){
        infoMateriaAplicada();
    }
});

// VR INFORMAÇÕES
function infoMateriaAplicada()
{
    var row = $('#dgMateriaAplicadaPorAluno').datagrid('getSelected');

    if (row != null)
    {
        $('#dlgMateriaAplicadaPorAluno').dialog('open').dialog('center').dialog('setTitle','Informações Matéria Aplicada');
        $('#formMateriaAplicadaPorAluno').form('load',row);
    } 
    else 
    {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}
</script>