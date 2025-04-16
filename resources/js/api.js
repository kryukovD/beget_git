import axios from 'axios'
import store from "./store.js"
export const apiUrl = import.meta.env.VITE_API_SERVER;

const config = {
    headers:{
        Authorization: store.state?.token_type+ ' ' + store.state?.access_token,
    }
  };

  axios.interceptors.response.use(undefined,function (error) {
    if (error.response.status === 401) {
        localStorage.removeItem("access_token")
        localStorage.removeItem("type_token")
        localStorage.removeItem("isAdmin")
    }
  }, function (error) {
    // Do something with request error
    return Promise.reject(error);
  });

export const refreshAuthHeader=function(authHeader){
    config.headers.Authorization=authHeader;
}

export const getTechnologies = async () => {
    try {
        const responce = await axios.get(`${apiUrl}/api/getTechnologies`,{headers:{Cookie:'test'},withCredentials:true})
        return responce.data;
    }
    catch (e) {
        // console.log(e);
    }
}

export const getStack = async () => {
    try {
        const responce = await axios.get(`${apiUrl}/api/getStack`);
        return responce.data;
    }
    catch (e) {
        // console.log(e);
    }
}

export const getJobs = async () => {
    try {
        const responce = await axios.get(`${apiUrl}/api/getJobs`);
        return responce.data;
    }
    catch (e) {
        // console.log(e);
    }
}
export const sendRequestForm=async(name,email,message)=>{
    try {
        const responce=await axios.post(`${apiUrl}/api/sendForm`,{name:name,email:email,message:message});
        return responce.data
    }
    catch (e) {
        // console.log(e);
    }
   
}

export const  loginUser=async(data,authHeader)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/auth/login`,data,config);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}
export const  getAllPortfolio=async(data)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/getPortfolio` );
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  getRecentPortfolio=async(data)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/getRecentPortfolio`);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}
export const  addPortfolio=async(data)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/addPortfolio`,data,config);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  addJob=async(data)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/addJob`,data,config);
        return responce.data;
    }
    catch(e){
        return {message : "Не добавлено", class : 'error'}
    }
    
}

export const  deletePortfolio=async(id)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/deletePortfolio/${id}`,config);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  deleteJob=async(id)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/deleteJob/${id}`,config);
        return responce.data;
    }
    catch(e){
        return {message : "Не удалена", class : 'error'}
    }
    
}

export const  updatePortfolio=async(data)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/updatePortfolio`,data,config);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  updateJob=async(data)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/updateJob`,data,config);
        return responce.data;
    }
    catch(e){
        return {message : "Не добавлено", class : 'error'}
    }
    
}

export const  updatePrices=async(data)=>{
    try{
        const responce=await axios.post(`${apiUrl}/api/updatePrices`,data,config);
        return responce.data;
    }
    catch(e){
        return {"message":'Не удалось обновить ',class:'error'}
    }
    
}

export const  getPortfolioById=async(id)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/getPortfolioById/${id}`);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  getJobById=async(id)=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/getJobById/${id}`);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  getUser=async()=>{
    try{
        console.log(config);
        const responce=await axios.get(`${apiUrl}/api/auth/getUser`,config);
        return responce.data;
    }
    catch(e){
        //console.log(e);
    }
    
}

export const  getAllRequest=async()=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/allRequest`,config);
        return responce.data;
    }
    catch(e){
    //console.log(e);
    }
    
}

export const  getPrices=async()=>{
    try{
        const responce=await axios.get(`${apiUrl}/api/getPrices`);
        return responce.data;
    }
    catch(e){
    //console.log(e);
    }
    
}



