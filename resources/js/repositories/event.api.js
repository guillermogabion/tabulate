import Axios from "../plugins/axios"

export const EventPagination = (url, payload) => Axios.get(`/${url}`, payload)