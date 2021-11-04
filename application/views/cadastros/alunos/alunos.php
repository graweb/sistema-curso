<table id="dgAlunos"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>alunos/listar"
        toolbar="#toolbarAluno" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idaluno" width="10">ID</th>
            <th field="nome_aluno" width="60">ALUNO</th>
            <th field="celular" width="10">CELULAR</th>
            <th field="datanascimento" width="20" align="center">DATA NASCIMENTO</th>
        </tr>
    </thead>
</table>
<div id="toolbarAluno">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoAluno()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarAluno()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaAlunos" searcher='buscaAluno' style="width:30%">
    <div id='menuBuscaAlunos' style='width:auto'>
        <div name='idaluno'>ID</div>
        <div name='nome_aluno'>ALUNO</div>
    </div>
</div>

<div id="dlgAlunos" class="easyui-dialog" style="width:680px;height:420px" 
        closed="true" buttons="#dlgAlunosButtons" modal="true">
    <form id="formAluno" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td colspan="2">
                    <select class="easyui-combobox" label="Usuário:" labelPosition="top" id="fkidusuario" name="fkidusuario" panelHeight="auto" required="true" style="width:100%;">
                        <?php foreach ($dados_usuario as $usu) { 
                            echo "<option value='".$usu->idusuario."'>".$usu->nome."</option>";
                        } ?>
                    </select>
                </td>
                <td>
                    <input class="easyui-datebox" label="Data Nascimento:" labelPosition="top" id="datanascimento" name="datanascimento" style="width:100%;" required="true" editable="false" data-options="formatter:formatarDataComboDtNasc,parser:formatarDataComboParserDtNasc">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="easyui-textbox" label="Celular:" labelPosition="top" id="celular" name="celular" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Nível:" labelPosition="top" id="nivel" name="nivel" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="CEP:" labelPosition="top" id="cep" name="cep" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="UF:" labelPosition="top" id="uf" name="uf" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Estado:" labelPosition="top" id="estado" name="estado" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="easyui-textbox" label="Cidade:" labelPosition="top" id="cidade" name="cidade" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Bairro:" labelPosition="top" id="bairro" name="bairro" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="easyui-textbox" label="Logradouro:" labelPosition="top" id="logradouro" name="logradouro" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Tipo Logradouro:" labelPosition="top" id="tipologradouro" name="tipologradouro" style="width:100%;" required="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgAlunosButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAlunos').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarAluno()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaAluno(value,name){
    if(name == 'idaluno'){
        $('#dgAlunos').datagrid('load',{
            idaluno: value
        });
    }else if(name == 'nome_aluno'){
        $('#dgAlunos').datagrid('load',{
            nome_aluno: value
        });
    }
}

// FORMATA A DATA
function formatarDataComboDtNasc(date){
    return [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
}

// FORMATA A DATA
function formatarDataComboParserDtNasc(s){
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    return date;
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgAlunos').datagrid({
    onDblClickCell: function(index,field,value){
        editarAluno();
    }
});

// NOVO
function novoAluno(){
    $('#dlgAlunos').dialog('open').dialog('center').dialog('setTitle','Novo Aluno');
    $('#formAluno').form('clear');
    url = '<?php base_url();?>alunos/cadastrar';
}

// EDITAR
function editarAluno(){
    var row = $('#dgAlunos').datagrid('getSelected');
    if (row != null){
        $('#dlgAlunos').dialog('open').dialog('center').dialog('setTitle','Editar Aluno');
        $('#formAluno').form('load',row);
        url = '<?php base_url();?>alunos/atualizar/'+row.idaluno;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarAluno(){
    $('#formAluno').form('submit',{
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
                $('#dlgAlunos').dialog('close');
                $('#dgAlunos').datagrid('reload');
            }
        }
    });
}

</script>