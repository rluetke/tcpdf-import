A simple Laravel service provider to create a PDF that can import another PDF as a base template

derived from tcpdf-laravel and Setasign/FPDI:

* https://github.com/elibyy/tcpdf-laravel A simple Laravel service provider with some basic configuration for including the TCPDF library
* https://github.com/Setasign/FPDI A Free PDF Document Importer
  * https://www.setasign.com/products/fpdi/

Although [TCPDF](https://github.com/tecnickcom/TCPDF) is deprecated and has moved to [tc-lib-pdf](https://github.com/tecnickcom/tc-lib-pdf), this modern and modular successor does not support the import of an existing PDF (as of 2026/05/01, see [Issue #117](https://github.com/tecnickcom/tc-lib-pdf/issues/117)).

FPDI:

```
{
    "require": {
        "tecnickcom/tcpdf": "6.6.*",
        "setasign/fpdi": "^2.5"
    }
}
```
