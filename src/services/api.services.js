export default class ApiService {
  constructor() {}

    getSelect(){
        return fetch(`http://projet:8080/Project_ski/API/select`)
    }

    getCategory(){
        return fetch(`http://projet:8080/Project_ski/API/category`)
    }

}
