import Axios from "../plugins/axios"

export const ItemPagination = (url, payload) => Axios.get(`/${url}`, payload)