<?php 	
	define('HOSTNAME_DATABASE', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '123456');
	define('DATABASE', 'mantenimiento'); 	 
	define('URL_BASE', '/mantenimiento/');
	define('PATH_MODELS', PATH_ROOT."/app/models");
	define('PATH_CONTROLLERS', PATH_ROOT."/app/controllers");
	define('PATH_VIEWS', PATH_ROOT."/public/views");
	define('PATH_BASE', "/mantenimiento");	
	define('PATH_CSS', PATH_BASE."/public/web/css");
	define('PATH_JS', PATH_BASE."/public/web/js");
	define('PATH_IMAGES', PATH_BASE."/public/web/images");
	define('PATH_TEMPLATE', PATH_ROOT."/public/template");
	define('PATH_HELPERS', PATH_ROOT."/lib");
	define('PATH_FILES', PATH_ROOT."/public/web/files/");
	define('PATH_DUMP', 'D:\\xampp\\mysql\\bin\\mysqldump.exe ');
	define('PATH_DUMP_L', 'mysqldump');
	
	define('GUSER', 'sysmantauto@gmail.com'); // GMail username
	define('GPWD', 'sysmantauto2016'); // GMail password
	define('SENDEMAIL',1);
	
	define('PUBLIC_URLS', serialize(array('Seguridadlogin','Seguridadvalidar','Seguridaderror404','Seguridaderror403','Seguridaderror500')));
	
	define('PRIVATE_URLS', serialize(
			array(
			'ADMIN_URLS' => array('Seguridad','Parametro','Grado','Unidad','Tipo','Usuario','TipoNovedad'),
			'SUPER_URLS' => array('Seguridad','Persona','Confronta'),
			'RANCH_URLS' => array('Seguridad','ExtraConfronta'),
			'AMANA_URLS' => array('Seguridad','Persona','Confronta','Novedad','Unidadconfigurar','UnidadguardarConfiguracion','Consumo')
			)));	
	
	define('ACCESS_URL',serialize(array(
			'0'=>array('id'=>'#', 'nombre'=>'Módulo de Reportes'),
			'1'=>array('id'=>'Acceso/listar/', 'nombre'=>'Link de Acceso Listar'),
			'2'=>array('id'=>'Activo/listar/', 'nombre'=>'Link de Activo Listar'),
			'3'=>array('id'=>'Auditoria/listar/', 'nombre'=>'Link de Auditoria Listar'),
			'4'=>array('id'=>'Documento/listar/', 'nombre'=>'Link de Documento Listar'),
			'5'=>array('id'=>'Estudiante/listar/', 'nombre'=>'Link de Estudiante Listar'),
			'6'=>array('id'=>'Evaluacion/listar/', 'nombre'=>'Link de Evaluación Listar'),
			'7'=>array('id'=>'Laboratorio/listar/', 'nombre'=>'Link de Laboratorio Listar'),
			'8'=>array('id'=>'Novedad/listar/', 'nombre'=>'Link de Novedad Listar'),
			'9'=>array('id'=>'Novedad/ingreso/', 'nombre'=>'Link de Novedad Ingreso'),
			'10'=>array('id'=>'Orden/listar/', 'nombre'=>'Link de Orden Listar'),
			'11'=>array('id'=>'Paralelo/listar/', 'nombre'=>'Link de Paralelo Listar'),
			'12'=>array('id'=>'Plan/listar/', 'nombre'=>'Link de Plan Listar'),
			'13'=>array('id'=>'Practica/listar/', 'nombre'=>'Link de Practicas Listar'),
			'14'=>array('id'=>'Practica/practicas/', 'nombre'=>'Link de Practicas Listar'),
			'15'=>array('id'=>'Reporte/correctivo/', 'nombre'=>'Link de Reporte Correctivo'),
			'16'=>array('id'=>'Reporte/preventivo/', 'nombre'=>'Link de Reporte Preventivo'),
			'17'=>array('id'=>'Reporte/uso/', 'nombre'=>'Link Uso de la Máquina'),					
			'18'=>array('id'=>'Reporte/crear/', 'nombre'=>'Link Respaldar Datos'),
			'19'=>array('id'=>'Usuario/listar/', 'nombre'=>'Link Usuario Listar'),						
	)));
	
	define('ICONS_URL',serialize(array(
			'0'=>array('id'=>'fa fa-sitemap', 'nombre'=>'fa fa-sitemap'),
			'1'=>array('id'=>'fa-bars', 'nombre'=>'fa-bars'),
			'2'=>array('id'=>'fa-bell', 'nombre'=>'fa-bell'),
			'3'=>array('id'=>'fa-book', 'nombre'=>'fa-book'),
			'4'=>array('id'=>'fa-cog', 'nombre'=>'fa-cog'),
			'5'=>array('id'=>'fa-copy', 'nombre'=>'fa-copy'),
			'6'=>array('id'=>'fa-database', 'nombre'=>'fa-database'),
			'7'=>array('id'=>'fa-edit ', 'nombre'=>'fa-edit'),
			'8'=>array('id'=>'fa-exclamation-triangle', 'nombre'=>'fa-exclamation-triangle'),
			'9'=>array('id'=>'fa-files-o', 'nombre'=>'fa-files-o'),
			'10'=>array('id'=>'fa-link ', 'nombre'=>'fa-link '),
			'11'=>array('id'=>'fa-list', 'nombre'=>'fa-list'),
			'12'=>array('id'=>'fa-pencil', 'nombre'=>'fa-pencil'),
			'13'=>array('id'=>'fa-pencil-square-o', 'nombre'=>'fa-pencil-square-o'),
			'14'=>array('id'=>'fa-tasks', 'nombre'=>'fa-tasks'),
			'15'=>array('id'=>'fa-user', 'nombre'=>'fa-user'),
			'16'=>array('id'=>'fa-users', 'nombre'=>'fa-users'),
			'17'=>array('id'=>'fa-wrench', 'nombre'=>'fa-wrench'),
	)));
?>