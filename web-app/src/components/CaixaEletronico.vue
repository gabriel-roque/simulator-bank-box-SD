<template>
    <v-container>
        <v-row justify="center">
            <v-col md="6" lg="10" xl="6">
                <div class="pa-6 display-cash">
                    <label class="display-1 cash-text">Saldo em conta: R$ {{saldo}}</label>
                </div>
            </v-col>
        </v-row>

        <v-row justify="center">
            <v-col md="6" lg="10" xl="6">
                <div class="pa-10 display-options">
                    <v-row>
                        <v-col>
                            <v-row>
                                <v-btn color="success" class="btn-display headline" @click="depositar">
                                    Depositar
                                </v-btn>
                            </v-row>
                            <v-row class="mt-15">
                                <v-btn color="error" class="btn-display headline" @click="sacar">Sacar</v-btn>
                            </v-row>
                        </v-col>
                        <v-col cols="6">
                            <v-row>
                                <div class="display-operator pa-3">
                                    <label class="headline">Operação: <b>{{operacao}}</b></label>
                                </div>
                            </v-row>
                            <v-row class="mt-3">
                                <div class="display-center pa-6">
                                    <label class="display-1 white--text">R$ {{valor.toLocaleString('pt-BR')}}</label>
                                </div>
                            </v-row>

                        </v-col>
                        <v-col>
                            <v-row>
                                <v-btn color="warning" class="btn-display headline" @click="bloquear">Bloquear</v-btn>
                            </v-row>
                            <v-row class="mt-15">
                                <v-btn color="primary" class="btn-display headline" @click="desbloquear">Desbloquear</v-btn>
                            </v-row>
                        </v-col>
                    </v-row>
                </div>
            </v-col>
        </v-row>


        <v-row justify="center">
            <v-col md="8" lg="8" xl="5">
                <v-row>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('1')">
                            <label class="display-1">1</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('2')">
                            <label class="display-1">2</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('3')">
                            <label class="display-1">3</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="error" class="btn-operator" @click="cancelar">
                            <label class="display-1">Cancelar</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('4')">
                            <label class="display-1">4</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('5')">
                            <label class="display-1">5</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('6')">
                            <label class="display-1">6</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="warning" class="btn-operator" @click="corrgir">
                            <label class="display-1">Corrigir</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('7')">
                            <label class="display-1">7</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('8')">
                            <label class="display-1">8</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('9')">
                            <label class="display-1">9</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="success" dark class="btn-operator">
                            <label class="display-1">Confirmar</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="blue-grey" class="btn-numeric" disabled></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="btn-numeric" @click="addDigit('0')">
                            <label class="display-1">0</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="blue-grey" class="btn-numeric" disabled></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="blue-grey" class="btn-operator" disabled></v-btn>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>


    </v-container>
</template>

<script>
    export default {
        name: "CaixaEletronico",

        data() {
            return {
                conta: 1000,
                statusBlock: true,
                operacao: 'Nenhuma',
                valor: 0
            }
        },

        computed: {
            saldo() {
                return this.conta
            }
        },
        watch: {
            valor(e) {
                if (isNaN(e)) this.valor = 0;
                let qtaDigitos = e.toString().match(/\d/g);
                if(qtaDigitos.length === 12) this.valor = 0;
            }
        },

        methods: {
            resetDisplay(){
                this.valor = 0;
            },

            depositar() {
                this.operacao = 'Depósito';
                this.resetDisplay();
            },

            sacar(valor) {
                this.operacao = 'Saque';
                this.resetDisplay();
            },

            bloquear(){
                this.operacao = 'Conta Bloqueada';
                this.statusBlock = false;
                this.resetDisplay();
            },

            desbloquear(){
                this.operacao = 'Conta Desbloqueada';
                this.statusBlock = true;
                this.resetDisplay();
            },

            cancelar(){
                this.operacao = 'Operação Cancelada';
                this.resetDisplay();
            },

            addDigit(digito) {

                let valorDisplay = this.valor;

                valorDisplay = valorDisplay.toString();

                valorDisplay += digito;
                valorDisplay = parseInt(valorDisplay);

                this.valor = valorDisplay
            },

            corrgir() {
                let valorDisplay = this.valor;

                valorDisplay = valorDisplay.toString().match(/\d/g);

                valorDisplay.pop();
                valorDisplay = valorDisplay.toString().replace(/,/g, "");
                valorDisplay = parseInt(valorDisplay);

                this.valor = valorDisplay

            }
        }
    }
</script>

<style scoped>
    .display-cash {
        background-color: #dcdcdc;
        border-radius: 15px;
        border: 5px solid rgba(0, 0, 0, 0.3) !important;
    }

    .button-terminal {
        background-color: #dcdcdc;
        border-radius: 15px;
        border: 5px solid rgba(0, 0, 0, 0.3) !important;
    }

    .cash-text {
        color: #4CAF50;
    }

    .btn-numeric {
        height: 80px !important;
        width: 100px !important;
    }

    .btn-operator {
        width: 100%;
        height: 100% !important;
    }

    .btn-display {
        height: 50px !important;
        width: 200px !important;
    }

    .display-options {
        width: 100%;
        background-color: #dcdcdc;
        border-radius: 15px;
        border: 5px solid rgba(0, 0, 0, 0.3) !important;
    }

    .display-operator {
        width: 100%;
        margin: 0 25px;
        background-color: rgba(225, 225, 225, 0.82);
        border-radius: 15px;
        border: 5px solid rgb(0, 235, 96) !important;
    }

    .mt-15 {
        margin-top: 5em !important;
    }

    .display-center {
        width: 100%;
        margin: 0 25px;
        background-color: rgba(79, 79, 79, 0.82);
        border-radius: 15px;
        border: 5px solid rgb(221, 184, 0) !important;
    }

</style>