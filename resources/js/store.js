import Vuex from 'vuex'
export default   new Vuex.Store({
    state: {
      isAdmin: Boolean(localStorage.getItem("isAdmin")) || false,
      access_token:localStorage.getItem("access_token") || null,
      token_type:localStorage.getItem("token_type") || null
    },
    mutations:{
      setToken(state,token){
        state.access_token=token
      },
      setTokenType(state,token_type){
        state.token_type=token_type
      },
      setAdmin(state,isAdmin){
        state.isAdmin=isAdmin
      }
    }
  
  })