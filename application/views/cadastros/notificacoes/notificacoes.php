<table id="dgNotificacoes"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>notificacoes/listar"
        toolbar="#toolbarNotificacao" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idnotificacao" width="10">ID</th>
            <th field="nome_aluno_notificacao" width="40">ALUNO</th>
            <th field="assunto" width="40">ASSUNTO</th>
            <th field="situacao" width="10" align="center" formatter="formataSituacaoNotificacao">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarNotificacao">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novaNotificacao()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarNotificacao()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaNotificacoes" searcher='buscaNotificacao' style="width:30%">
    <div id='menuBuscaNotificacoes' style='width:auto'>
        <div name='idnotificacao'>ID</div>
        <div name='nome_aluno_notificacao'>ALUNO</div>
    </div>
</div>

<div id="dlgNotificacoes" class="easyui-dialog" style="width:680px;height:400px" 
        closed="true" buttons="#dlgNotificacoesButtons" modal="true">
    <form id="formNotificacoes" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <select class="easyui-combobox" label="Usuário/Aluno:" labelPosition="top" id="fkidusuario" name="fkidusuario" panelHeight="auto" style="width:100%;">
                        <?php foreach ($dados_usuario_notificacao as $usunot) { 
                            echo "<option value='".$usunot->idusuario."'>".$usunot->nome."</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Assunto:" labelPosition="top" id="assunto" name="assunto" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Mensagem:" labelPosition="top" id="mensagem" name="mensagem" style="width:100%;height:120px" required="true" multiline="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-checkbox" label="Enviar para todos os alunos" labelPosition="top" id="todosalunos" name="todosalunos" value="1">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgNotificacoesButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgNotificacoes').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarNotificacao()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaNotificacao(value,name){
    if(name == 'idnotificacao'){
        $('#dgNotificacoes').datagrid('load',{
            idnotificacao: value
        });
    }else if(name == 'nome_aluno_notificacao'){
        $('#dgNotificacoes').datagrid('load',{
            nome_aluno_notificacao: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoNotificacao(value,row)
{
    if (value == '0')
    {
        return '<i class="fa fa-calendar fa-lg" style="color:orange"></i>';
    } 
    else if (value == '1')
    {
        return '<i class="fa fa-check-square fa-lg" style="color:green"></i>';
    }
    else if (value == '2')
    {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgNotificacoes').datagrid({
    onDblClickCell: function(index,field,value){
        editarNotificacao();
    }
});

// NOVO
function novaNotificacao(){
    $('#dlgNotificacoes').dialog('open').dialog('center').dialog('setTitle','Nova Notificação');
    $('#formNotificacoes').form('clear');
    url = '<?php base_url();?>notificacoes/cadastrar';
}

// EDITAR
function editarNotificacao(){
    var row = $('#dgNotificacoes').datagrid('getSelected');
    if (row != null){
        $('#dlgNotificacoes').dialog('open').dialog('center').dialog('setTitle','Editar Notificação');
        $('#formNotificacoes').form('load',row);
        url = '<?php base_url();?>notificacoes/atualizar/'+row.idnotificacao;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarNotificacao(){
    $('#formNotificacoes').form('submit',{
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
                $('#dlgNotificacoes').dialog('close');
                $('#dgNotificacoes').datagrid('reload');
            }
        }
    });
}

</script>