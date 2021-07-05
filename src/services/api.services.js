export default class ApiService {
  constructor() {}

  getAll() {
    return fetch(`http://localhost:8080/Project_ski/API/`);
  }

  getSelect() {
    return fetch(`http://localhost:8080/Project_ski/API/select`);
  }
}
