<?php

namespace Moovin;

require_once 'Conta.php';

class Transferencia {

    /**
     * Método para averiguar se a conta que ira realizar a transferência é
     * corrente ou poupança, validar se ha saldo suficiente na conta
     * solicitada e chamar o método responsável pela transferência
     * @param $remetente Informa qual conta realizará a transferência
     * @param $beneficiario Informa qual conta receberá a transferência
     * @param $valorTransferencia Informa o valor a ser transferido
     *
     */
    public function realizarTransferencia($remetente, $beneficiario, $valorTransferencia) {

        if ($remetente->getTipoConta() == 1 and $remetente->getSaldoCorrente() >= $valorTransferencia) {

            $this->realizarTransferenciaContaCorrente($remetente, $beneficiario, $valorTransferencia);

        } elseif ($remetente->getTipoConta() == 2 and $remetente->getSaldoPoupanca() >= $valorTransferencia) {

            $this->realizarTransferenciaContaPoupanca($remetente, $beneficiario, $valorTransferencia);

        } else {

            echo "Conta do remetente inválida ou saldo insuficiente!<br/><br/>";

        }
    }

    /**
     * Método para averiguar se a conta que receberá o valor
     * de uma conta corrente é corrente ou poupança e
     * realizar a transferência
     * @param $remetente Informa qual conta realizará a transferência
     * @param $beneficiario Informa qual conta receberá a transferência onde
     * 1 - Conta Corrente
     * 2 - Conta Poupança
     * @param $valorTransferencia Informa o valor a ser transferido
     *
     */
    private function realizarTransferenciaContaCorrente($remetente, $beneficiario, $valorTransferencia) {

        if($beneficiario->getTipoConta() == 1) {

            $remetente->setSaldoCorrente($remetente->getSaldoCorrente() - $valorTransferencia);
            $beneficiario->setSaldoCorrente($beneficiario->getSaldoCorrente() + $valorTransferencia);
            echo "Transferência no valor de B$ " . $valorTransferencia . " realizada com sucesso para uma conta corrente!<br/>";
            echo "Saldo do remetente: B$ " . $remetente->getSaldoCorrente() . "<br/>";
            echo "Saldo do beneficiário: B$ " . $beneficiario->getSaldoCorrente() . "<br/><br/>";

        } elseif ($beneficiario->getTipoConta() == 2) {

            $remetente->setSaldoCorrente($remetente->getSaldoCorrente() - $valorTransferencia);
            $beneficiario->setSaldoPoupanca($beneficiario->getSaldoPoupanca() + $valorTransferencia);
            echo "Transferência no valor de B$ " . $valorTransferencia . " realizada com sucesso para uma conta poupança!<br/>";
            echo "Saldo do remetente: B$ " . $remetente->getSaldoCorrente() . "<br/>";
            echo "Saldo do beneficiário: B$ " . $beneficiario->getSaldoPoupanca() . "<br/><br/>";

        } else {

            echo "Conta do destinatário inválida!<br/><br/>";

        }
    }

    /**
     * Método para averiguar se a conta que receberá o valor
     * de uma conta poupança é corrente ou poupança e
     * realizar a transferência
     * @param $remetente Informa qual conta realizará a transferência
     * @param $beneficiario Informa qual conta receberá a transferência onde
     * 1 - Conta Corrente
     * 2 - Conta Poupança
     * @param $valorTransferencia Informa o valor a ser transferido
     *
     */
    private function realizarTransferenciaContaPoupanca($remetente, $beneficiario, $valorTransferencia) {

        if($beneficiario->getTipoConta() == 1) {

            $remetente->setSaldoPoupanca($remetente->getSaldoPoupanca() - $valorTransferencia);
            $beneficiario->setSaldoCorrente($beneficiario->getSaldoCorrente() + $valorTransferencia);
            echo "Transferência no valor de B$ " . $valorTransferencia . " realizada com sucesso para uma conta corrente!<br/>";
            echo "Saldo do remetente: B$ " . $remetente->getSaldoPoupanca() . "<br/>";
            echo "Saldo do beneficiário: B$ " . $beneficiario->getSaldoCorrente() . "<br/><br/>";

        } elseif ($beneficiario->getTipoConta() == 2) {

            $remetente->setSaldoPoupanca($remetente->getSaldoPoupanca() - $valorTransferencia);
            $beneficiario->setSaldoPoupanca($beneficiario->getSaldoPoupanca() + $valorTransferencia);
            echo "Transferência no valor de B$ " . $valorTransferencia . " realizada com sucesso para uma conta poupança!<br/>";
            echo "Saldo do remetente: B$ " . $remetente->getSaldoPoupanca() . "<br/>";
            echo "Saldo do beneficiário: B$ " . $beneficiario->getSaldoPoupanca() . "<br/><br/>";

        } else {

            echo "Conta do destinatário inválida!<br/><br/>";

        }
    }
}
?>