export default class ApiService {
  constructor() {}

  getAll() {
    return fetch(`http://localhost:8080/Project_ski/API/`);
  }

    sendData(){
    fetch("http://projet:8080/Project_ski/API/insert");
    }
  
}
