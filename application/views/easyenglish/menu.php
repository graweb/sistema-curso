<div class="easyui-panel" fit="true" style="padding:5px;">
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuPadrao',iconCls:'fa fa-home fa-lg'">Menu</a>
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuUsuario',iconCls:'fa fa-user fa-lg'"><?php echo $this->session->userdata('nome');?></a>
    <a href="<?php base_url()?>logout" class="easyui-linkbutton" data-options="iconCls:'fa fa-sign-out fa-lg', plain:'false'">Sair</a>

    <div id="menuPadrao" style="width:160px;">
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vAgenda') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vAlunos') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vBloqueioAula') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vExercicios') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vPacotes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorios') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vNotificacoes')) { 
        ?>
            <?php 
                if($this->permission->checkPermission($this->session->userdata('permissao'),'vAgenda') ||
                $this->permission->checkPermission($this->session->userdata('permissao'),'vAlunos') || 
                $this->permission->checkPermission($this->session->userdata('permissao'),'vPacotes')) { ?>
            <div>
                <span>Cadastros</span>
                <div>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAgenda')) { ?>
                    <div onclick="addPanel('Agenda','<?php base_url();?>agenda')">Agenda</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vAlunos')) { ?>
                    <div onclick="addPanel('Alunos','<?php base_url();?>alunos')">Alunos</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vBloqueioAula')) { ?>
                    <div onclick="addPanel('Bloqueio de Aulas','<?php base_url();?>bloqueioaulas')">Bloqueio de Aulas</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vExercicios')) { ?>
                    <div onclick="addPanel('Exerc??cios','<?php base_url();?>exercicios')">Exerc??cios</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vPacotes')) { ?>
                    <div onclick="addPanel('Pacotes','<?php base_url();?>pacotes')">Pacotes</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vNotificacoes')) { ?>
                    <div class="menu-sep"></div>
                    <div onclick="addPanel('Notifica????es','<?php base_url();?>notificacoes')">Notifica????es</div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorios')){ ?>
            <div onclick="addPanel('Relat??rios','<?php base_url();?>relatorios')">Relat??rios</div>
            <?php } ?>
            <?php 
                if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
                $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')) { ?>
            <div class="menu-sep"></div>
            <div>
                <span>Configura????es</span>
                <div>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes')){ ?>
                    <div onclick="addPanel('Permiss??es','<?php base_url();?>permissoes')">Permiss??es</div>
                    <?php } ?>
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')){ ?>
                    <div onclick="addPanel('Usu??rios','<?php base_url();?>usuarios')">Usu??rios</div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>

    <div id="menuUsuario" style="width:150px;">
        <div onclick="abrirDialogDefinirSenha()">Definir senha</div>
    </div>
</div>