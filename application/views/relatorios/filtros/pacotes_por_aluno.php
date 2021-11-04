<div class="easyui-panel" style="padding:10px;">
    <form id="formRelatorioPacotesPorAluno" class="easyui-form" method="post" data-options="novalidate:true">
        <div>
            <select class="easyui-combobox" label="Aluno:" labelPosition="top" id="idusuario" name="idusuario" panelHeight="auto" required="true" style="width:100%;">
                <?php foreach ($dados_filtro_alunos as $alun) { 
                    echo "<option value='".$alun->idusuario."'>".$alun->nome."</option>";
                } ?>
            </select>
        </div>
        <div style="text-align:center;padding:5px 0">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="gerarRelatorioPacotesPorAluno()" style="width:100%;">Gerar relatório</a>
        </div>
    </form>
</div>

<script type="text/javascript">
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

// GERAR
function gerarRelatorioPacotesPorAluno(){
    $('#formRelatorioPacotesPorAluno').form('submit',{
        url: '',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            $('#conteudoRelatorios').panel('refresh', '<?php base_url();?>relatorios/pacotes_por_aluno/' + $("#idusuario").val());
        }
    });
}
</script>