<?php

// 型を定義
interface IFax {
    function send();
}

interface IPrinter {
    function printer();
}

// 実装を定義
trait FaxTrait {
    public function send() {
        print 'sending Fax...sended!';
    }
}

trait PrinterTrait {
    public function printer() {
        print 'printing ... complete!';
    }
}

class FaxPrinter implements IFax, IPrinter {
    use FaxTrait, PrinterTrait;
}

$fp = new FaxPrinter();
$fp->send();
$fp->printer();
