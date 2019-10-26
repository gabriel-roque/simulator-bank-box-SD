import Vue from 'vue';
import Router from 'vue-router';
import CaixaEletronico from "./components/CaixaEletronico";

Vue.use(Router);

const routesObject = [
    {
        path: '/',
        component: CaixaEletronico,
        props: true,
        meta: {
            title: 'Caixa Eletronico',
        },
    },
];

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: routesObject,
});


export default router;