import axios from 'axios'

// https://api.yannismate.de/rank/steam/RafaCampz
// https://api.yannismate.de/rank/steam/RafaCampz?playlists=ranked_3v3,ranked_2v2

export const http = axios.create({
    // baseURL: 'https://localhost/laradev/rl-project-api/public/api/'
    baseURL: 'https://rl-scrims-api.herokuapp.com/api/'
})
