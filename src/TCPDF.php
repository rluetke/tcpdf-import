<?php

namespace Rluetke\TCPDF;

use Illuminate\Support\Facades\Config;

class TCPDF
{
    protected $app;
    /** @var  TCPDFHelper */
    protected $tcpdf;

    public function __construct($app)
    {
        $this->app = $app;
        $this->reset();
    }

    public function reset()
    {
        $class = Config::get('tcpdf.use_class', TCPDFHelper::class);

        $this->tcpdf = new $class();

        $this->tcpdf->disableTcpdfLink();
    }

    public function __call($method, $args)
    {
        if (method_exists($this->tcpdf, $method)) {
            return call_user_func_array([$this->tcpdf, $method], $args);
        }
        throw new \RuntimeException(sprintf('the method %s does not exists in TCPDF', $method));
    }

    public function setHeaderCallback($headerCallback)
    {
        $this->tcpdf->setHeaderCallback($headerCallback);
    }

    public function setFooterCallback($footerCallback)
    {
        $this->tcpdf->setFooterCallback($footerCallback);
    }
}
