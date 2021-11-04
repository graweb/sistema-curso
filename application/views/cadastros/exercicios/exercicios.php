<table id="dgExercicios"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>exercicios/listar"
        toolbar="#toolbarExercicios" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idexercicio" width="10">ID</th>
            <th field="tipoquestao" width="20" formatter="formataTipoQuestao">TIPO</th>
            <th field="book" width="5">LIVRO</th>
            <th field="lesson" width="5">LIÇÃO</th>
            <th field="exercicio" width="50">EXERCÍCIO</th>
            <th field="situacao" width="10" align="center" formatter="formataSituacaoExercicio">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarExercicios">
    <a href="javascript:void(0)" class="easyui-menubutton" menu="#menuNovo" iconCls="fa fa-plus fa-lg" plain="true">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarExercicio()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="ativarDesativarExercicio()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaExercicios" searcher='buscaNotificacao' style="width:30%">
    <div id='menuBuscaExercicios' style='width:auto'>
        <div name='idexercicio'>ID</div>
        <div name='book'>BOOK</div>
    </div>
        <div id="menuNovo" style="width:auto">
        <div onclick="novoExercicioMultiplaEscolha()">Múltipla Escolha</div>
        <div onclick="novoExercicioVerdadeiroFalso()">Verdadeiro ou Falso</div>
    </div>
</div>

<div id="dlgExerciciosMultiplaEscolha" class="easyui-dialog" style="width:780px;height:450px;padding:10px;" 
        closed="true" buttons="#dlgExerciciosButtons" modal="true">
    <form id="formExercicios" class="easyui-form" method="post" data-options="novalidate:true">
        <tr>
            <input type="hidden" id="tipoquestao" name="tipoquestao" value="1">
            <td colspan="2">
                <select class="easyui-combobox" label="Livro:" labelPosition="top" id="book" name="book" panelHeight="auto" editable="false" required="true" style="width:100%;">
                    <option value='1'>Livro 1</option>
                    <option value='2'>Livro 2</option>
                    <option value='3'>Livro 3</option>
                    <option value='4'>Livro 4</option>
                    <option value='5'>Livro 5</option>
                </select>
            </td>
            <td>
                <input class="easyui-textbox" label="Lição:" labelPosition="top" id="lesson" name="lesson" style="width:100%;" required="true">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input class="easyui-textbox" label="Exercício:" labelPosition="top" id="exercicio" name="exercicio" style="width:100%;height:80px" required="true" multiline="true">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="easyui-textbox" label="Resposta A:" labelPosition="top" id="respostaa" name="respostaa" style="width:100%;" required="true">
            </td>
            <td>
                <input class="easyui-textbox" label="Resposta B:" labelPosition="top" id="respostab" name="respostab" style="width:100%;" required="true">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="easyui-textbox" label="Resposta C:" labelPosition="top" id="respostac" name="respostac" style="width:100%;" required="true">
            </td>
            <td>
                <input class="easyui-textbox" label="Resposta D:" labelPosition="top" id="respostad" name="respostad" style="width:100%;" required="true">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="easyui-textbox" label="Resposta Correta:" labelPosition="top" id="respostacorreta" name="respostacorreta" style="width:100%;" required="true">
            </td>
            <td>
                <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                    <option value='1'>Ativo</option>
                    <option value='0'>Inativo</option>
                </select>
            </td>
        </tr>
    </form>
</div>
<div id="dlgExerciciosButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExerciciosMultiplaEscolha').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarExercicioMultiplaEscolha()" style="width:90px">Salvar</a>
</div>

<div id="dlgExerciciosVerdadeiroFalso" class="easyui-dialog" style="width:780px;height:450px;padding:10px;" 
        closed="true" buttons="#dlgExerciciosButtonsVerdadeiroFalso" modal="true">
    <form id="formExerciciosVerdadeiroFalso" class="easyui-form" method="post" data-options="novalidate:true">
        <tr>
            <input type="hidden" id="tipoquestao" name="tipoquestao" value="2">
            <td colspan="2">
                <select class="easyui-combobox" label="Livro:" labelPosition="top" id="book" name="book" panelHeight="auto" editable="false" required="true" style="width:100%;">
                    <option value='1'>Livro 1</option>
                    <option value='2'>Livro 2</option>
                    <option value='3'>Livro 3</option>
                    <option value='4'>Livro 4</option>
                    <option value='5'>Livro 5</option>
                </select>
            </td>
            <td>
                <input class="easyui-textbox" label="Lição:" labelPosition="top" id="lesson" name="lesson" style="width:100%;" required="true">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input class="easyui-textbox" label="Exercício:" labelPosition="top" id="exercicio" name="exercicio" style="width:100%;height:80px" required="true" multiline="true">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="easyui-textbox" label="Resposta A:" labelPosition="top" id="respostaatf" name="respostaa" style="width:100%;" value="True" editable="false">
            </td>
            <td>
                <input class="easyui-textbox" label="Resposta B:" labelPosition="top" id="respostabtf" name="respostab" style="width:100%;" value="False" editable="false">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="easyui-textbox" label="Resposta Correta:" labelPosition="top" id="respostacorreta" name="respostacorreta" style="width:100%;" required="true">
            </td>
            <td>
                <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                    <option value='1'>Ativo</option>
                    <option value='0'>Inativo</option>
                </select>
            </td>
        </tr>
    </form>
</div>
<div id="dlgExerciciosButtonsVerdadeiroFalso">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExerciciosVerdadeiroFalso').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarExercicioVerdadeiroFalso()" style="width:90px">Salvar</a>
</div>

<!-- MODAL ATIVAR/DESATIVAR -->
<div id="dlgExerciciosAtivarDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgUsuarioButtonsDesativar" modal="true">
    <form id="formExercicioAtivarDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="exercicio_ativar_desativar" name="exercicio_ativar_desativar">
        <h3 style="text-align: center;">Deseja ativar/desativar esse exercício?</h3>
    </form>
</div>
<div id="dlgUsuarioButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgExerciciosAtivarDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarExerciciosAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaNotificacao(value,name){
    if(name == 'idexercicio'){
        $('#dgExercicios').datagrid('load',{
            idexercicio: value
        });
    }else if(name == 'nome_aluno_notificacao'){
        $('#dgExercicios').datagrid('load',{
            nome_aluno_notificacao: value
        });
    }
}

// FORMATA TIPO QUESTÃO
function formataTipoQuestao(value,row)
{
    if (value == '1')
    {
        return 'Multipla Escolha';
    }
    else (value == '2')
    {
        return 'Verdadeiro ou Falso';
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoExercicio(value,row)
{
    if (value == '0')
    {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    } 
    else if (value == '1')
    {
        return '<i class="fa fa-check-square fa-lg" style="color:green"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgExercicios').datagrid({
    onDblClickCell: function(index,field,value){
        editarExercicio();
    }
});

// NOVO MULTIPLA ESCOLHA
function novoExercicioMultiplaEscolha()
{
    $('#dlgExerciciosMultiplaEscolha').dialog('open').dialog('center').dialog('setTitle','Novo Exercício');
    $('#formExercicios').form('clear');
    url = '<?php base_url();?>exercicios/cadastrar/false';
}

// NOVO VERDADEIRO FALSO
function novoExercicioVerdadeiroFalso()
{
    $('#dlgExerciciosVerdadeiroFalso').dialog('open').dialog('center').dialog('setTitle','Novo Exercício');
    //$('#formExerciciosVerdadeiroFalso').form('clear');
    url = '<?php base_url();?>exercicios/cadastrar/true';
}

// ATIVAR/DESATIVAR
function ativarDesativarExercicio(){
    var row = $('#dgExercicios').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#exercicio_ativar_desativar').val(0);
        } else {
            $('#exercicio_ativar_desativar').val(1);
        }

        $('#dlgExerciciosAtivarDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Exercício');
        $('#formExercicioAtivarDesativar').form('load',row);
        url = '<?php base_url();?>exercicios/desativar/'+row.idexercicio;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// EDITAR
function editarExercicio()
{
    var row = $('#dgExercicios').datagrid('getSelected');
    if (row != null)
    {
        if(row.tipoquestao == 1)
        {
            $('#dlgExerciciosMultiplaEscolha').dialog('open').dialog('center').dialog('setTitle','Editar Exercício');
            $('#formExercicios').form('load',row);
            url = '<?php base_url();?>exercicios/atualizar/'+row.idexercicio;
        }
        else
        {
            $('#dlgExerciciosVerdadeiroFalso').dialog('open').dialog('center').dialog('setTitle','Editar Exercício');
            $('#formExerciciosVerdadeiroFalso').form('load',row);
            url = '<?php base_url();?>exercicios/atualizar/'+row.idexercicio;
        }
        
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarExercicioMultiplaEscolha(){
    $('#formExercicios').form('submit',{
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
                $('#dlgExerciciosMultiplaEscolha').dialog('close');
                $('#dgExercicios').datagrid('reload');
            }
        }
    });
}

// SALVAR NOVO/EDITAR
function salvarExercicioVerdadeiroFalso(){
    $('#formExerciciosVerdadeiroFalso').form('submit',{
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
                $('#dlgExerciciosVerdadeiroFalso').dialog('close');
                $('#dgExercicios').datagrid('reload');
            }
        }
    });
}

// ATIVAR/DESATIVAR
function salvarExerciciosAtivarDesativar(){
    $('#formExercicioAtivarDesativar').form('submit',{
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
                $('#dlgExerciciosAtivarDesativar').dialog('close');
                $('#dgExercicios').datagrid('reload');
            }
        }
    });
}

</script>