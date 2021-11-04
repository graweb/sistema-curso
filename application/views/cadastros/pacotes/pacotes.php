<table id="dgPacotes"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>pacotes/listar"
        toolbar="#toolbarPacote" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idalunopacote" width="10">ID</th>
            <th field="nome_aluno_pacote" width="40">ALUNO</th>
            <th field="creditohoras" formatter="formataHoraCredito" width="15">CRÉDITO HORAS</th>
            <th field="horasconsumidas" formatter="formataHorasConsumidas" width="15">HORAS CONSUMIDAS</th>
            <th field="validade" width="10" align="center">VALIDADE</th>
            <th field="situacao" width="10" align="center" formatter="formataSituacaoAlunoPacote">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarPacote">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoPacote()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarPacote()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="cancelarPacote()">Cancelar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-check fa-lg" plain="true" onclick="confirmarPacote()">Confirmar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-check-square fa-lg" plain="true" onclick="finalizarPacote()">Finalizar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaAlunosPacote" searcher='buscaAlunoPacote' style="width:30%">
    <div id='menuBuscaAlunosPacote' style='width:auto'>
        <div name='idalunopacote'>ID</div>
        <div name='nome_aluno_pacote'>ALUNO</div>
    </div>
</div>

<div id="dlgPacotes" class="easyui-dialog" style="width:680px;height:300px" 
        closed="true" buttons="#dlgPacotesButtons" modal="true">
    <form id="formAlunoPacote" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <select class="easyui-combobox" label="Usuário:" labelPosition="top" id="fkidusuario" name="fkidusuario" panelHeight="auto" required="true" style="width:100%;">
                        <?php foreach ($dados_usuario_pacote as $usuPac) { 
                            echo "<option value='".$usuPac->idusuario."'>".$usuPac->nome."</option>";
                        } ?>
                    </select>
                </td>
                <td>
                    <select class="easyui-combobox" label="Pacote:" labelPosition="top" id="tipopacote" name="tipopacote" panelHeight="auto" editable="false" required="true" style="width:100%;" 
                    data-options="
                        onSelect: function(rec){
                            var valor = rec.value;
                            $('#creditohoras').textbox('setValue', valor);
                        }">
                        <option value="1">1 hora - Individual</option>
                        <option value="4">4 horas - Individual 1x</option>
                        <option value="8">8 horas - Individual 1x</option>
                        <option value="8">8 horas - Individual 2x</option>
                        <option value="12">12 horas - Individual 2x</option>
                        <option value="4">4 horas - Grupo 2 pessoas 1x</option>
                        <option value="4">4 horas - Grupo 3 pessoas 1x</option>
                        <option value="8">8 horas - Grupo 2 pessoas 2x</option>
                        <option value="8">8 horas - Grupo 3 pessoas 2x</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Saldo Horas:" labelPosition="top" id="creditohoras" name="creditohoras" style="width:100%;" required="true" editable="false">
                </td>
                <td>
                    <input class="easyui-textbox" label="Saldo Horas Restante:" labelPosition="top" id="horasconsumidas" name="horasconsumidas" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" disabled="true" style="width:100%;">
                        <option value="0">Marcado</option>
                        <option value="1">Confirmado</option>
                        <option value="2">Concluído</option>
                        <option value="3">Cancelado</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgPacotesButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgPacotes').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarPacote()" style="width:90px">Salvar</a>
</div>

<!-- MODAL CANCELAR -->
<div id="dlgPacoteCancelar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgPacoteButtonsCancelar" modal="true">
    <form id="formPacoteCancelar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_cancelar_pacote" name="situacao_cancelar_pacote" value="3">
        <h3 style="text-align: center;">Deseja cancelar esse pacote?</h3>
    </form>
</div>
<div id="dlgPacoteButtonsCancelar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgPacoteCancelar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarPacoteCancelar()" style="width:90px">Salvar</a>
</div>

<!-- MODAL CONFIRMAR -->
<div id="dlgPacoteConfirmar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgPacoteButtonsConfirmar" modal="true">
    <form id="formPacoteConfirmar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_confirmar_pacote" name="situacao_confirmar_pacote" value="1">
        <h3 style="text-align: center;">Deseja confirmar esse pacote?</h3>
    </form>
</div>
<div id="dlgPacoteButtonsConfirmar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgPacoteConfirmar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarPacoteConfirmar()" style="width:90px">Salvar</a>
</div>

<!-- MODAL FINALIZAR -->
<div id="dlgPacoteFinalizar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgPacoteButtonsFinalizar" modal="true">
    <form id="formPacoteFinalizar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_finalizar_pacote" name="situacao_finalizar_pacote" value="2">
        <h3 style="text-align: center;">Deseja finalizar esse pacote?</h3>
    </form>
</div>
<div id="dlgPacoteButtonsFinalizar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgPacoteFinalizar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarPacoteFinalizar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaAlunoPacote(value,name){
    if(name == 'idalunopacote'){
        $('#dgPacotes').datagrid('load',{
            idalunopacote: value
        });
    }else if(name == 'nome_aluno_pacote'){
        $('#dgPacotes').datagrid('load',{
            nome_aluno_pacote: value
        });
    }
}

// FORMATA HORA
function formataHoraCredito(value,row)
{
    return value+':00hs';
}

// FORMATA HORA
function formataHorasConsumidas(value,row)
{
    return value+':00hs';
}

// FORMATA SITUAÇÃO
function formataSituacaoAlunoPacote(value,row)
{
    if (value == '0')
    {
        return '<i class="fa fa-calendar fa-lg" style="color:orange"></i>';
    } 
    else if (value == '1')
    {
        return '<i class="fa fa-check fa-lg" style="color:blue"></i>';
    }
    else if (value == '2')
    {
        return '<i class="fa fa-check-square fa-lg" style="color:green"></i>';
    }
    else if (value == '3')
    {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

// FORMATA A DATA
function formatarDataComboValidade(date){
    return [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
}

// FORMATA A DATA
function formatarDataComboParserValidade(s){
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    return date;
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgPacotes').datagrid({
    onDblClickCell: function(index,field,value){
        editarPacote();
    }
});

// NOVO
function novoPacote(){
    $('#dlgPacotes').dialog('open').dialog('center').dialog('setTitle','Novo Pacote');
    $('#formAlunoPacote').form('clear');
    url = '<?php base_url();?>pacotes/cadastrar';
}

// EDITAR
function editarPacote(){
    var row = $('#dgPacotes').datagrid('getSelected');
    if (row != null){
        $('#dlgPacotes').dialog('open').dialog('center').dialog('setTitle','Editar Pacote');
        $('#formAlunoPacote').form('load',row);
        url = '<?php base_url();?>pacotes/atualizar/'+row.idalunopacote;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// CANCELAR
function cancelarPacote()
{
    var row = $('#dgPacotes').datagrid('getSelected');
    if (row != null)
    {
        if(row.situacao == 2)
        {
            $.messager.alert('Atenção','Você não pode cancelar um pacote concluído!','warning');
        }
        else if(row.situacao == 3)
        {
            $.messager.alert('Atenção','Esse pacote já está cancelado!','warning');
        }
        else
        {
            $('#dlgPacoteCancelar').dialog('open').dialog('center').dialog('setTitle','Cancelar Pacote');
            $('#formPacoteCancelar').form('load',row);
            url = '<?php base_url();?>pacotes/cancelar/'+row.idalunopacote;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// CONFIRMAR
function confirmarPacote()
{
    var row = $('#dgPacotes').datagrid('getSelected');

    var pacAberto = true;
    var rows = $('#dgPacotes').datagrid('getRows');
    for(var i=0; i<rows.length; i++){
        
        if(rows[i]['situacao'] == 1 && rows[i]['fkidusuario'] == row.fkidusuario)
        {
            pacAberto = false;
        }
    }

    if(pacAberto == true)
    {
        if (row != null)
        {
            if(row.situacao == 1 || row.situacao == 2 || row.situacao == 3)
            {
                $.messager.alert('Atenção','Você só pode confirmar um pacote com a situação marcado.','warning');
            }
            else
            {
                $('#dlgPacoteConfirmar').dialog('open').dialog('center').dialog('setTitle','Confirmar Pacote');
                $('#formPacoteConfirmar').form('load',row);
                url = '<?php base_url();?>pacotes/confirmar/'+row.idalunopacote;
            }
        } else {
            $.messager.alert('Atenção','Selecione um registro!','warning');
        }
    }
    else
    {
        $.messager.alert('Atenção','Já existe um pacote com crédito para esse aluno. Você deve encerrar o pacote antes de confirmar.','warning');
    }
}

// FINALIZAR
function finalizarPacote()
{
    var row = $('#dgPacotes').datagrid('getSelected');
    if (row != null)
    {
        if(row.situacao == 0 || row.situacao == 2 || row.situacao == 3)
        {
            $.messager.alert('Atenção','Você só pode finalizar um pacote com a situação confirmada.','warning');
        }
        else
        {
            $('#dlgPacoteFinalizar').dialog('open').dialog('center').dialog('setTitle','Finalizar Pacote');
            $('#formPacoteFinalizar').form('load',row);
            url = '<?php base_url();?>pacotes/finalizar/'+row.idalunopacote;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarPacote(){
    $('#formAlunoPacote').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgPacotes').dialog('close');
                $('#dgPacotes').datagrid('reload');
            }
        }
    });
}

// CANCELAR
function salvarPacoteCancelar(){
    $('#formPacoteCancelar').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgPacoteCancelar').dialog('close');
                $('#dgPacotes').datagrid('reload');
            }
        }
    });
}

// CONFIRMAR
function salvarPacoteConfirmar(){
    $('#formPacoteConfirmar').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgPacoteConfirmar').dialog('close');
                $('#dgPacotes').datagrid('reload');
            }
        }
    });
}

// FINALIZAR
function salvarPacoteFinalizar(){
    $('#formPacoteFinalizar').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgPacoteFinalizar').dialog('close');
                $('#dgPacotes').datagrid('reload');
            }
        }
    });
}

</script>