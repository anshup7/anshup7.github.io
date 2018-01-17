import {Boat} from '../boat';
import {Headers, Http} from '@angular/http';
import { Injectable } from '@angular/core';

@Injectable()
export class BoatService {

  private headers = new Headers({ 'Content-Type': 'application/json' });
  constructor(private http:Http) { 

  }

  getAllBoats():Promise<Boat> {
    return this.http.get("http://localhost:3000/boats")
      .toPromise().then(response => response.json() as Boat[] )
    .catch(this.errorHandler);
  }

  private errorHandler(error: any): Promise<any> {
    console.error("Error occured", error);
    return Promise.reject(error.message || error); //What is the meaning of this syntax
  }

  updateBoat(receivedBoat:Boat){
    const url = "http://localhost:3000/update";
    return this.http.put(url, JSON.stringify(receivedBoat), {headers:this.headers})
    .toPromise()
    .then(res => (res.json()).message)
    .catch(this.errorPut)
  }

  errorPut(error:any):Promise<any>{
    console.log("Update error has been encountered")
    return Promise.reject(error.message || error);
  }

  addBoat(insertableBoat:any){
    const url = "http://localhost:3000/add"
    return this.http.post(url, JSON.stringify(insertableBoat), {headers:this.headers})
    .toPromise()
    .then(res => (res.json().message))
    .catch(this.errorPost)
  }

  errorPost(error:any){
    console.log("Insertion erro has occured: "+error);
    return Promise.reject(error.message || error);
  }

}
