<div class="easyui-panel" style="padding:10px;">
    <form id="formRelatorioPacotesPorAluno" class="easyui-form" method="post" data-options="novalidate:true">
        <div>
            <select class="easyui-combobox" label="Professor:" labelPosition="top" id="professor" name="professor" panelHeight="auto" required="true" style="width:100%;">
                <?php foreach ($dados_filtro_professor as $prof) { 
                    echo "<option value='".$prof->nome."'>".$prof->nome."</option>";
                } ?>
            </select>
        </div>
        <div>
            <input class="easyui-datebox" label="De:" labelPosition="top" id="de" name="de" style="width:100%;" required="true" editable="false" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser">
        </div>
        <div>
            <input class="easyui-datebox" label="Até:" labelPosition="top" id="ate" name="ate" style="width:100%;" required="true" editable="false" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser">
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
    
    var de = $("#de").val().replace('/','-').replace('/','-');
    var ate = $("#ate").val().replace('/','-').replace('/','-');

    $('#formRelatorioPacotesPorAluno').form('submit',{
        url: '',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            $('#conteudoRelatorios').panel('refresh', '<?php base_url();?>relatorios/agenda_do_professor/' + $("#professor").val() + '/' + de + '/' + ate);
        }
    });
}
</script>