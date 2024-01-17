<?php

class ContaBanco{
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

 public function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo 'Conta Criada';
    }
    public function abrirConta($tipo){
        $this->setTipo($tipo);
        $this->setStatus(true);

        if($tipo == 'CC'){
            $this->setSaldo(50);

        }else if ($tipo == 'CP'){
            $this->setSaldo(150);
        }else {
            echo "Insira um tipo de conta válido. CC/CP";
        }
    }
    public function fecharConta(){
        if ($this->getsaldo() < 0 ){
            echo "Seu saldo é negativo. Procurer sua agência.";
        }else if ($this-> getSaldo() > 0){
            echo "Operação não realizada.";
        }else{
            echo "Sua conta foi finalizada com sucesso";
            $this->setStatus(false);
        }
    }
    public function sacar($valor){
        if ($this->getStatus()){

            if ($this->getSaldo() >= $valor){
                $this-> setSaldo($this->getSaldo()-$valor);
            }else{
                echo "Saldo negativo";
            }
            
        }else{
            echo "Operação Inválida";
        }
    }
    public function depositar($valor){
        if ($this -> getStatus()){
            $this->setSaldo($this->getSaldo() + $valor);
        }else{
            echo "Conta não existe";
        }
    }
    public function pagarMensal(){
        if($this->getTipo() == 'CC'){
           $valor = 12;
        }else if ($this->getTipo() == 'CP'){
            $valor = 20;
        }

        if($this->getStatus()){
            $this->setSaldo($this->getSaldo()- $valor);
        } else {
            echo "Problemas na conta";
        }
    }

    //GETTERS & SETTER

    public function getNumConta(){
        return this->numConta;
    }
    public function setNumConta($numConta){
        $this-> numConta = $numConta;
    }
    public function getSacar(){
        return $this->sacar;
    }
    public function setSacar($tipo){
        $this->tipo = $tipo;
    }
    public function getDono(){
        return $this->dono;
    }
    public function setDono($dono){
        $this->dono = $dono;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    public function getStatus(){
        return $this-> status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getTipo(){
        return $this -> tipo;
    }
    public function setTipo($tipo){
        $this -> tipo = $tipo;
    }
}

for($i=0;$i <10; $i++){
    echo "<pre>";
$nelson = new ContaBanco();
$nelson->abrirConta('CP');
$nelson->setDono($i = $i++);
$nelson->depositar(0);
$nelson->sacar(150);



echo "<pre>";
echo "<pre>";
$maria = new ContaBanco();
$maria->abrirConta('CC');
$maria->pagarMensal();
$maria->setDono($i = $i+1);
echo "<pre>";

echo "<pre>";
print_r($nelson);
echo "</pre>";
echo "<pre>";
print_r($maria);
echo "</pre>";

}

