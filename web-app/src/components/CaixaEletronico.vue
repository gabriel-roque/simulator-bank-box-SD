<template>
    <v-container>
        <v-row align="start" justify="center">
            <v-col cols="3">
                <v-simple-table
                    dense="dense"
                    height="800"
                >
                    <template v-slot:default>
                        <thead>
                        <tr>
                            <th class="text-left headline font-weight-bold">Historico</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="trans in historico" :key="trans.id">
                            <td class="headline">R$ {{ trans.valor.toLocaleString('pt-BR') }}</td>
                        </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
            <v-col cols="9">
                <v-row justify="center">
                    <v-col lg="10" xl="6">
                        <div class="pa-6 display-cash">
                            <label class="display-1 cash-text">Saldo em conta: R$ {{conta.saldo.toLocaleString('pt-BR')}}</label>
                        </div>
                    </v-col>
                </v-row>

                <v-row justify="center">
                    <v-col lg="12" xl="8">
                        <div class="pa-10 display-options">
                            <v-row>
                                <v-col md="3">
                                    <v-row>
                                        <v-btn color="success" class="btn-display headline" @click="operacao(1)" :disabled="status">
                                            Depositar
                                        </v-btn>
                                    </v-row>
                                    <v-row class="mt-15">
                                        <v-btn color="error" class="btn-display headline" @click="operacao(2)" :disabled="status">Sacar</v-btn>
                                    </v-row>
                                </v-col>
                                <v-col cols="6">
                                    <v-row>
                                        <div class="display-operator pa-3">
                                            <label class="headline">
                                                <p v-if="!conta.status">
                                                    Operação: <b>{{statusOperacao.nome}} </b>
                                                </p>
                                                <p v-else>  <b>Conta Bloqueada </b></p>
                                            </label>
                                        </div>
                                    </v-row>
                                    <v-row class="mt-3">
                                        <div class="display-center pa-6">
                                            <label class="display-1 white--text">R$ {{valor.toLocaleString('pt-BR')}}</label>
                                        </div>
                                    </v-row>
                                </v-col>
                                <v-col md="3">
                                    <v-row>
                                        <v-btn color="warning" class="btn-display headline" @click="operacao(3)" :disabled="status">Bloquear
                                        </v-btn>
                                    </v-row>
                                    <v-row class="mt-15">
                                        <v-btn color="primary" class="btn-display headline" @click="operacao(4)">Desbloquear
                                        </v-btn>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </div>
                    </v-col>
                </v-row>


                <v-row justify="center">
                    <v-col lg="8" xl="6">
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
                                <v-btn color="warning" class="btn-operator" @click="corrigir">
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
                                <v-btn color="success" dark class="btn-operator" @click="confirmar">
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

            </v-col>

        </v-row>



    </v-container>
</template>

<script>
    import {clientApi} from '../plugins/axios'

    export default {
        name: "CaixaEletronico",

        /*
            1 - deposito
            2 - saque
            3 - bloqueio
            4 - desbloqueio
         */


        data() {
            return {
                conta: {
                    saldo:'',
                    status: ''
                },
                statusOperacao: {nome: 'Nenhuma', codigo: 0},
                valor: 0,
                transacao: {},
                historico: {}
            }
        },

        computed: {
            saldo() {
                return this.conta.saldo
            },
            status() {
                return this.conta.status == 1 ? true : false
            }
        },

        watch: {
            valor(e) {
                if (isNaN(e)) this.valor = 0;
                let qtaDigitos = e.toString().match(/\d/g);
                if (qtaDigitos.length === 12) this.valor = 0;
            }
        },

        methods: {
            resetDisplay() {
                this.valor = 0;
                this.transacao = {};
            },

            formatTransiction() {
                const numOperacao = this.statusOperacao.codigo;
                switch (numOperacao) {
                    case 1:
                        this.transacao = {
                            saldo: this.conta.saldo += this.valor,
                            cod_operacao: this.statusOperacao.codigo
                        };
                        break;

                    case 2:
                        if(this.valor <= this.conta.saldo) {
                            this.transacao = {
                                saldo: this.conta.saldo -= this.valor,
                                cod_operacao: this.statusOperacao.codigo
                            };
                        } else {
                            this.statusOperacao = {nome: 'Saldo Insuficiente'};
                        }
                        break;

                    case 3:
                        this.transacao = {
                           status: true
                        };
                        break;

                    case 4:
                        this.transacao = {
                            status: false
                        };
                        break;
                }
            },

            confirmar() {
                this.formatTransiction();
                this.transacionar();
            },

            transacionar() {
                clientApi.post('/conta', this.transacao)
                    .then(resp => {
                        this.resetDisplay();
                        this.statusOperacao = {nome: 'Nenhuma', codigo: 0}
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            operacao(numOperacao) {
                switch (numOperacao) {
                    case 1:
                        this.resetDisplay();
                        this.statusOperacao = {nome: 'Depósito', codigo: 1};
                        break;

                    case 2:
                        this.resetDisplay();
                        this.statusOperacao = {nome: 'Saque', codigo: 2};
                        break;

                    case 3:
                        this.resetDisplay();
                        this.statusOperacao = {nome: 'Bloqueio de Conta', codigo: 3};
                        break;

                    case 4:
                        this.resetDisplay();
                        this.statusOperacao = {nome: 'Desbloqueio de Conta', codigo: 4};
                        break;
                }
            },

            cancelar() {
                this.resetDisplay();
                this.statusOperacao = {nome: 'Operação Cancelada', codigo: 0};
            },

            addDigit(digito) {

                let valorDisplay = this.valor;

                valorDisplay = valorDisplay.toString();

                valorDisplay += digito;
                valorDisplay = parseInt(valorDisplay);

                this.valor = valorDisplay
            },

            corrigir() {
                let valorDisplay = this.valor;

                valorDisplay = valorDisplay.toString().match(/\d/g);

                valorDisplay.pop();
                valorDisplay = valorDisplay.toString().replace(/,/g, "");
                valorDisplay = parseInt(valorDisplay);

                this.valor = valorDisplay
            },

            sincronizar() {
                clientApi.get('/conta')
                    .then(resp => {
                        this.conta.saldo = resp.data.saldo;
                        this.conta.status = resp.data.status;
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            getHistorico() {
                clientApi.get('/conta/historico')
                    .then(resp => {
                        let values = [];
                        for (let i in resp.data) values.push(resp.data[i]);
                        values.reverse();
                        this.historico = values
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }

        },

        created() {
            setInterval(() => {
                this.sincronizar();
                this.getHistorico()
            }, 500);

            if (window.innerWidth < 1920) document.body.style.zoom = "67%";
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