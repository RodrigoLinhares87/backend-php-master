<?php

namespace Moovin;

use PHPUnit\Framework\TestCase;

class TransferenciaTest extends TestCase
{

    public function assertPreConditions(): void {

        $classe = class_exists('\\Moovin\\Transferencia');

        $this->assertTrue($classe);

    }

    public function testMetodoRealizaTransferenciaDeContaCorrenteParaContaCorrente() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $a [1] = new Conta(1, 50, 200);
        $ted = new Transferencia();
        $ted->realizarTransferencia($a[0], $a[1], 100);
        $this->assertEquals(0, $a[0]->getSaldoCorrente());
        $this->assertEquals(150, $a[1]->getSaldoCorrente());
    }

    public function testMetodoRealizaTransferenciaDeContaCorrenteParaContaPoupanca() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $a [1] = new Conta(2, 50, 200);
        $ted = new Transferencia();
        $ted->realizarTransferencia($a[0], $a[1], 50);
        $this->assertEquals(50, $a[0]->getSaldoCorrente());
        $this->assertEquals(250, $a[1]->getSaldoPoupanca());
    }

    public function testMetodoRealizaTransferenciaDeContaPoupancaParaContaCorrente() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $a [1] = new Conta(2, 50, 200);
        $ted = new Transferencia();
        $ted->realizarTransferencia($a[1], $a[0], 50);
        $this->assertEquals(150, $a[1]->getSaldoPoupanca());
        $this->assertEquals(150, $a[0]->getSaldoCorrente());
    }

    public function testMetodoRealizaTransferenciaDeContaPoupancaParaContaPoupanca() {

        $a = array();
        $a [0] = new Conta(2, 100, 30);
        $a [1] = new Conta(2, 50, 600);
        $ted = new Transferencia();
        $ted->realizarTransferencia($a[1], $a[0], 500);
        $this->assertEquals(100, $a[1]->getSaldoPoupanca());
        $this->assertEquals(530, $a[0]->getSaldoPoupanca());
    }
}