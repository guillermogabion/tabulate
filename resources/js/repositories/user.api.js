import Axios from "../plugins/axios"

export const Self = () => Axios.get('self')
export const login = (payload) => Axios.post('login', payload)