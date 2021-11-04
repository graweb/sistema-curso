<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'easyenglish';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ROTAS DE LAYOUT
$route['menu'] = 'easyenglish/menu';
$route['painel'] = 'easyenglish/painel';
$route['rodape'] = 'easyenglish/rodape';

$route['autenticar'] = 'easyenglish/autenticar';
$route['login'] = 'easyenglish/login';
$route['logout'] = 'easyenglish/sair';
