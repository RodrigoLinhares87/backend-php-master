<?php

namespace Moovin;

class Conta{

    private $tipoConta = "";
    private $saldoCorrente = "";
    private $saldoPoupanca = "";

    public function setTipoConta($tipoConta){
        $this->tipoConta = $tipoConta;
    }

    public function getTipoConta(){
        return $this->tipoConta;
    }

    public function setSaldoCorrente($saldoCorrente){
        $this->saldoCorrente = $saldoCorrente;
    }

    public function getSaldoCorrente(){
        return $this->saldoCorrente;
    }

    public function setSaldoPoupanca($saldoPoupanca){
        $this->saldoPoupanca = $saldoPoupanca;
    }

    public function getSaldoPoupanca(){
        return $this->saldoPoupanca;
    }

    /**
     * Método construtor para instânciar os objetos com
     * valores iniciais
     * @param $TC Informa se a conta é corrente ou poupança
     * @param $SCC Informa o saldo da conta corrente
     * @param $SCP Informa o saldo da conta poupança
     *
     */
    function __construct($TC, $SCC, $SCP) {
        $this->tipoConta = $TC;
        $this->saldoCorrente = $SCC;
        $this->saldoPoupanca = $SCP;
    }

    /**
     * Método para averiguar se a conta é corrente ou
     * poupança, se o valor a ser depositado é válido
     * e chamar o método responsável pelo depósito
     * @param $tipoConta Verifica o tipo de conta onde
     * 1 - Conta Corrente
     * 2 - Conta Poupança
     * @param $valorParaDeposito Informa o valor a ser depositado
     *
     * @return float $this->getSaldoCorrente() Retorna o saldo
     * da conta corrente atualizado após o depósito
     * @return float $this->getSaldoPoupanca() Retorna o saldo
     * da conta poupança atualizado após o depósito
     */
    public function realizarDeposito($tipoConta, $valorParaDeposito){

        if($tipoConta->getTipoConta() == 1 and $valorParaDeposito > 0){

            $this->setSaldoCorrente($this->getSaldoCorrente() + $valorParaDeposito);
            echo "Depósito realizado com sucesso na conta corrente.<br/> Saldo atual = B$ " .$this->getSaldoCorrente() . "<br/> <br/>";

        } elseif ($tipoConta->getTipoConta() == 2 and $valorParaDeposito > 0) {

            $this->setSaldoPoupanca($this->getSaldoPoupanca() + $valorParaDeposito);
            echo "Depósito realizado com sucesso na conta poupança.<br/> Saldo atual = B$ " .$this->getSaldoPoupanca() . "<br/> <br/>";

        } else {

            echo "Conta ou valor inválido para realizar esta operação!<br/><br/>";

        }
    }

    /**
     * Método para averiguar se a conta é corrente ou
     * poupança, se o valor a ser sacado é válido
     * e chamar o método responsável pelo saque
     * @param $tipoConta Verifica o tipo de conta onde
     * 1 - Conta Corrente
     * 2 - Conta Poupança
     * @param $valorParaSaque Informa o valor a ser sacado
     *
     */
    public function realizarSaque($tipoConta, $valorParaSaque){

        if($tipoConta->getTipoConta() == 1 and $valorParaSaque > 0){

            $this->realizarSaqueContaCorrente($valorParaSaque);

        } elseif ($tipoConta->getTipoConta() == 2 and $valorParaSaque > 0) {

            $this->realizarSaqueContaPoupanca($valorParaSaque);

        } else {

            echo"Conta ou valor inválido para realizar esta operação!<br/><br/>";

        }
    }

    /**
     * Método para averiguar se ha saldo suficiente para saque,
     * se o valor não ultrapassa o limite e realizar a operação
     * @param float $valorParaSaque Informa o valor a ser sacado
     *
     * @return float $this->getSaldoCorrente() Retorna o saldo
     * da conta corrente atualizado após o saque
     */
    private function realizarSaqueContaCorrente($valorParaSaque) {

        $taxa = 2.50;
        $valorParaSaque += $taxa;

        if($valorParaSaque > $this->getSaldoCorrente() or $valorParaSaque > 602.50){

            echo 'Saldo insuficiente para realizar saque ou limite ultrapassado!<br/><br/>';

        } else {

            $this->setSaldoCorrente($this->getSaldoCorrente() - $valorParaSaque);
            echo "Saque na conta corrente no valor de: B$ " . $valorParaSaque - $taxa. "<br/>";
            echo "Saldo atual: B$ " . $this->getSaldoCorrente() . "<br/><br/>";

        }
    }

    /**
     * Método para averiguar se ha saldo suficiente para saque,
     * se o valor não ultrapassa o limite e realizar a operação
     * @param float $valorParaSaque Informa o valor a ser sacado
     *
     * @return float $this->getSaldoPoupanca() Retorna o saldo
     * da conta poupança atualizado após o saque
     */
    private function realizarSaqueContaPoupanca($valorParaSaque) {

        $taxa = 0.80;
        $valorParaSaque += $taxa;

        if($valorParaSaque > $this->getSaldoPoupanca() or $valorParaSaque > 1000.80){

            echo 'Saldo insuficiente para realizar saque ou limite ultrapassado!<br/><br/>';

        }else{

            $this->setSaldoPoupanca($this->getSaldoPoupanca() - $valorParaSaque);
            echo "Saque na conta poupança no valor de: B$ " . $valorParaSaque - $taxa . "<br/>";
            echo "Saldo atual: B$ " . $this->getSaldoPoupanca() . "<br/><br/>";

        }
    }
}
?>