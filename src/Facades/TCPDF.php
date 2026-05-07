<?php
namespace Rluetke\TCPDF\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \Rluetke\TCPDF\TCPDFHelper
 * @mixin \TCPDF
 */
class TCPDF extends Facade
{
	protected static function getFacadeAccessor(){return 'tcpdf';}
}
