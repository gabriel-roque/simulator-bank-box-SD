import axios from 'axios';

export const clientApi = axios.create({
    // baseURL: 'http://localhost:8000/api/v1',
    // Local em faculdade
    baseURL: 'http://10.9.7.191:9000/api/v1',
    headers: {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Headers": "Authorization",
        "Access-Control-Allow-Methods": "GET, POST, OPTIONS, PUT, PATCH, DELETE",
        "Content-Type": "application/json;charset=UTF-8",
    }
});
