<?php

namespace Moovin;

use PHPUnit\Framework\TestCase;

class ContaTest extends TestCase
{

    protected function assertPostConditions(): void {

        $classe = class_exists('\\Moovin\\Conta');

        $this->assertTrue($classe);

    }

    public function testSeValoresDaContaEstaoCorretosConformePassado() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $this->assertEquals(1, $a[0]->getTipoConta());
        $this->assertEquals(100, $a[0]->getSaldoCorrente());
        $this->assertEquals(30, $a[0]->getSaldoPoupanca());

    }

    public function testMetodoRealizaDepositoContaCorrente() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $a[0]->realizarDeposito($a[0], 20.50);
        $this->assertEquals(120.50, $a[0]->getSaldoCorrente($a[0]));

    }

    public function testMetodoRealizaDepositoContaPoupanca() {

        $a = array();
        $a [0] = new Conta(2, 100, 30);
        $a[0]->realizarDeposito($a[0], 10.20);
        $this->assertEquals(40.20, $a[0]->getSaldoPoupanca($a[0]));

    }

    public function testMetodoRealizaSaqueContaCorrente() {

        $a = array();
        $a [0] = new Conta(1, 100, 30);
        $a[0]->realizarSaque($a[0], 10.20);
        $this->assertEquals(87.30, $a[0]->getSaldoCorrente($a[0]));

    }

    public function testMetodoRealizaSaqueContaPoupanca() {

        $a = array();
        $a [0] = new Conta(2, 100, 30);
        $a[0]->realizarSaque($a[0], 15.20);
        $this->assertEquals(14, $a[0]->getSaldoPoupanca($a[0]));

    }
}