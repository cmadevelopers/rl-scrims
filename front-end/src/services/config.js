import axios from 'axios'


export const http = axios.create({
    baseURL: 'https://localhost/laradev/rl-project-api/public/api/'
})
