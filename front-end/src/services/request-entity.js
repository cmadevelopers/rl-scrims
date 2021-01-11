import { http } from "./config";

export default {
  list: (endpoint, limit, offset) => {
    let header = {
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem("userToken")}`,
      },
    };

    if (limit >= 0 && offset > 0) {
      return http.get(`${endpoint}?limit=${limit}&offset=${offset}`, header);
    }
    else {
      return http.get(`${endpoint}`, header);
    }
  },

  changePassword: (endpoint, changeId, data) => {
    return http.put(`${endpoint}/password/${changeId}`, data)
  },

  create: (endpoint, data) => {
    let header = {
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem("userToken")}`,
      },
    };
    return http.post(endpoint, data, header);
  },

  update: (endpoint, data) => {
    let header = {
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem("userToken")}`,
      },
    };
    return http.put(`${endpoint}/${data.id}`, data, header);
  },

  delete: (endpoint, id) => {
    let header = {
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem("userToken")}`,
      },
    };
    return http.delete(endpoint + "/" + id, header);
  },

  login: (endpoint, data) => {
    return http.post(endpoint, data);
  },
};
