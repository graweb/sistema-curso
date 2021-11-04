<div class="easyui-layout" style="width:100%;height:100%;">
    <div data-options="region:'west',split:true" title="Relatórios" style="width:20%;">
        <table id="dgRelatorios"
                class="easyui-datagrid"
                fit="true"
                url="<?php base_url();?>relatorios/listar"
                pagination="false"
                rownumbers="false"
                fitColumns="true"
                singleSelect="true"
                striped="true">
            <thead>
                <tr>
                    <th data-options="field:'ck',checkbox:true"></th>
                    <th field="idrelatorio" width="10">ID</th>
                    <th field="descricaorelatorio" width="90">RELATÓRIO</th>
                </tr>
            </thead>
        </table>
    </div>
    <div id="filtrosRelatorios" region="center" title="Filtros" style="width:20%;">
        <?php if(isset($view)){ $this->load->view($view);} ?>
    </div>
    <div id="conteudoRelatorios" data-options="region:'east',split:true" title="Informações" style="width:60%;">
        <?php if(isset($view)){ $this->load->view($view);} ?>
    </div>
</div>

<script type="text/javascript">
var url;

//ABRE INFORMAÇÕES DE ACESSO COM 1 CLICK
$('#dgRelatorios').datagrid({
    onClickRow: function(index,row){
        var row = $('#dgRelatorios').datagrid('getSelected');
        $('#filtrosRelatorios').panel('refresh', '<?php base_url();?>relatorios/filtro_relatorios/'+row.idrelatorio);
        $('#conteudoRelatorios').panel('clear');
    }
});

// FORMATA SITUAÇÃO
function formataSituacaoPermissao(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}
</script>