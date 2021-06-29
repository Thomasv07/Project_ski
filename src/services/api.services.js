export default class ApiService {
    constructor(){}
    
    getAll(){
        return fetch(`http://projet:8080/Project_ski/API/`)
    }

    getCategory(){
        return fetch(`http://projet:8080/Project_ski/API/category`)
    }

}