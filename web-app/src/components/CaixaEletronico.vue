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
                    <v-row class="text-center">
                        <v-col>
                            <v-row>
                                <v-btn color="success" dark style="width: 150px" @click="depositar(this.valor)">Depositar</v-btn>
                            </v-row>
                            <v-row class="mt-10">
                                <v-btn color="error" dark style="width: 150px" @click="sacar(this.valor)">Sacar</v-btn>
                            </v-row>
                        </v-col>
                        <v-spacer/>
                        <v-col cols="6">
                            <div class="display-center pa-10">
                                <label class="display-1">R$ {{valor}}</label>
                            </div>
                        </v-col>
                        <v-spacer/>
                        <v-col>
                            <v-row>
                                <v-btn color="warning" dark style="width: 150px">Bloquear </v-btn>
                            </v-row>
                            <v-row class="mt-10">
                                <v-btn color="primary" dark style="width: 150px">Desbloquear </v-btn>
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
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('1')">1</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('2')">2</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('3')">3</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="error" dark class="button-operador"><label class="display-1">Cancelar</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('4')">4</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('5')">5</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('6')">6</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="warning" dark class="button-operador"><label class="display-1">Corrigir</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('7')">7</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('8')">8</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('9')">9</label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="success" dark class="button-operador"><label class="display-1">Confirmar</label></v-btn>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="2">
                        <v-btn color="blue-grey" class="button-numeric"><label class="display-1"></label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="primary" class="button-numeric"><label class="display-1" @click="button('0')">0</label></v-btn>
                    </v-col>
                    <v-col cols="2">
                        <v-btn color="blue-grey" class="button-numeric"><label class="display-1"></label></v-btn>
                    </v-col>
                    <v-col cols="6">
                        <v-btn color="blue-grey" class="button-operador"><label class="display-1"></label></v-btn>
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
                statusConta: true,
                valor: ''
            }
        },

        computed: {
            saldo(){
                return this.conta
            }
        },



        methods: {
            depositar(valor) {
                return this.conta += valor
            },

            sacar(valor) {
                return this.conta -= valor
            },

            button(valor) {
                // eslint-disable-next-line no-use-before-define
                // console.log(value)
                this.valor += valor
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

    .button-numeric {
        height: 80px !important;
        width: 100px !important;
    }

    .button-operador {
        width: 100%;
        height: 100% !important;
    }

    .display-options {
        width: 100%;
        height: 300px;
        background-color: #dcdcdc;
        border-radius: 15px;
        border: 5px solid rgba(0, 0, 0, 0.3) !important;
    }

    .display-center {
        width: 100%;
        height: 200px;
        background-color: rgba(79, 79, 79, 0.82);
        border-radius: 15px;
        border: 5px solid rgb(221, 184, 0) !important;
    }

</style>