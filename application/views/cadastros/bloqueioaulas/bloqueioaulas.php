<table id="dgBloqueioAulas"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>bloqueioaulas/listar"
        toolbar="#toolbarBloqueioAula" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true"
        >
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="idagenda" width="10" hidden="true">ID</th>
            <th field="professor" width="60">PROFESSOR</th>
            <th field="dia" width="20">DIA</th>
            <th field="horainicio" formatter="formataHoraDe" width="5">DE</th>
            <th field="horafim" formatter="formataHoraAte" width="5">ATÉ</th>
            <th field="situacao" width="10" align="center" formatter="formataSituacaoAgenda">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarBloqueioAula">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoBloqueioAula()">Novo</a>
    <?php if($this->session->userdata('permissao') == "1") { ?>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-close fa-lg" plain="true" onclick="excluirBloqueioAula()">Excluir</a>
    <?php } ?>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaBloqueioAula" searcher='buscaBloqueioAula' style="width:30%">
    <div id='menuBuscaBloqueioAula' style='width:auto'>
        <div name='professor'>PROFESSOR</div>
    </div>
</div>

<div id="dlgBloqueioAula" class="easyui-dialog" style="width:480px;height:340px" 
        closed="true" buttons="#dlgBloqueioAulaButtons" modal="true">
    <form id="formBloqueioAula" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <select class="easyui-combobox" label="Professor:" labelPosition="top" id="professor" name="professor" panelHeight="auto" required="true" style="width:100%;">
                        <?php foreach ($dados_professores_list as $professor) { 
                            echo "<option value='".$professor->nome."'>".$professor->nome."</option>";
                        } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-datebox" label="Dia:" labelPosition="top" id="dia" name="dia" style="width:100%;" required="true" editable="false" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser">
                </td>
            </tr>
            <td>
                <input class="easyui-maskedbox" mask="99:99" label="Hora início:" id="horainicio" name="horainicio" labelPosition="top" style="width:100%">
            </td>
            <tr>
                <td>
                    <input class="easyui-checkbox" label="O dia todo?" labelPosition="top" id="odiatodo" name="odiatodo" value="1">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgBloqueioAulaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgBloqueioAula').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarBloqueioAula()" style="width:90px">Salvar</a>
</div>

<!-- MODAL EXCLUIR -->
<div id="dlgBloqueioAulaExcluir" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgBloqueioAulaButtonsExcluir" modal="true">
    <form id="formBloqueioAulaExcluir" class="easyui-form" method="post" data-options="novalidate:true">
        <h3 style="text-align: center;">Deseja excluir esse bloqueio de aula?</h3>
    </form>
</div>
<div id="dlgBloqueioAulaButtonsExcluir">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgBloqueioAulaExcluir').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarBloqueioAulaExcluir()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

// BUSCA USUARIO
function buscaBloqueioAula(value,name)
{
    if(name == 'professor'){
        $('#dgBloqueioAulas').datagrid('load',{
            professor: value
        });
    }
}

// FORMATA HORA
function formataHoraDe(value,row)
{
    return value+':00hs';
}

// FORMATA HORA
function formataHoraAte(value,row)
{
    return value+':00hs';
}

// FORMATA SITUAÇÃO
function formataSituacaoAgenda(value,row)
{
    return '<i class="fa fa-close fa-lg" style="color:red"></i>';
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

// NOVO
function novoBloqueioAula(){
    $('#dlgBloqueioAula').dialog('open').dialog('center').dialog('setTitle','Novo Bloqueio de Aula');
    $('#formBloqueioAula').form('clear');
    url = '<?php base_url();?>bloqueioaulas/cadastrar';
}

// EXCLUIR
function excluirBloqueioAula(){
    var row = $('#dgBloqueioAulas').datagrid('getSelected');
    if (row != null){
        $('#dlgBloqueioAulaExcluir').dialog('open').dialog('center').dialog('setTitle','Excluir Bloqueio de Aula');
        url = '<?php base_url();?>bloqueioaulas/excluir/'+row.idagenda;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarBloqueioAula(){
    $('#formBloqueioAula').form('submit',{
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
                $('#dlgBloqueioAula').dialog('close');
                $('#dgBloqueioAulas').datagrid('reload');
            }
        }
    });
}

// SALVAR NOVO/EDITAR
function salvarBloqueioAulaExcluir(){
    $('#formBloqueioAulaExcluir').form('submit',{
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
                $('#dlgBloqueioAulaExcluir').dialog('close');
                $('#dgBloqueioAulas').datagrid('reload');
            }
        }
    });
}

</script>