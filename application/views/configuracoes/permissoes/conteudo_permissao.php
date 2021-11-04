<?php $permissoes = unserialize($dados->permissoes); ?>

<form id="formAcessosConcedidos" method="post">

<div style="padding: 10px">
	<a href="javascript:void(0)" class="easyui-linkbutton c1" size="large" iconCls="icon-ok" onclick="salvarAcessos()"> Salvar Alterações </a>
	<input type="checkbox" id="marcar_todos" name="marcar_todos" class="marcar" onclick="marcarTodos()">Marcar todos?
</div>

<div class="easyui-tabs" width="100%" height="100%">
	<input type="hidden" id="idpermissao" name="idpermissao" value="<?php echo $dados->idpermissao;?>">
    <div title="Cadastros">
        <table id="dgCadastros">
            <thead>
                <tr>
                    <th field="menu" width="10%" align="left"></th>
                    <th field="visualizar" width="12%" align="left">Visualizar</th>
                    <th field="cadastrar" width="12%" align="left">Cadastrar</th>
                    <th field="editar" width="12%" align="left">Editar</th>
                    <th field="desativar_excluir" width="12%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Agenda</td>
                    <td><input type="checkbox" class="marcar" id="vAgenda" name="vAgenda" <?php if(isset($permissoes['vAgenda'])){ if($permissoes['vAgenda'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aAgenda" name="aAgenda" <?php if(isset($permissoes['aAgenda'])){ if($permissoes['aAgenda'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eAgenda" name="eAgenda" <?php if(isset($permissoes['eAgenda'])){ if($permissoes['eAgenda'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dAgenda" name="dAgenda" <?php if(isset($permissoes['dAgenda'])){ if($permissoes['dAgenda'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Alunos</td>
                    <td><input type="checkbox" class="marcar" id="vAlunos" name="vAlunos" <?php if(isset($permissoes['vAlunos'])){ if($permissoes['vAlunos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aAlunos" name="aAlunos" <?php if(isset($permissoes['aAlunos'])){ if($permissoes['aAlunos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eAlunos" name="eAlunos" <?php if(isset($permissoes['eAlunos'])){ if($permissoes['eAlunos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dAlunos" name="dAlunos" <?php if(isset($permissoes['dAlunos'])){ if($permissoes['dAlunos'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Bloqueio de Aula</td>
                    <td><input type="checkbox" class="marcar" id="vBloqueioAula" name="vBloqueioAula" <?php if(isset($permissoes['vBloqueioAula'])){ if($permissoes['vBloqueioAula'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aBloqueioAula" name="aBloqueioAula" <?php if(isset($permissoes['aBloqueioAula'])){ if($permissoes['aBloqueioAula'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eBloqueioAula" name="eBloqueioAula" <?php if(isset($permissoes['eBloqueioAula'])){ if($permissoes['eBloqueioAula'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dBloqueioAula" name="dBloqueioAula" <?php if(isset($permissoes['dBloqueioAula'])){ if($permissoes['dBloqueioAula'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Exercícios</td>
                    <td><input type="checkbox" class="marcar" id="vExercicios" name="vExercicios" <?php if(isset($permissoes['vExercicios'])){ if($permissoes['vExercicios'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aExercicios" name="aExercicios" <?php if(isset($permissoes['aExercicios'])){ if($permissoes['aExercicios'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eExercicios" name="eExercicios" <?php if(isset($permissoes['eExercicios'])){ if($permissoes['eExercicios'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dExercicios" name="dExercicios" <?php if(isset($permissoes['dExercicios'])){ if($permissoes['dExercicios'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Pacotes</td>
                    <td><input type="checkbox" class="marcar" id="vPacotes" name="vPacotes" <?php if(isset($permissoes['vPacotes'])){ if($permissoes['vPacotes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aPacotes" name="aPacotes" <?php if(isset($permissoes['aPacotes'])){ if($permissoes['aPacotes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="ePacotes" name="ePacotes" <?php if(isset($permissoes['ePacotes'])){ if($permissoes['ePacotes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dPacotes" name="dPacotes" <?php if(isset($permissoes['dPacotes'])){ if($permissoes['dPacotes'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Notificacoes</td>
                    <td><input type="checkbox" class="marcar" id="vNotificacoes" name="vNotificacoes" <?php if(isset($permissoes['vNotificacoes'])){ if($permissoes['vNotificacoes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aNotificacoes" name="aNotificacoes" <?php if(isset($permissoes['aNotificacoes'])){ if($permissoes['aNotificacoes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eNotificacoes" name="eNotificacoes" <?php if(isset($permissoes['eNotificacoes'])){ if($permissoes['eNotificacoes'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dNotificacoes" name="dNotificacoes" <?php if(isset($permissoes['dNotificacoes'])){ if($permissoes['dNotificacoes'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Relatórios">
        <table id="dgRelatorios">
            <thead>
                <tr>
                    <th field="visualizar" width="25%" align="left">Visualizar</th>
                    <th field="visualizarb" width="25%" align="left"></th>
                    <th field="visualizarc" width="25%" align="left"></th>
                    <th field="visualizard" width="25%" align="left"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="marcar" id="vRelatorios" name="vRelatorios" value="1" <?php if(isset($permissoes['vRelatorios'])){ if($permissoes['vRelatorios'] == '1'){echo 'checked';}}?>>Relatórios</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Configurações">
        <table id="dgConfiguracoes">
            <thead>
                <tr>
                    <th field="menu" width="21%" align="left"></th>
                    <th field="visualizar" width="21%" align="left">Visualizar</th>
                    <th field="cadastrar" width="21%" align="left">Cadastrar</th>
                    <th field="editar" width="21%" align="left">Editar</th>
                    <th field="desativar_excluir" width="21%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Permissões</td>
                    <td><input type="checkbox" class="marcar" id="vConfigPermissoes" name="vConfigPermissoes" value="1" <?php if(isset($permissoes['vConfigPermissoes'])){ if($permissoes['vConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigPermissoes" name="aConfigPermissoes" value="1" <?php if(isset($permissoes['aConfigPermissoes'])){ if($permissoes['aConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigPermissoes" name="eConfigPermissoes" value="1" <?php if(isset($permissoes['eConfigPermissoes'])){ if($permissoes['eConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigPermissoes" name="dConfigPermissoes" value="1" <?php if(isset($permissoes['dConfigPermissoes'])){ if($permissoes['dConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                </tr>
                <tr>
                    <td>Usuários</td>
                    <td><input type="checkbox" class="marcar" id="vConfigUsuarios" name="vConfigUsuarios" value="1" <?php if(isset($permissoes['vConfigUsuarios'])){ if($permissoes['vConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigUsuarios" name="aConfigUsuarios" value="1" <?php if(isset($permissoes['aConfigUsuarios'])){ if($permissoes['aConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigUsuarios" name="eConfigUsuarios" value="1" <?php if(isset($permissoes['eConfigUsuarios'])){ if($permissoes['eConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigUsuarios" name="dConfigUsuarios" value="1" <?php if(isset($permissoes['dConfigUsuarios'])){ if($permissoes['dConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</form>

<script type="text/javascript">

// MARCAR TODOS OS CHECKBOXES
function marcarTodos(){
	$('.marcar').each(
		function(){
			if ($(this).prop("checked")) {
				$(this).prop("checked", false);
				$('#marcar_todos').prop("checked", false);
			} else { 
				$(this).prop("checked", true);
				$('#marcar_todos').prop("checked", true);
			}
		}
	);
}

// SALVAR NOVO/EDITAR
function salvarAcessos(){
    $('#formAcessosConcedidos').form('submit',{
        url: '<?php base_url();?>permissoes/salvarAcessos',
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
            }
        }
    });
}
</script>