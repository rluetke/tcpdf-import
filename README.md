A simple Laravel service provider to create a PDF that can import another PDF as a base template

derived from tcpdf-laravel and Setasign/FPDI:

* https://github.com/elibyy/tcpdf-laravel A simple Laravel service provider with some basic configuration for including the TCPDF library (Laravel 6 - 13),
* https://github.com/tecnickcom/TCPDF A PHP class for generating PDF files (PHP 7.1 - 8.5),
* https://github.com/Setasign/FPDI, [FPDI](https://www.setasign.com/products/fpdi/) A Free PDF Document Importer (PHP 7.2 - 8.5)

Although [TCPDF](https://github.com/tecnickcom/TCPDF) is deprecated and has moved to [tc-lib-pdf](https://github.com/tecnickcom/tc-lib-pdf), this modern and modular successor does not support the import of an existing PDF (as of 2026/05/01, see [Issue #117](https://github.com/tecnickcom/tc-lib-pdf/issues/117)).


## Configuration

```
  php artisan vendor:publish --provider=""Rluetke\TCPDF\ServiceProvider"
```



FPDI:

```
{
    "require": {
        "tecnickcom/tcpdf": "6.6.*",
        "setasign/fpdi": "^2.5"
    }
}
```
