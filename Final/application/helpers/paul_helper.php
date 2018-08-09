<?php

session_start();

if(!isset($_SESSION['usuario']) && !defined('NOLOGIN'))
{
	redirect('autorizacion');
}