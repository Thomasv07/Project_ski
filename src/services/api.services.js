export default class ApiService {
    constructor(){}
    
    getAll(){
        return fetch(`https://localhost8080/API/Project_ski/`)
    }
}