export default class Participant {
    constructor(){}
    
    getAll(){
        return fetch(`https://localhost8080/API/Project_ski/`)
    }
}