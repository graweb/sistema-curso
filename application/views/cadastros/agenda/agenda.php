<table id="dgAgenda"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>agenda/listar"
        toolbar="#toolbarAgenda" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true"
        >
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idagenda" width="10">ID</th>
            <th field="nome_aluno" width="30">ALUNO</th>
            <th field="professor" width="30">PROFESSOR</th>
            <th field="dia" width="10">DIA</th>
            <th field="horainicio" formatter="formataHoraDe" width="5">DE</th>
            <th field="horafim" formatter="formataHoraAte" width="5">ATÉ</th>
            <th field="situacao" width="10" align="center" formatter="formataSituacaoAgenda">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarAgenda">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoAgenda()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarAgenda()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="cancelarAgenda()">Cancelar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-check fa-lg" plain="true" onclick="confirmarAgenda()">Confirmar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-check-square fa-lg" plain="true" onclick="finalizarAgenda()">Finalizar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaAgenda" searcher='buscaAgenda' style="width:30%">
    <div id='menuBuscaAgenda' style='width:auto'>
        <div name='idagenda'>ID</div>
        <div name='nome_aluno'>ALUNO</div>
        <div name='professor'>PROFESSOR</div>
    </div>
</div>

<div id="dlgAgenda" class="easyui-dialog" style="width:690px;height:360px" 
        closed="true" buttons="#dlgAgendaButtons" modal="true">
    <form id="formAgenda" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <input type="hidden" id="nome_aluno_email" name="nome_aluno_email" value="">
            <input type="hidden" id="email_aluno" name="email_aluno" value="">
            <tr>
                <td colspan="3">
                    <select class="easyui-combobox" label="Aluno:" labelPosition="top" id="fkidusuario" name="fkidusuario" panelHeight="auto" required="true" style="width:100%;">
                        <?php foreach ($dados_aluno as $alun) { 
                            echo "<option value='".$alun->idusuario."'>".$alun->nome."</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <select class="easyui-combobox" label="Professor:" labelPosition="top" id="professor" name="professor" panelHeight="auto" required="true" style="width:100%;">
                        <?php foreach ($dados_professores as $prof) { 
                            echo "<option value='".$prof->nome."'>".$prof->nome."</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-datebox" label="Dia:" labelPosition="top" id="dia" name="dia" style="width:100%;" required="true" editable="false" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser">
                </td>
                <td>
                    <input class="easyui-maskedbox" mask="99:99" label="Hora início:" id="horainicio" name="horainicio" labelPosition="top" style="width:100%" required="true">
                </td>
            </tr>
            <tr>
                <td>
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
<div id="dlgAgendaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAgenda').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarAgenda()" style="width:90px">Salvar</a>
</div>

<!-- MODAL CANCELAR -->
<div id="dlgAgendaCancelar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgAgendaButtonsCancelar" modal="true">
    <form id="formAgendaCancelar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="fkidaluno_cancelar_agenda" name="fkidaluno_cancelar_agenda" value="">
        <input type="hidden" id="data_cancelar_agenda" name="data_cancelar_agenda" value="">
        <input type="hidden" id="situacao_cancelar_agenda" name="situacao_cancelar_agenda" value="3">
        <h3 style="text-align: center;">Deseja cancelar esse agendamento?</h3>
    </form>
</div>
<div id="dlgAgendaButtonsCancelar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAgendaCancelar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarAgendaCancelar()" style="width:90px">Salvar</a>
</div>

<!-- MODAL CONFIRMAR -->
<div id="dlgAgendaConfirmar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgAgendaButtonsConfirmar" modal="true">
    <form id="formAgendaConfirmar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="fkidusuario_confirmar_agenda" name="fkidusuario_confirmar_agenda" value="">
        <input type="hidden" id="situacao_confirmar_agenda" name="situacao_confirmar_agenda" value="1">
        <h3 style="text-align: center;">Deseja confirmar esse agendamento?</h3>
    </form>
</div>
<div id="dlgAgendaButtonsConfirmar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAgendaConfirmar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarAgendaConfirmar()" style="width:90px">Salvar</a>
</div>

<!-- MODAL FINALIZAR -->
<div id="dlgAgendaFinalizar" class="easyui-dialog" style="width:660px;height:410px"
        closed="true" buttons="#dlgAgendaButtonsFinalizar" modal="true">
    <form id="formAgendaFinalizar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="fkidusuariofinalizar" name="fkidusuariofinalizar" value="">
        <input type="hidden" id="horainiciofinalizar" name="horainiciofinalizar" value="">
        <input type="hidden" id="horafimfinalizar" name="horafimfinalizar" value="">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Matéria dada:" labelPosition="top" id="materia" name="materia" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Fala:" labelPosition="top" id="fala" name="fala" panelHeight="auto" editable="false" required="true" style="width:100%;">
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
                    <select class="easyui-combobox" label="Audição:" labelPosition="top" id="audicao" name="audicao" panelHeight="auto" editable="false" required="true" style="width:100%;">
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
                    <select class="easyui-combobox" label="Leitura:" labelPosition="top" id="leitura" name="leitura" panelHeight="auto" editable="false" required="true" style="width:100%;">
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
                    <select class="easyui-combobox" label="Escrita:" labelPosition="top" id="escrita" name="escrita" panelHeight="auto" editable="false" required="true" style="width:100%;">
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
<div id="dlgAgendaButtonsFinalizar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgAgendaFinalizar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarAgendaFinalizar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA USUARIO
function buscaAgenda(value,name)
{
    if(name == 'idagenda'){
        $('#dgAgenda').datagrid('load',{
            idagenda: value
        });
    }else if(name == 'nome_aluno'){
        $('#dgAgenda').datagrid('load',{
            nome_aluno: value
        });
    }else if(name == 'professor'){
        $('#dgAgenda').datagrid('load',{
            professor: value
        });
    }
}

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

// FORMATA SITUAÇÃO
function formataSituacaoAgenda(value,row)
{
    if (value == '0')
    {
        return '<i class="fa fa-calendar fa-lg" style="color:orange" title="Marcado" class="easyui-tooltip"></i>';
    } 
    else if (value == '1')
    {
        return '<i class="fa fa-check fa-lg" style="color:blue" title="Confirmado" class="easyui-tooltip"></i>';
    }
    else if (value == '2')
    {
        return '<i class="fa fa-check-square fa-lg" style="color:green" title="Concluído" class="easyui-tooltip"></i>';
    }
    else if (value == '3')
    {
        return '<i class="fa fa-ban fa-lg" style="color:red" title="Cancelado" class="easyui-tooltip"></i>';
    }
}

// FORMATA A DATA
function formatarDataCombo(date){
    return [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
}

// FORMATA A DATA
function formatarDataComboParser(s){
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    return date;
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgAgenda').datagrid({
    onDblClickCell: function(index,field,value){
        editarAgenda();
    }
});

// NOVO
function novoAgenda(){
    $('#dlgAgenda').dialog('open').dialog('center').dialog('setTitle','Novo Agendamento');
    $('#formAgenda').form('clear');
    url = '<?php base_url();?>agenda/cadastrar';
}

// EDITAR
function editarAgenda()
{
    var row = $('#dgAgenda').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 2)
        {
            $.messager.alert('Atenção','Você não pode editar uma aula concluída!','warning');
        }
        else
        {
            $('#dlgAgenda').dialog('open').dialog('center').dialog('setTitle','Editar Agendamento');
            $('#formAgenda').form('load',row);
            $('#nome_aluno_email').val(row.nome_aluno);
            $('#email_aluno').val(row.email);
            $('#senha').textbox('disable');
            $('#senha').textbox('clear');
            url = '<?php base_url();?>agenda/atualizar/'+row.idagenda;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// CANCELAR
function cancelarAgenda()
{
    var row = $('#dgAgenda').datagrid('getSelected');
    if (row != null)
    {
        if(row.situacao == 2)
        {
            $.messager.alert('Atenção','Você não pode cancelar uma aula concluída!','warning');
        }
        else if(row.situacao == 3)
        {
            $.messager.alert('Atenção','Esse agendamento já está cancelado!','warning');
        }
        else
        {
            $('#dlgAgendaCancelar').dialog('open').dialog('center').dialog('setTitle','Cancelar Agendamento');
            $('#fkidaluno_cancelar_agenda').val(row.fkidusuario);
            $('#data_cancelar_agenda').val(row.dia);
            url = '<?php base_url();?>agenda/cancelar/'+row.idagenda;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// CONFIRMAR
function confirmarAgenda()
{
    var row = $('#dgAgenda').datagrid('getSelected');
    if (row != null)
    {
        if(row.situacao == 1 || row.situacao == 2 || row.situacao == 3)
        {
            $.messager.alert('Atenção','Você só pode confirmar uma agenda com a situação marcado.','warning');
        }
        else
        {
            $('#dlgAgendaConfirmar').dialog('open').dialog('center').dialog('setTitle','Confirmar Agendamento');
            $('#fkidusuario_confirmar_agenda').val(row.fkidusuario);
            url = '<?php base_url();?>agenda/confirmar/'+row.idagenda;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// FINALIZAR
function finalizarAgenda()
{
    var row = $('#dgAgenda').datagrid('getSelected');

    if (row != null)
    {
        if(row.situacao == 0 || row.situacao == 2 || row.situacao == 3)
        {
            $.messager.alert('Atenção','Você só pode finalizar uma agenda com a situação confirmada.','warning');
        }
        else
        {
            $('#dlgAgendaFinalizar').dialog('open').dialog('center').dialog('setTitle','Finalizar Agendamento');
            $('#formAgendaFinalizar').form('clear');
            url = '<?php base_url();?>agenda/finalizar/'+row.idagenda;
            $('#fkidusuariofinalizar').val(row.fkidusuario);
            $('#horainiciofinalizar').val(row.horainicio);
            $('#horafimfinalizar').val(row.horafim);
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarAgenda(){
    $('#formAgenda').form('submit',{
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
                $('#dlgAgenda').dialog('close');
                $('#dgAgenda').datagrid('reload');
            }
        }
    });
}

// CANCELAR
function salvarAgendaCancelar(){
    $('#formAgendaCancelar').form('submit',{
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
                $('#dlgAgendaCancelar').dialog('close');
                $('#dgAgenda').datagrid('reload');
            }
        }
    });
}

// CONFIRMAR
function salvarAgendaConfirmar(){
    $('#formAgendaConfirmar').form('submit',{
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
                $('#dlgAgendaConfirmar').dialog('close');
                $('#dgAgenda').datagrid('reload');
            }
        }
    });
}

// FINALIZAR
function salvarAgendaFinalizar(){
    $('#formAgendaFinalizar').form('submit',{
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
                $('#dlgAgendaFinalizar').dialog('close');
                $('#dgAgenda').datagrid('reload');
            }
        }
    });
}

</script>